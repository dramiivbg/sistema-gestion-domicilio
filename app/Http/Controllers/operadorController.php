<?php

namespace App\Http\Controllers;

use App\Models\Operadore;
use Illuminate\Http\Request;

class operadorController extends Controller
{

    

public function list(){


    $operadores = Operadore::paginate();

    return view('operador.list', compact('operadores'));
}


public function edit(){


   $operador =  request();
    return $operador;

}

public function delete(){

    return 'delete';

}

}
