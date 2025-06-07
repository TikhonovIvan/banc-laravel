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

    public function indexUsers(Request $request)
    {
        $query = User::query();

        // Фильтрация по ID
        if ($request->filled('id')) {
            $query->where('id', $request->id);
        }

        // Фильтрация по ФИО (ищем в фамилии, имени и отчестве)
        if ($request->filled('fio')) {
            $fio = $request->fio;
            $query->where(function ($q) use ($fio) {
                $q->where('surname', 'like', "%$fio%")
                    ->orWhere('name', 'like', "%$fio%")
                    ->orWhere('patronymic', 'like', "%$fio%");
            });
        }

        // Фильтрация по email
        if ($request->filled('email')) {
            $query->where('email', 'like', "%{$request->email}%");
        }

        // Фильтрация по телефону
        if ($request->filled('phone')) {
            $query->where('phone', 'like', "%{$request->phone}%");
        }

        // Пагинация с сохранением параметров поиска
        $users = $query->paginate(10)->appends($request->all());

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
