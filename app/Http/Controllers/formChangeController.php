<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\Operadore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;

class formChangeController extends Controller
{
    public function change_password()
    {


        request()->validate([

            'username' => 'required|email',
            'new_password' => 'required' 
        ]);
        


        $password = Crypt::encrypt(request('new_password'));

       $login = Login::where('email', request('username'))->update(['password' => $password ]);

    


       if($login){

            return redirect()->route('auth.login');
       }else{

           return redirect()->route('auth.change');
        
       }

    }
}
