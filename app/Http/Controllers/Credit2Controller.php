<?php

namespace App\Http\Controllers;

use App\Models\MortgageApplication;
use App\Models\MortgageDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\File;
class Credit2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('index-credit1')) {
            abort(403);
        }

        $applications = MortgageApplication::with('user')->paginate(10);
        return view('users.applications.credit2.index', [
            'applications' => $applications
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.services.credit2-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'loan_amount' => 'required|numeric',
            'term_years' => 'required|integer',
            'property_type' => 'required|in:Квартира,Частный дом,Студия',
            'region' => 'required|string',
            'property_value' => 'required|numeric',
            'initial_payment' => 'required|numeric',
            'purpose' => 'required|in:Для проживания,Сдачи в аренду,Инвестиции',
            'comment' => 'nullable|string',
            'documents.*' => 'nullable|mimes:txt,docx,xlsx,pdf|max:2048'
        ]);

        $validated['user_id'] = Auth::id();
        $validated['interest_rate'] = 14; // через админку в будущем можно сделать

        $application = MortgageApplication::create($validated);

        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $file) {
                $path = $file->storeAs(
                    "uploads/credit2/{$application->id}",
                    $file->getClientOriginalName(),
                    'public_uploads'
                );

                MortgageDocument::create([
                    'mortgage_application_id' => $application->id,
                    'file_path' => $path,
                    'original_name' => $file->getClientOriginalName(),
                ]);
            }
        }

        return redirect()->route('applications.index')->with('success', 'Заявка успешно отправлена');
    }



    public function show(string $id){
        $application = MortgageApplication::with('documents')->findOrFail($id);

        // Если админ — можно всё. Если обычный пользователь — только свою заявку.
        if (Gate::allows('index-credit1') || $application->user_id === Auth::id()) {
            return view('users.applications.credit2.show', compact('application'));
        }

        abort(403); // Нет доступа
    }


    public function edit(string $id)
    {
        // Получаем заявку с документами
        $application = MortgageApplication::with('documents')->findOrFail($id);

        // Админ может редактировать всё, пользователь — только свою
        if (Gate::allows('index-credit1') || $application->user_id === Auth::id()) {
            return view('users.applications.credit2.edit', compact('application'));
        }

        // Нет доступа
        abort(403);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Получаем заявку
        $application = MortgageApplication::findOrFail($id);

        // Проверка доступа: пользователь может менять только свою заявку
        if (!Gate::allows('index-credit1') && $application->user_id !== Auth::id()) {
            abort(403);
        }

        // Правила валидации для всех
        $rules = [
            'loan_amount' => ['required', 'numeric'],
            'term_years' => ['required', 'integer', 'in:3,6,9,12'],
            'property_type' => ['required', 'in:Квартира,Частный дом,Студия'],
            'region' => ['required', 'string'],
            'property_value' => ['required', 'numeric'],
            'initial_payment' => ['required', 'numeric'],
            'purpose' => ['required', 'in:Для проживания,Сдачи в аренду,Инвестиции'],
            'comment' => ['nullable', 'string'],
            'documents.*' => ['nullable', 'file', 'mimes:txt,docx,xlsx,pdf', 'max:2048'],
        ];

        // Только для администратора — возможность обновить статус
        if (Gate::allows('index-credit1')) {
            $rules['status'] = ['required', 'in:в обработке,одобрено,отклонено,ожидает документов'];
        }

        $validated = $request->validate($rules);

        // Обновление полей
        $application->fill([
            'loan_amount' => $validated['loan_amount'],
            'term_years' => $validated['term_years'],
            'property_type' => $validated['property_type'],
            'region' => $validated['region'],
            'property_value' => $validated['property_value'],
            'initial_payment' => $validated['initial_payment'],
            'purpose' => $validated['purpose'],
            'comment' => $validated['comment'] ?? null,
        ]);

        // Обновление статуса, если админ
        if (Gate::allows('index-credit1') && isset($validated['status'])) {
            $application->status = $validated['status'];
        }

        $application->save();

        // Загрузка новых файлов
        if ($request->hasFile('documents')) {
            $uploadPath = public_path("uploads/credit2/{$application->id}");
            File::ensureDirectoryExists($uploadPath);

            foreach ($request->file('documents') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move($uploadPath, $filename);

                MortgageDocument::create([
                    'mortgage_application_id' => $application->id,
                    'file_path' => "uploads/credit2/{$application->id}/{$filename}",
                    'original_name' => $file->getClientOriginalName(),
                ]);
            }
        }

        // Перенаправление в зависимости от роли
        return redirect()
            ->route(Gate::allows('index-credit1') ? 'credit2.index' : 'applications.index')
            ->with('success', 'Заявка успешно обновлена.');
    }

    public function destroyDocument(string $id)
    {
        $document = MortgageDocument::findOrFail($id);

        $fullPath = public_path($document->file_path);
        if (File::exists($fullPath)) {
            File::delete($fullPath);
        }

        $document->delete();

        return back()->with('success', 'Документ удалён.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $application = MortgageApplication::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $application->delete();

        return redirect()->route('applications.index')->with('success', 'Ипотечная заявка отменена.');
    }
}
