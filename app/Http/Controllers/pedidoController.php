<?php

namespace App\Http\Controllers;

use App\Models\Operadore;
use App\Models\Pedido;
use Illuminate\Http\Request;

class pedidoController extends Controller
{


    public function registrar(){

      


       return view('pedido.registrar');
    
    }


   public function home_domiciliario(){


   

     return  view('pedido.show');



   }


   public function ver_pedidos(){

    $id =  request()->session()->all();

    $pedidos = Pedido::where('id_domiciliario', $id['id'])->get();

    $new_pedidos = [];

    foreach($pedidos as $pedido){


        if($pedido->estado == 'en camino'){



         for($i = 0; $i< sizeof($pedidos); $i++){

            $new_pedidos[$i] = $pedido;
         }

        }
    }

    return view('pedido.pedidos', compact('new_pedidos'));



   }


   public function cambiar_estado(){

      


    $pedido = Pedido::where('num_pedido', request('id'))->update(['estado' => request('estado')]);

      

    if($pedido){

      return redirect()->route('pedido.pedidos');
    }
      
   
   }
    

   public function pedidos_entregados(){

      $id =  request()->session()->all();

    $pedidos = Pedido::where('id_domiciliario', $id['id'])->get();

    $new_pedidos = [];

    foreach($pedidos as $pedido){


        if($pedido->estado == 'entregado'){



         for($i = 0; $i< sizeof($pedidos); $i++){

            $new_pedidos[$i] = $pedido;
         }

        }
    }

    return view('pedido.entregado', compact('new_pedidos'));


   }
   
}
