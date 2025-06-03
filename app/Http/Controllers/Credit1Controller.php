<?php

namespace App\Http\Controllers;

use App\Models\LoanApplication;
use App\Models\LoanDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class Credit1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.services.credit1-create');
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
            'comment' => ['nullable', 'string'],
            'documents.*' => ['nullable', 'file', 'mimes:txt,doc,docx,xls,xlsx,pdf', 'max:5120'],
        ]);

        // Создание заявки
        $application = LoanApplication::create([
            'user_id' => Auth::id(),
            'amount' => $validated['amount'],
            'term_months' => $validated['term_months'],
            'income_proof' => $validated['income_proof'],
            'credit_purpose' => $validated['credit_purpose'],
            'comment' => $validated['comment'] ?? null,
            'status' => 'в обработке',
        ]);

        // Загрузка документов в public/uploads/credit1/{id}
        if ($request->hasFile('documents')) {
            $uploadPath = public_path("uploads/credit1/{$application->id}");
            File::ensureDirectoryExists($uploadPath); // Создаёт папку, если её нет

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
