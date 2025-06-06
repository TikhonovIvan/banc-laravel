<?php

namespace App\Http\Controllers;

use App\Models\AutoCreditApplication;
use App\Models\LoanApplication;
use App\Models\MortgageApplication;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){

    }

    public function indexUsers(){
        $users = User::query()->paginate(10);
        return view('admin.users', [
            'users' => $users
        ]);
    }


    public function creditShowUser(string $id)
    {

        if (Auth::user()->role !== 'admin') {
            abort(403);
        }
        $user = User::findOrFail($id); // Подтягиваем пользователя (можно вывести его ФИО на странице)

        $loanApplications = LoanApplication::where('user_id', $id)->paginate(3, ['*'], 'loan_page');
        $mortgageApplications = MortgageApplication::where('user_id', $id)->paginate(3, ['*'], 'mortgage_page');
        $autoCreditApplications = AutoCreditApplication::where('user_id', $id)->paginate(3, ['*'], 'auto_page');

        return view('admin.credit-user', compact(
            'user',
            'loanApplications',
            'mortgageApplications',
            'autoCreditApplications'
        ));
    }
}
