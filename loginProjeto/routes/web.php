<?php

use Illuminate\Auth\AuthManager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorLogRegis;

Route::get('/', function () {
    return view('welcome');
})->name('home');
