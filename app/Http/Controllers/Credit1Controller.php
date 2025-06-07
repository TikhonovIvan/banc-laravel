<?php

namespace App\Http\Controllers;

use App\Models\LoanApplication;
use App\Models\LoanDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class Credit1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('index-credit1')) {
            abort(403);
        }

        $applications = LoanApplication::with('user')->paginate(5);
        return view('users.applications.credit1.index', [
            'applications' => $applications
        ]);
    }

    public function search(Request $request)
    {
        if (Gate::denies('index-credit1')) {
            abort(403);
        }

        $query = LoanApplication::with('user');

        if ($request->filled('id')) {
            $query->where('id', $request->input('id'));
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->filled('fio')) {
            $fio = explode(' ', $request->input('fio'));

            $query->whereHas('user', function ($q) use ($fio) {
                $q->where(function ($sub) use ($fio) {
                    foreach ($fio as $part) {
                        $sub->orWhere('name', 'like', "%$part%")
                            ->orWhere('surname', 'like', "%$part%")
                            ->orWhere('patronymic', 'like', "%$part%");
                    }
                });
            });
        }

        $applications = $query->paginate(10)->appends($request->all());

        return view('users.applications.credit1.index', [
            'applications' => $applications
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $application = LoanApplication::with('documents');
        return view('users.services.credit1-create',[
            'application' => $application
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'amount' => ['required', 'numeric', 'min:1000'],
            'term_months' => ['required', 'integer', 'in:3,6,9,12'],
            'income_proof' => ['required', 'boolean'],
            'credit_purpose' => ['required', 'string'],
            'interest_rate' => ['required', 'numeric', 'min:0', 'max:100'], // новое
            'comment' => ['nullable', 'string'],
            'documents.*' => ['nullable', 'file', 'mimes:txt,doc,docx,xls,xlsx,pdf', 'max:5120'],
        ]);

        $application = LoanApplication::create([
            'user_id' => Auth::id(),
            'amount' => $validated['amount'],
            'term_months' => $validated['term_months'],
            'income_proof' => $validated['income_proof'],
            'credit_purpose' => $validated['credit_purpose'],
            'interest_rate' => $validated['interest_rate'], // новое
            'comment' => $validated['comment'] ?? null,
            'status' => 'в обработке',
        ]);

        if ($request->hasFile('documents')) {
            $uploadPath = public_path("uploads/credit1/{$application->id}");
            File::ensureDirectoryExists($uploadPath);

            foreach ($request->file('documents') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move($uploadPath, $filename);

                LoanDocument::create([
                    'loan_application_id' => $application->id,
                    'file_path' => "uploads/credit1/{$application->id}/{$filename}",
                    'original_name' => $file->getClientOriginalName(),
                ]);
            }
        }

        return redirect()->route('applications.index')->with('success', 'Заявка успешно отправлена');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $application = LoanApplication::with('documents')->findOrFail($id);

        // Если админ — можно всё. Если обычный пользователь — только свою заявку.
        if (Gate::allows('index-credit1') || $application->user_id === Auth::id()) {
            return view('users.applications.credit1.show', compact('application'));
        }

        abort(403); // Нет доступа
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Получаем заявку
        $application = LoanApplication::findOrFail($id);

        // Админ может редактировать всё, пользователь — только свою
        if (Gate::allows('index-credit1') || $application->user_id === Auth::id()) {
            return view('users.applications.credit1.edit', compact('application'));
        }

        abort(403); // Нет прав
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Получаем заявку
        $application = LoanApplication::findOrFail($id);

        // Проверка доступа: пользователь может менять только свою заявку
        if (!Gate::allows('index-credit1') && $application->user_id !== Auth::id()) {
            abort(403);
        }

        // Обязательные поля (для всех)
        $rules = [
            'amount' => ['required', 'numeric', 'min:1000'],
            'term_months' => ['required', 'integer', 'in:3,6,9,12'],
            'income_proof' => ['required', 'boolean'],
            'credit_purpose' => ['required', 'string'],
            'interest_rate' => ['required', 'numeric', 'min:0', 'max:100'],
            'comment' => ['nullable', 'string'],
            'documents.*' => ['nullable', 'file', 'mimes:txt,doc,docx,xls,xlsx,pdf', 'max:5120'],
        ];

        // Только для админа — поле статус
        if (Gate::allows('index-credit1')) {
            $rules['status'] = ['required', 'in:в обработке,одобрено,отклонено,ожидает документов'];
        }

        $validated = $request->validate($rules);

        // Обновление общих полей
        $application->fill([
            'amount' => $validated['amount'],
            'term_months' => $validated['term_months'],
            'income_proof' => $validated['income_proof'],
            'credit_purpose' => $validated['credit_purpose'],
            'interest_rate' => $validated['interest_rate'],
            'comment' => $validated['comment'] ?? null,
        ]);

        // Админ может обновить статус
        if (Gate::allows('index-credit1') && isset($validated['status'])) {
            $application->status = $validated['status'];
        }

        $application->save();

        // Загрузка новых файлов
        if ($request->hasFile('documents')) {
            $uploadPath = public_path("uploads/credit1/{$application->id}");
            File::ensureDirectoryExists($uploadPath);

            foreach ($request->file('documents') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move($uploadPath, $filename);

                LoanDocument::create([
                    'loan_application_id' => $application->id,
                    'file_path' => "uploads/credit1/{$application->id}/{$filename}",
                    'original_name' => $file->getClientOriginalName(),
                ]);
            }
        }


        // Перенаправление в зависимости от роли
        return redirect()
            ->route(Gate::allows('index-credit1') ? 'credit1.index' : 'applications.index')
            ->with('success', 'Заявка успешно обновлена.');

    }

    public function destroyDocument(string $id)
    {
        $document = LoanDocument::findOrFail($id);

        // Удаляем сам файл
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
        $application = LoanApplication::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        // Удаление связанных файлов с диска
        $folderPath = public_path("uploads/credit1/{$application->id}");
        if (File::exists($folderPath)) {
            File::deleteDirectory($folderPath);
        }

        // Удаление записей о документах из базы данных
        $application->documents()->delete(); // предполагается, что есть связь documents()

        // Удаление самой заявки
        $application->delete();

        return redirect()->route('applications.index')->with('success', 'Потребительский кредит отменен и файлы удалены.');
    }
}
