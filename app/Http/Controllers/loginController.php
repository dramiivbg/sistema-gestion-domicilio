<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function login(){

        return view('auth.login');

    }

    public function register(){

        return view('auth.register');
    }

    public function logout(){


        request()->session()->put(['id' => '']); 
        
        return redirect()->route('auth.login');


    }


    public function change(){

        return view('auth.change');
    }
}
