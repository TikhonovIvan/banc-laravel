<?php

namespace App\Http\Controllers;

use App\Models\AutoCreditApplication;
use App\Models\AutoCreditFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class Credit3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('index-credit1')) {
            abort(403);
        }

        $applications = AutoCreditApplication::with('user')->paginate(5);
        return view('users.applications.credit3.index', [
            'applications' => $applications
        ]);
    }


    public function search(Request $request)
    {
        if (Gate::denies('index-credit1')) {
            abort(403);
        }

        $query = AutoCreditApplication::with('user');

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

        return view('users.applications.credit3.index', [
            'applications' => $applications
        ]);
    }

    public function show(string $id){
        $application = AutoCreditApplication::with('documents')->findOrFail($id);

        // Если админ — можно всё. Если обычный пользователь — только свою заявку.
        if (Gate::allows('index-credit1') || $application->user_id === Auth::id()) {
            return view('users.applications.credit3.show', compact('application'));
        }

        abort(403); // Нет доступа


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.services.credit3-create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'loan_amount' => 'required|numeric',
            'car_make_model' => 'required|string|max:255',
            'car_year' => 'required|digits:4|integer|min:1990|max:' . date('Y'),
            'car_type' => 'required|in:новый,с пробегом',
            'car_price' => 'required|numeric',
            'initial_payment' => 'required|numeric',
            'term_months' => 'required|integer|min:1',
            'purpose' => 'required|string|max:255',
            'interest_rate' => 'nullable|numeric|between:0,100',
            'comment' => 'nullable|string',
            'documents.*' => 'nullable|file|max:10240',
        ]);

        $application = AutoCreditApplication::create([
            'user_id' => Auth::id(),
            'loan_amount' => $validated['loan_amount'],
            'car_make_model' => $validated['car_make_model'],
            'car_year' => $validated['car_year'],
            'car_type' => $validated['car_type'],
            'car_price' => $validated['car_price'],
            'initial_payment' => $validated['initial_payment'],
            'term_months' => $validated['term_months'],
            'purpose' => $validated['purpose'],
            'interest_rate' => $validated['interest_rate'] ?? null,
            'comment' => $validated['comment'] ?? null,
            'status' => 'в обработке',
        ]);

        // Сохраняем файлы с оригинальным именем
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $file) {
                $path = $file->store("credit_auto/{$application->id}", 'public');

                AutoCreditFile::create([
                    'auto_credit_application_id' => $application->id,
                    'file_path' => $path,
                    'original_name' => $file->getClientOriginalName(), // сохранение оригинального имени файла
                ]);
            }
        }

        return redirect()->route('applications.index')->with('success', 'Заявка успешно отправлена');
    }

    public function edit(string $id)
    {
        $application = AutoCreditApplication::with('documents')->findOrFail($id);

        // Админ может редактировать всё, пользователь — только свою
        if (Gate::allows('index-credit1') || $application->user_id === Auth::id()) {
            return view('users.applications.credit3.edit', compact('application'));
        }
        // Нет доступа
        abort(403);

    }




    public function update(Request $request, string $id)
    {
        // Получаем заявку
        $application = AutoCreditApplication::findOrFail($id);

        // Проверка доступа: пользователь может менять только свою заявку
        if (!Gate::allows('index-credit1') && $application->user_id !== Auth::id()) {
            abort(403);
        }

        // Общие правила валидации
        $rules = [
            'loan_amount' => ['required', 'numeric'],
            'car_make_model' => ['required', 'string', 'max:255'],
            'car_year' => ['required', 'digits:4', 'integer', 'min:1990', 'max:' . date('Y')],
            'car_type' => ['required', 'in:новый,с пробегом'],
            'car_price' => ['required', 'numeric'],
            'initial_payment' => ['required', 'numeric'],
            'term_months' => ['required', 'integer', 'min:1'],
            'purpose' => ['required', 'string', 'max:255'],
            'interest_rate' => ['nullable', 'numeric', 'between:0,100'],
            'comment' => ['nullable', 'string'],
            'documents.*' => ['nullable', 'file', 'mimes:txt,docx,xlsx,pdf,jpg,jpeg,png', 'max:10240'],
        ];

        // Дополнительное правило для администратора
        if (Gate::allows('index-credit1')) {
            $rules['status'] = ['required', 'in:в обработке,одобрено,отклонено,ожидает документов'];
        }

        $validated = $request->validate($rules);

        // Обновление полей
        $application->fill([
            'loan_amount' => $validated['loan_amount'],
            'car_make_model' => $validated['car_make_model'],
            'car_year' => $validated['car_year'],
            'car_type' => $validated['car_type'],
            'car_price' => $validated['car_price'],
            'initial_payment' => $validated['initial_payment'],
            'term_months' => $validated['term_months'],
            'purpose' => $validated['purpose'],
            'interest_rate' => $validated['interest_rate'] ?? null,
            'comment' => $validated['comment'] ?? null,
        ]);

        // Обновление статуса, если админ
        if (Gate::allows('index-credit1') && isset($validated['status'])) {
            $application->status = $validated['status'];
        }

        $application->save();

        // Загрузка новых файлов
        if ($request->hasFile('documents')) {
            $uploadPath = public_path("uploads/credit_auto/{$application->id}");
            File::ensureDirectoryExists($uploadPath);

            foreach ($request->file('documents') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move($uploadPath, $filename);

                AutoCreditFile::create([
                    'auto_credit_application_id' => $application->id,
                    'file_path' => "uploads/credit_auto/{$application->id}/{$filename}",
                    'original_name' => $file->getClientOriginalName(),
                ]);
            }
        }

        // Перенаправление в зависимости от роли
        return redirect()
            ->route(Gate::allows('index-credit1') ? 'credit3.index' : 'applications.index')
            ->with('success', 'Заявка успешно обновлена.');
    }


    public function destroyDocument(string $id)
    {
        $document = AutoCreditFile::findOrFail($id); // ⬅ правильная модель

        // Путь к файлу
        $fullPath = storage_path("app/public/{$document->file_path}");

        // Удаление физического файла, если он существует
        if (File::exists($fullPath)) {
            File::delete($fullPath);
        }

        // Удаление записи из базы
        $document->delete();

        return back()->with('success', 'Документ удалён.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $application = AutoCreditApplication::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $application->delete();

        return redirect()->route('applications.index')->with('success', 'Автокредит отменён.');
    }
}
