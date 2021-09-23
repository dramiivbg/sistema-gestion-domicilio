<?php

namespace App\Http\Controllers;

use App\Models\Operadore;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function home(){

        $id =  request()->session()->all();


        $domiciliario = Operadore::find($id['id']);
        

        if(!empty($id['id'])){

            if($domiciliario->rol != 'domiciliario'){

            return view('home');
            
        }

        if($domiciliario->rol == 'domiciliario'){

            return view('pedido.show');
        }
            

        }else{

            return redirect()->route('auth.login');
        }
    }
    
    
    
}
