<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ControladorLogRegis extends Controller
{
    function login(){
        return view('login');
    }

    function registration(){
        return view('registration');
    }

    function loginPost(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){

            return redirect()->intended(route('home'));
        }

        return redirect(route('login'))->with("error", "Algo estranho ocorreu");
    }

    function registrationPost(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);

        if(!$user){

            return redirect(route('registration'))->with("error", "Registro falhou");
        
        }

        return redirect(route('login'))->with("sucesso", "O registro foi um sucesso!");
    
    }

    function logout(){

        Session:flush();
        Auth::logout();
        return redirect(route('login'));

    }

}