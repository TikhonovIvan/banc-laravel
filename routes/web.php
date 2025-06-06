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
Route::get('/credit1', [Credit1Controller::class, 'index'])->name('credit1.index');

Route::get('/credit1/create', [Credit1Controller::class, 'create'])->name('credit1.create');
Route::post('/credit1', [Credit1Controller::class, 'store'])->name('credit1.store');
Route::get('/credit1/{id}/edit', [Credit1Controller::class, 'edit'])->name('credit1.edit');
Route::put('/credit1/{id}', [Credit1Controller::class, 'update'])->name('credit1.update');
Route::delete('/credit1/documents/{id}', [Credit1Controller::class, 'destroyDocument'])->name('credit1.document.destroy');
Route::get('/credit1/{id}/show', [Credit1Controller::class, 'show'])->name('credit1.show');


Route::delete('/credit1/{id}', [Credit1Controller::class, 'destroy'])->name('credit1.destroy');



Route::get('/credit2', [Credit2Controller::class, 'index'])->name('credit2.index');

Route::get('/credit2/create', [Credit2Controller::class, 'create'])->name('credit2.create');
Route::post('/credit2', [Credit2Controller::class, 'store'])->name('credit2.store');
Route::get('/credit2/{id}/edit', [Credit2Controller::class, 'edit'])->name('credit2.edit');
Route::put('/credit2/{id}', [Credit2Controller::class, 'update'])->name('credit2.update');
Route::delete('/credit2/document/{id}', [Credit2Controller::class, 'destroyDocument'])->name('credit2.document.destroy');
Route::get('/credit2/{id}/show', [Credit2Controller::class, 'show'])->name('credit2.show');

Route::delete('/credit2/{id}', [Credit2Controller::class, 'destroy'])->name('credit2.destroy');



Route::get('/credit3', [Credit3Controller::class, 'index'])->name('credit3.index');
Route::get('/credit3/create', [Credit3Controller::class, 'create'])->name('credit3.create');
Route::post('/credit3', [Credit3Controller::class, 'store'])->name('credit3.store');
Route::get('/credit3/{id}/edit', [Credit3Controller::class, 'edit'])->name('credit3.edit');
Route::put('/credit3/{id}', [Credit3Controller::class, 'update'])->name('credit3.update');
Route::delete('/credit3/document/{id}', [Credit3Controller::class, 'destroyDocument'])->name('credit3.document.destroy');
Route::get('/credit3/{id}/show', [Credit3Controller::class, 'show'])->name('credit3.show');

Route::delete('/credit3/{id}', [Credit3Controller::class, 'destroy'])->name('credit3.destroy');




Route::get('/applications', [ApplicationsController::class, 'index'])->name('applications.index');


