<?php

namespace App\Http\Controllers;

use App\Models\AutoCreditApplication;
use App\Models\LoanApplication;
use App\Models\MortgageApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();

        $loanApplications = LoanApplication::where('user_id', $userId)->paginate(3, ['*'], 'loan_page');
        $mortgageApplications = MortgageApplication::where('user_id', $userId)->paginate(3, ['*'], 'mortgage_page');
        $autoCreditApplications = AutoCreditApplication::where('user_id', $userId)->paginate(3, ['*'], 'auto_page');

        return view('users.applications.index', compact(
            'loanApplications',
            'mortgageApplications',
            'autoCreditApplications'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
