<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class formPedidoController extends Controller
{
    public function registrar(){

        request()->validate([

            'num_pedido' => 'required',
            'direccion' => 'required',
            'empresa' => 'required',
            'telefono_comprador' => 'required',
            'telefono_vendedor' => 'required',
            'email_vendedor' => 'required|email',
            'email_comprador' => 'required|email',
            'fecha_llegada' => 'required|date',
            'fecha_entregada' => 'required|date',
            'estado' => 'required',
            'domiciliario' => 'required'

        ]);

       

      $pedido = Pedido::create([

        'num_pedido' => request('num_pedido'),
        'direccion' => request('direccion'),
        'id_domiciliario' => request('domiciliario'),
        'empresa_cliente' => request('empresa'),
        'telefono_comprador' => request('telefono_comprador'),
        'telefono_vendedor' => request('telefono_vendedor'),
        'email_vendedor' => request('email_vendedor')
        ,'email_comprador' => request('email_comprador'),
        'estado' => request('estado'),
        'fecha_llegada' => request('fecha_llegada'),
        'fecha_entrega' => request('fecha_entregada')
      ]);

      if($pedido){

        echo "<script>alert('domicilio creado satisfactoriamente');</script>";

        return redirect()->route('register1');
      }else{

        echo "<script>alert('error inesperado, ¡vuelve a intentarlo!');</script>";

        return redirect()->route('register1');
      }
    }
}
