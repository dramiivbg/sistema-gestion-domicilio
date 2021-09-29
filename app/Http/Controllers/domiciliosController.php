<?php

namespace App\Http\Controllers;

use App\Models\Domicilio;
use Illuminate\Http\Request;

class domiciliosController extends Controller
{
    public function domicilios_entregados(){

        $id = request('id');

        $domicilio = Domicilio::select('*')->join('estados', 'domicilios.id','=', 'estados.id_domicilio')->join('clientes', 'domicilios.nombre_cliente','=', 'clientes.nombre')->join('compradores', 'domicilios.id_comprador', '=', 'compradores.id')->where('id_domiciliario', $id)->get();

       $domicilios = $domicilio->where('estado', 'entregado');

        return view('domiciliario.entregados', compact('domicilios'));
    


    }


    public function domicilios_en_camino(){

        $id = request('id');

        $domicilio = Domicilio::select('*')->join('estados', 'domicilios.id','=', 'estados.id_domicilio')->join('clientes', 'domicilios.nombre_cliente','=', 'clientes.nombre')->join('compradores', 'domicilios.id_comprador', '=', 'compradores.id')->where('id_domiciliario', $id)->get();

       $domicilios = $domicilio->where('estado', 'en camino');

        return view('domiciliario.caminos', compact('domicilios'));
    


    }


    public function domicilios_en_proceso(){

        $id = request('id');

        $domicilio = Domicilio::select('*')->join('estados', 'domicilios.id','=', 'estados.id_domicilio')->join('clientes', 'domicilios.nombre_cliente','=', 'clientes.nombre')->join('compradores', 'domicilios.id_comprador', '=', 'compradores.id')->where('id_domiciliario', $id)->get();

       $domicilios = $domicilio->where('estado', 'en proceso');

        return view('domiciliario.proceso', compact('domicilios'));
    


    }

    public function domicilios_aplazados(){

        $id = request('id');

        $domicilio = Domicilio::select('*')->join('estados', 'domicilios.id','=', 'estados.id_domicilio')->join('clientes', 'domicilios.nombre_cliente','=', 'clientes.nombre')->join('compradores', 'domicilios.id_comprador', '=', 'compradores.id')->join('retrasados', 'estados.id','=','retrasados.id_estado')->where('id_domiciliario', $id)->get();

       $domicilios = $domicilio->where('estado', 'aplazado');

        return view('domiciliario.aplazados', compact('domicilios'));
    


    }
}
