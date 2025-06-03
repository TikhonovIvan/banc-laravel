<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }
    public function loginForm(){
        return view('login');
    }

    public function loginAuth(Request $request){
       $validated = $request->validate([
           'email' => ['required', 'email'],
           'password' => ['required'],
       ]);

       if(Auth::attempt($validated)){
           return redirect()->route('applications.index')->with('success', 'Добро пожаловать');
       }
        return back()->withErrors([
            'email' => 'Ошибка логин и пароль'
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }



    public function registerForm()
    {
        return view('register');
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'surname' => ['required', 'string'],
            'name' => ['required', 'string'],
            'patronymic' => ['nullable', 'string'],

            'passport_id' => ['required', 'string' ,'unique:users', 'max:9' ],
            'passport_inn' => ['required', 'integer', 'unique:users',  'min:14'],
            'issued_by' => ['required', 'string'],
            'date_start' => ['required', 'date'],
            'date_end' => ['nullable', 'date'],
            'birth' => ['required', 'date'],

            'city' => ['required', 'string'],
            'address' => ['required', 'string'],
            'gender' => ['required', 'in:man,woman'],

            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'string'],


            'phone' => ['required', 'string'],
            'position_at_work' => ['nullable', 'string'],
            'work_address' => ['nullable', 'string'],
        ]);

        // Ручная проверка совпадения пароля и повторного ввода
//        if ($validated['password'] !== $validated['repeat_password']) {
//            return back()
//                ->withErrors(['repeat_password' => 'Пароли не совпадают'])
//                ->withInput();
//        }
//
//        // Удаляем repeat_password, чтобы не сохранять в БД
//        unset($validated['repeat_password']);

        // Хешируем пароль
        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);

        return redirect()->route('login')->with('success', 'Вы прошли регистрацию');
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

    }

    public function accountForm()
    {
        $user = Auth::user();
        return view('users.account', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $validated = $request->validate([
            'surname' => ['required', 'string'],
            'name' => ['required', 'string'],
            'patronymic' => ['nullable', 'string'],

            'passport_id' => ['required', 'string' ,'unique:users', 'max:9', ],
            'passport_inn' => ['required', 'integer', 'unique:users',  'min:14'],
            'issued_by' => ['required', 'string'],
            'date_start' => ['required', 'date'],
            'date_end' => ['nullable', 'date'],
            'birth' => ['required', 'date'],

            'city' => ['required', 'string'],
            'address' => ['required', 'string'],
            'gender' => ['required', 'in:man,woman'],

            'email' => ['required', 'email'],
            'password' => ['required', 'string'],


            'phone' => ['required', 'string'],
            'position_at_work' => ['nullable', 'string'],
            'work_address' => ['nullable', 'string'],
        ]);


        $validated['password'] = bcrypt($validated['password']);

        $user->update($validated);

        return redirect()->route('account.edit')->with('success', 'Данные обновлены');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
