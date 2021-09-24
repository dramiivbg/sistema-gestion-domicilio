<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\Operadore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class formLoginController extends Controller
{
    public  function login(){

       request()->validate([

        'username' => 'required|email',
        'password' => 'required'

       ]);


        $operador = Login::where('email', request('username'))->get();



      



        foreach($operador as $operator){


            $password = Crypt::decrypt($operator->password);

        
        if($password == request('password')){

             request()->session()->put(['id' => $operator->id_operador]);

             
      
              $id = request()->session()->all();


             $operador =  Operadore::find($id['id']);


             if($operador->rol == 'domiciliario'){
           
            return redirect()->route('pedido.show');

             }else{


                return redirect()->route('home');
             }

         }
         else{

            return redirect()->route('auth.login');
        }
       
    }

    }
}
