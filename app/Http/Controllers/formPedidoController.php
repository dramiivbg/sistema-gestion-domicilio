<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Compradore;
use App\Models\Domicilio;
use App\Models\Estado;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class formPedidoController extends Controller
{
    public function registrar(){

        request()->validate([

            'num_pedido' => 'required',
             'articulos' => 'required',


        ]);

        if(empty(request('nombre_cliente')) && empty( request('telefono_cliente')) && empty(request('email_cliente')) &&
        empty(request('nombre_completo')) && empty(request('email_comprador')) && empty(request('direccion')) && empty(request('telefono_comprador'))){

          $pedido = Pedido::create([

            'num_pedido' => request('num_pedido'),
            'articulos' => request('articulos')
          ]);






            $comprador = Compradore::find(request('comprador_id'));

      

              $fecha = date("Y-m-d"); 
            $domicilio = Domicilio::create([

              'num_pedido' => $pedido->num_pedido,
              'id_comprador' => $comprador->id,
              'id_domiciliario' => request('domiciliario_id'),
              'nombre_cliente' => request('cliente'),
              'fecha' => $fecha
            ]);


            if($domicilio){

              $fecha = date("Y-m-d"); 

              $estado = Estado::create([
                'id_domicilio' => $domicilio->id,
                'estado' => 'en proceso',
                'fecha' => $fecha
                  

              ]);

              if($estado){
              
              return redirect()->route('domicilio.registrar');
              }
            }

          
          }


        else if(empty(request('nombre_cliente')) && empty( request('telefono_cliente')) && empty(request('email_cliente')) && !(empty(request('telefono_comprador')) && empty(request('nombre_completo')) && empty(request('email_comprador')) && empty(request('direccion')))){

          
          $pedido = Pedido::create([

            'num_pedido' => request('num_pedido'),
            'articulos' => request('articulos')
          ]);

          $comprador = Compradore::create([
            'nombre_completo' => request('nombre_completo'),
            'email' => request('email_comprador'),
            'direccion' => request('direccion'),
            'telefono' => request('telefono_comprador')
          ]);
          
        
        

         

            $fecha = date("Y-m-d"); 
          $domicilio = Domicilio::create([

            'num_pedido' => $pedido->num_pedido,
            'id_comprador' => $comprador->id,
            'id_domiciliario' => request('domiciliario_id'),
            'nombre_cliente' => request('cliente'),
            'fecha' => $fecha
          ]);

          if($domicilio){


           
            $estado = Estado::create([
              'id_domicilio' => $domicilio->id,
              'estado' => 'en proceso',
              'fecha' => $fecha
                

            ]);

            if($estado){
            
            return redirect()->route('domicilio.registrar');
            }
          }

        }
        
         else if( !(empty(request('nombre_cliente')) && empty( request('telefono_cliente')) && empty(request('email_cliente')))  && empty(request('telefono_comprador')) && empty(request('nombre_completo')) && empty(request('email_comprador')) && empty(request('direccion'))){
      
           
          $pedido = Pedido::create([

            'num_pedido' => request('num_pedido'),
            'articulos' => request('articulos')
          ]);

            
         $cliente = Cliente::create([

          'nombre' => request('nombre_cliente'),
          'telefono' => request('telefono_cliente'),
          'email' => request('email_cliente')

         ]);

         

         $fecha = date("Y-m-d"); 
         $domicilio = Domicilio::create([

           'num_pedido' => $pedido->num_pedido,
           'id_comprador' => request('comprador_id'),
           'id_domiciliario' => request('domiciliario_id'),
           'nombre_cliente' =>  $cliente->nombre,
           'fecha' => $fecha
         ]);

         if($domicilio){
         
          $estado = Estado::create([
            'id_domicilio' => $domicilio->id,
            'estado' => 'en proceso',
            'fecha' => $fecha
              

          ]);

          if($estado){
          
          return redirect()->route('domicilio.registrar');
          }
         }



         


         }

         else if( !(empty(request('nombre_cliente')) && empty( request('telefono_cliente')) && empty(request('email_cliente'))  && empty(request('telefono_comprador')) && empty(request('nombre_completo')) && empty(request('email_comprador')) && empty(request('direccion')))){
      
           
          $pedido = Pedido::create([

            'num_pedido' => request('num_pedido'),
            'articulos' => request('articulos')
          ]);

            
         $cliente = Cliente::create([

          'nombre' => request('nombre_cliente'),
          'telefono' => request('telefono_cliente'),
          'email' => request('email_cliente')

         ]);

         $comprador = Compradore::create([
          'nombre_completo' => request('nombre_completo'),
          'email' => request('email_comprador'),
          'direccion' => request('direccion'),
          'telefono' => request('telefono_comprador')
        ]);
        

         

         $fecha = date("Y-m-d"); 
         $domicilio = Domicilio::create([

           'num_pedido' => $pedido->num_pedido,
           'id_comprador' => $comprador->id,
           'id_domiciliario' => request('domiciliario_id'),
           'nombre_cliente' =>  $cliente->nombre,
           'fecha' => $fecha
         ]);

         if($domicilio){
       
          $estado = Estado::create([
            'id_domicilio' => $domicilio->id,
            'estado' => 'en proceso',
            'fecha' => $fecha
              

          ]);

          if($estado){
          
          return redirect()->route('domicilio.registrar');
          }
         }



         

        }

        }

       


      }
