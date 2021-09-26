<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\Operadore;
use Illuminate\Http\Request;

class operadorController extends Controller
{

    
public function edit_operador(){


    request()->validate([

        'name' => 'required',
        'phone' => 'required',
        'cedula' => 'required',
        'email' => 'required|email',
        'rol' => 'required'
        
     ]);
  
  $operador = Operadore::where('id', request('id'))->update(['nombre_completo' => request('name')],['telefono' => request('phone')],['num_cedula' => request('cedula')],['rol' => request('rol')]);

  if($operador){

 $login =   Login::where('id_operador', request('id'))->update(['email' => request('email')]);

  }

  if($login){

    return redirect()->route('home');
  }

}


public function list(){


    $operadores = Operadore::paginate();

    return view('operador.list', compact('operadores'));
}


public function edit(){


   $id =  request('id');

   

   $operador = Operadore::select('*')->join('logins', 'operadores.id','=', 'logins.id_operador')->where('id',$id)->get();


   
foreach ($operador as $operator){

   return view('operador.edit', compact('operator'));
}
   
    

}

public function delete(){

    $id =  request('id');

    Login::where('id_operador',$id)->delete();

    return redirect()->route('operador.list');

}

}
