<?php

use Illuminate\Auth\AuthManager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorLogRegis;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', [ControladorLogRegis::class, 'login'])->name('login');
Route::post('/login', [ControladorLogRegis::class, 'loginPost'])->name('login.post');

Route::get('/registration', [ControladorLogRegis::class, 'registration'])->name('registration');
Route::post('/registration', [ControladorLogRegis::class, 'registrationPost'])->name('registration.post');

Route::get('/logout', [ControladorLogRegis::class, 'logout'])->name('logout');