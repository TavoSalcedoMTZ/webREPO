<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/register', [UserController::class, 'showRegister'])->name('register');
Route::post('/register', [UserController::class, 'register'])->name('register.store');


Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.store');


Route::get('/test', [UserController::class, 'test']);
Route::get('/test/{variable}', [UserController::class, 'test']);


Route::get('/update', [UserController::class, 'showUpdate'])->name('update');
Route::post('/update', [UserController::class, 'update'])->name('update.store');

Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::post('logout', [UserController::class, 'logout'])->name('logout');