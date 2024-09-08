<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ControladorLogRegis extends Controller
{
    function login(){
        if (Auth::check()) {
            return redirect(route('home'));  // Previne o acesso direto ao login caso
        }                                    // o usuário já esteja logado
        return view('login');
    }

    function registro(){
        if (Auth::check()) {
            return redirect(route('home')); // Previne o acesso direto ao registro caso
        }                                   // o usuário já esteja logado
        return view('registro');
    }

    function loginPost(Request $request){

        $request->validate([ // forçar usuário a preencher os campos
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){ // tentativa de autenticação

            return redirect()->intended(route('home')); // redirecionar
        }

        return redirect(route('login'))->with("error", "Algo estranho ocorreu");
    }

    function registroPost(Request $request){

        $request->validate([ // forçar usuário a preencher os campos
            'name' => 'required',
            'email' => 'required|email|unique:users', // email terá de ser ÚNICO
            'password' => 'required'
        ]);

        $data['name'] = $request->name; // Extrair e armazenar os dados
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password); // hash para melhor segurança de senha
        $user = User::create($data); // criar um novo usuário

        if(!$user){
            // Mensagem de erro
            return redirect(route('registro'))->with("error", "Registro falhou");
        
        }
        // Mensagem de sucesso
        return redirect(route('login'))->with("sucesso", "O registro foi um sucesso!");
    
    }

    function logout(){ 

        Session:flush(); // Limpar dados
        Auth::logout(); // Desconectar
        return redirect(route('login')); // Redirecionar 

    }

}