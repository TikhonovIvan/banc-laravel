<?php

namespace App\Http\Controllers;

use App\Models\AutoCreditApplication;
use App\Models\AutoCreditFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class Credit3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function show(string $id){
        $application = AutoCreditApplication::with('documents')->findOrFail($id);

        return view('users.applications.credit3.show', compact('application'));
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

        return view('users.applications.credit3.edit', compact('application'));
    }




    public function update(Request $request, string $id)
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

        $application = AutoCreditApplication::findOrFail($id);

        $application->update([
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

        // Сохраняем новые файлы с original_name
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $file) {
                $path = $file->store("credit_auto/{$application->id}", 'public');
                AutoCreditFile::create([
                    'auto_credit_application_id' => $application->id,
                    'file_path' => $path,
                    'original_name' => $file->getClientOriginalName(),
                ]);
            }
        }

        return redirect()->route('applications.index')->with('success', 'Заявка успешно обновлена');
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
