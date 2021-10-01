<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\Operadore;
use Illuminate\Support\Facades\Crypt;

class formOperadorController extends Controller
{
    public function register(){

     request()->validate([

        'name' => 'required',
        'phone' => 'required',
        'cedula' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'rol' => 'required'
        
     ]);


        $operador = Operadore::create([

            'nombre_completo' => request('name'),
            'telefono' => request('phone'),
            'num_cedula' => request('cedula'),
            'rol' => request('rol')
        ]);

        if(!empty($operador)){
            
        $id = Operadore::find($operador->id);

      

        $login = Login::create([

            'email' => request('email'),
            'password' => Crypt::encrypt(request('password')),

            'id_operador' => $id->id
        ]);

        }

        if(!empty($login)){

        $url =   redirect()->route('auth.login');

          return $url;

        }
    }
}
