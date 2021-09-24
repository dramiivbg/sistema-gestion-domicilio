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


      $id1 =  request()->session()->all();
   

      $domiciliario = Operadore::find($id1['id']);

     return  view('pedido.show', compact('domiciliario'));



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
   



   public function pedidos_aplazados(){

      $id =  request()->session()->all();

    $pedidos = Pedido::where('id_domiciliario', $id['id'])->get();

    $new_pedidos = [];

    foreach($pedidos as $pedido){


        if($pedido->estado == 'aplazado' && empty($pedido->motivo_incumplimiento)){



         for($i = 0; $i< sizeof($pedidos); $i++){

            $new_pedidos[$i] = $pedido;
         }

        }
    }

    return view('pedido.aplazado', compact('new_pedidos'));


   }


   public function comment(){



      $id_pedido = request('id');

      
      

      

       request()->session()->put(['num_pedido' => $id_pedido]);


     
      

   
       return view('pedido.comment');
   }


   public function asunto(){



      request()->validate([

         'motivo' => 'required',
         'nueva_fecha' => 'required'
      ]);

      $id =  request()->session()->all();

      

    $pedido =    Pedido::where('num_pedido', $id['num_pedido'])->update(['motivo_incumplimiento' => request('motivo')], ['fecha_entrega' => request('nueva_fecha')]);


    if($pedido){

      return redirect()->route('pedido.aplazado');
    }

   }

}
