<?php

namespace App\Http\Controllers;

use App\Mail\email;
use App\Models\Domicilio;
use App\Models\Estado;
use App\Models\Operadore;
use App\Models\Pedido;
use App\Models\Retrasado;
use App\Models\Retraso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class pedidoController extends Controller
{


      
public function edit_pedido(){


   request()->validate([

       'articulos' => 'required',
       
       
    ]);
 
 $operador = Pedido::where('num_pedido', request('num_pedido'))->update(['articulos' => request('articulos')]);



 if($operador){

   return redirect()->route('pedido.list');
 }

}


   public function edit(){


      
   
      
   
      $pedidos = Pedido::where('num_pedido',request('num_pedido'))->get();
   
   
      
   foreach ($pedidos as $pedido){
   
      return view('pedido.edit', compact('pedido'));
   }
      
       
   
   }
   

    public function registrar(){

      


       return view('domicilio.registrar');
    
    }


   public function home_domiciliario(){


      $id1 =  request()->session()->all();

      if(!empty($id1['id'])){
   

      $domiciliario = Operadore::find($id1['id']);

     return  view('pedido.show', compact('domiciliario'));
      }
      else{
          
         return redirect()->route('auth.login');
      }


   }


   public function list(){

     


         $pedidos = Pedido::paginate();
     
         return view('pedido.list', compact('pedidos'));
     
     
   }

   public function ver_pedidos(){

      $id =  request()->session()->all();
  
      $domicilios_new = [];

      
 
       $domicilios = Domicilio::select('estados.id_domicilio','domicilios.num_pedido', 'compradores.direccion', 'compradores.telefono', 'estados.estado')->join('estados', 'domicilios.id','=', 'estados.id_domicilio')->join('clientes', 'domicilios.nombre_cliente','=', 'clientes.nombre')->join('compradores', 'domicilios.id_comprador', '=', 'compradores.id')->groupBy('id_domicilio','estado')->where('id_domiciliario', $id['id'])->get();

    

       foreach($domicilios as $domicilio){

             if($domicilio->estado == 'en proceso'){

               return view('domicilio.pedidos', compact('domicilio'));
            
            }
       }
          

         

           
     }
  
  


   public function pedidos_en_camino(){

      $id =  request()->session()->all();
  
      $domicilios_new = [];

      
 
       $domicilios = Domicilio::select('estados.id_domicilio','domicilios.num_pedido', 'compradores.direccion', 'compradores.telefono', 'estados.estado')->join('estados', 'domicilios.id','=', 'estados.id_domicilio')->join('clientes', 'domicilios.nombre_cliente','=', 'clientes.nombre')->join('compradores', 'domicilios.id_comprador', '=', 'compradores.id')->where('id_domiciliario', $id['id'])->get();

    

       foreach($domicilios as $domicilio){

             if($domicilio->estado == 'en camino' ){

               return view('domicilio.camino', compact('domicilio'));
             
            
            }


       }

      //  if(!empty($domicilios)){

      //  for($i = 0 ; $i < sizeof($domicilios); $i++){

      //    if($domicilios[$i]->estado == 'en proceso'){

      //       unset($domicilios[$i]);
      //    }
      //  }
      // }
          

           return view('domicilio.camino', compact('domicilios'));

           
    
   }


   public function cambiar_estado(){

  if(request('estado') == 'entregado'){    



   $domicilios = Domicilio::select('*')->join('estados', 'domicilios.id','=', 'estados.id_domicilio')->join('clientes', 'domicilios.nombre_cliente','=', 'clientes.nombre')->join('compradores', 'domicilios.id_comprador', '=', 'compradores.id')->join('pedidos', 'domicilios.num_pedido','=','pedidos.num_pedido')->where('id_domicilio', request('id'))->get();

    

$fecha = date("Y-m-d"); 
 $estado = Estado::create([
    'id_domicilio' => request('id'),
    'estado' => 'entregado',
    'fecha' => $fecha
 ]);


 if($estado){

      
foreach ($domicilios as $domicilio){
     
   $details =[
          'title' => 'pedido entregado',
          'body' => ' tu pedido: '.$domicilio->num_pedido.' '.'fue entregado que lo disfrutes'
      ];

      Mail::to($domicilio->email)->send(new email($details));
     
   }
    

      return redirect()->route('domicilio.entregado');


} 
      
  }


  if (request('estado') == 'en camino'){



   $domicilios = Domicilio::select('*')->join('estados', 'domicilios.id','=', 'estados.id_domicilio')->join('clientes', 'domicilios.nombre_cliente','=', 'clientes.nombre')->join('compradores', 'domicilios.id_comprador', '=', 'compradores.id')->join('pedidos', 'domicilios.num_pedido','=','pedidos.num_pedido')->where('id_domicilio', request('id'))->get();

    

$fecha = date("Y-m-d"); 
 $estado = Estado::create([
    'id_domicilio' => request('id'),
    'estado' => 'en camino',
    'fecha' => $fecha
 ]);

      
 if($estado){

foreach ($domicilios as $domicilio){
     
   $details =[
          'title' => 'pedido en camino',
          'body' => ' tu pedido: '.$domicilio->num_pedido.' '.'va en camino'
      ];

      Mail::to($domicilio->email)->send(new email($details));
   }
       
  
        return redirect()->route('domicilio.camino');
}

      
 

   
}


  
if (request('estado') == 'aplazado'){


   


   $domicilios = Domicilio::select('*')->join('estados', 'domicilios.id','=', 'estados.id_domicilio')->join('clientes', 'domicilios.nombre_cliente','=', 'clientes.nombre')->join('compradores', 'domicilios.id_comprador', '=', 'compradores.id')->join('pedidos', 'domicilios.num_pedido','=','pedidos.num_pedido')->where('id_domicilio', request('id'))->get();

    

$fecha = date("Y-m-d"); 
 $estado = Estado::create([
    'id_domicilio' => request('id'),
    'estado' => 'aplazado',
    'fecha' => $fecha
 ]);

 if($estado){
      
foreach ($domicilios as $domicilio){
     
   $details =[
          'title' => 'pedido aplazado',
          'body' => ' tu pedido: '.$domicilio->num_pedido.' '.'fue aplazado'
      ];

      Mail::to($domicilio->email)->send(new email($details));
   }     return redirect()->route('domicilio.aplazado');
        
      
}

   
}


  
   
   }
    





   public function pedidos_entregados(){
      $id =  request()->session()->all();
  
      $domicilios_new = [];

      
 
       $domicilios = Domicilio::select('estados.id_domicilio','domicilios.num_pedido', 'compradores.direccion', 'compradores.telefono', 'estados.estado')->join('estados', 'domicilios.id','=', 'estados.id_domicilio')->join('clientes', 'domicilios.nombre_cliente','=', 'clientes.nombre')->join('compradores', 'domicilios.id_comprador', '=', 'compradores.id')->groupBy('id_domicilio','estado')->where('id_domiciliario', $id['id'])->get();

    

       for( $i = 0; $i < sizeof($domicilios); $i++){

             if($domicilios[$i]->estado == 'entregado'){

               $domicilios_new[$i]= $domicilios[$i];
            
            }
       }
          

           return view('domicilio.entregado', compact('domicilios_new'));

              }
   



   public function pedidos_aplazados(){

      $id =  request()->session()->all();
  
      $domicilios_new = [];

      
 
       $domicilios = Domicilio::select('estados.id_domicilio','domicilios.num_pedido', 'compradores.direccion', 'compradores.telefono', 'estados.estado', 'estados.id')->join('estados', 'domicilios.id','=', 'estados.id_domicilio')->join('clientes', 'domicilios.nombre_cliente','=', 'clientes.nombre')->join('compradores', 'domicilios.id_comprador', '=', 'compradores.id')->groupBy('id_domicilio','estado','estados.id')->where('id_domiciliario', $id['id'])->get();

    

       for( $i = 0; $i < sizeof($domicilios); $i++){

             if($domicilios[$i]->estado == 'aplazado'){

               $domicilios_new[$i]= $domicilios[$i];
            
            }
       }
          

           return view('domicilio.aplazado', compact('domicilios_new'));

   }


   public function comment(){



      $id_pedido = request('id_estado');

      
      

      

       request()->session()->put(['id_estado' => $id_pedido]);


     
      

   
       return view('domicilio.comment');
   }

   
   



 





    




   public function asunto(){

 $session = request()->session()->all();
 
      request()->validate([

         'motivo' => 'required',
         
      ]);   

    $retraso =    Retrasado::create([

                 'id_estado' => $session['id_estado'],
                 'motivo' => request('motivo')]);

 

$pedidos = Domicilio::select('domicilios.num_pedido','clientes.email','estados.id')->join('estados', 'domicilios.id','=', 'estados.id_domicilio')->join('clientes', 'domicilios.nombre_cliente', '=', 'clientes.nombre')->where('estados.id', $session['id_estado'])->get();


foreach($pedidos as $pedido){

     $details =[
          'title' => 'pedido aplazado',
          'body' => 'el pedido:'.$pedido->num_pedido.'  '.'fue aplazado por'.' '.request('motivo')
      ];

      
      

      Mail::to($pedido->email)->send(new email($details));

      
   }

   return redirect()->route('domicilio.aplazado');
      
    
 
   }
   

   
}
