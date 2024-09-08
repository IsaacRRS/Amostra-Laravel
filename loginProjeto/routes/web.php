<?php

use Illuminate\Auth\AuthManager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorLogRegis;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Rotas para permitir a solicitação apropriada à um controlador desejado

Route::get('/login', [ControladorLogRegis::class, 'login'])->name('login'); // 'URL', [CONTROLADOR], 'método'])->name('nomear rota');
Route::post('/login', [ControladorLogRegis::class, 'loginPost'])->name('login.post');

Route::get('/registro', [ControladorLogRegis::class, 'registro'])->name('registro');
Route::post('/registro', [ControladorLogRegis::class, 'registroPost'])->name('registro.post');

Route::get('/logout', [ControladorLogRegis::class, 'logout'])->name('logout');


Route::group (['middleware' => 'auth'], function (){ // Restringe apenas para usuários logados
    Route::get('/perfil', function (){
        return "este é o seu perfil";
    });
});
