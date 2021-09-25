<?php

namespace App\Http\Controllers;

use App\Mail\email;
use App\Models\Operadore;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
  
  
          if(empty($pedido->estado)){
  
  
  
           for($i = 0; $i< sizeof($pedidos); $i++){
  
              $new_pedidos[$i] = $pedido;
           }
  
          }
      }
  
      return view('pedido.pedidos', compact('new_pedidos'));
  
  
  
     }
  
  


   public function pedidos_en_camino(){

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

    return view('pedido.camino', compact('new_pedidos'));



   }


   public function cambiar_estado(){

  if(request('estado') == 'entregado'){    

$pedido  = Pedido::where('num_pedido',request('id'))->get();

 Pedido::where('num_pedido', request('id'))->update(['estado' => request('estado')]);

      
foreach ($pedido as $domicilio){
     
   $details =[
          'title' => 'pedido entregado',
          'body' => ' tu pedido: '.$domicilio->num_pedido.' '.'fue entregado que lo disfrutes'
      ];
   }
      Mail::to($domicilio->email_comprador)->send(new email($details));

      return redirect()->route('pedido.entregado');


    
      
  }


  if (request('estado') == 'en camino'){

   $pedido  = Pedido::where('num_pedido',request('id'))->get();
      
   Pedido::where('num_pedido', request('id'))->update(['estado' => request('estado')]);
  
        
  foreach ($pedido as $domicilio){
       
     $details =[
            'title' => 'pedido en camino',
            'body' => ' tu pedido: '.$domicilio->num_pedido.' '.'va en camino'
        ];
     }
        Mail::to($domicilio->email_comprador)->send(new email($details));
  
        return redirect()->route('pedido.camino');
        
      
 

   
}


  
if (request('estado') == 'aplazado'){


      
   Pedido::where('num_pedido', request('id'))->update(['estado' => request('estado')]);
  
   $pedido  = Pedido::where('num_pedido',request('id'))->get();
        
  foreach ($pedido as $domicilio){
       
     $details =[
            'title' => 'pedido aplazado',
            'body' => ' tu pedido: '.$domicilio->num_pedido.' '.'fue aplazado'
         ];
     }
        Mail::to($domicilio->email_comprador)->send(new email($details));
  
        return redirect()->route('pedido.aplazado');
        
      
 

   
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

   
   



 




   public function sendEmail(Pedido $pedido){

      $details =[
          'title' => 'pedido aplazado',
          'body' => $pedido->motivo_incumplimiento
      ];

      Mail::to('sanchez.ivan@correounivalle.edu.co')->send(new email($details));

      return redirect()->route('pedido.aplazado');
  }




   public function asunto(){



      request()->validate([

         'motivo' => 'required',
         'nueva_fecha' => 'required'
      ]);

      $id =  request()->session()->all();

      

    $pedido =    Pedido::where('num_pedido', $id['num_pedido'])->update(['motivo_incumplimiento' => request('motivo')], ['fecha_entrega' => request('nueva_fecha')]);


    if($pedido){


      $clase = new pedidoController;
      $clase->sendEmail($pedido);
      
    }

   }
   

   
}
