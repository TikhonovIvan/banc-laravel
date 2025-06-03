<?php

use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Credit1Controller;
use App\Http\Controllers\Credit2Controller;
use App\Http\Controllers\Credit3Controller;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {return view('home');})->name('home');
Route::get('/about', function () {return view('about');})->name('about');
Route::get('/services', function () {return view('services');})->name('services');
Route::get('/contact', function () {return view('contact');})->name('contact');


/*Авторизация и регистрация */
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'loginAuth'])->name('login.auth');

Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.create');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/account', [AuthController::class, 'accountForm'])->name('account.edit');
Route::put('/account/{id}', [AuthController::class, 'update'])->name('account.update');



/*Кредиты*/
Route::get('/credit1', [Credit1Controller::class, 'create'])->name('credit1.create');
Route::post('/credit1', [Credit1Controller::class, 'store'])->name('credit1.store');




Route::get('/credit2', [Credit2Controller::class, 'create'])->name('credit2.create');
Route::get('/credit3', [Credit3Controller::class, 'create'])->name('credit3.create');




Route::get('/applications', [ApplicationsController::class, 'index'])->name('applications.index');


