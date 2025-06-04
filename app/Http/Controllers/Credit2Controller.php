<?php

namespace App\Http\Controllers;

use App\Models\MortgageApplication;
use App\Models\MortgageDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\File;
class Credit2Controller extends Controller
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
        $application = MortgageApplication::with('documents')->findOrFail($id);


        if (auth()->id() !== $application->user_id) {
            abort(403);
        }

        return view('users.applications.credit2.edit', compact('application'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'loan_amount' => 'required|numeric',
            'term_years' => 'required|integer|in:3,6,9,12',
            'property_type' => 'required|in:Квартира,Частный дом,Студия',
            'region' => 'required|string',
            'property_value' => 'required|numeric',
            'initial_payment' => 'required|numeric',
            'purpose' => 'required|in:Для проживания,Сдачи в аренду,Инвестиции',
            'comment' => 'nullable|string',
            'documents.*' => 'nullable|file|mimes:txt,docx,xlsx,pdf|max:2048',
        ]);

        $application = MortgageApplication::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $application->update($validated);

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

        return redirect()->route('applications.index')->with('success', 'Заявка успешно обновлена');
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
