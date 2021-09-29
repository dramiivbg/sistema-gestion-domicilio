<?php

namespace App\Http\Controllers;

use App\Models\Domicilio;
use Illuminate\Http\Request;

class grafiController extends Controller
{
    public function viewEntregado(){

        $total = 0;
    
        

        return view('estadisticas.entregados', compact('total'));

    }


    public function viewProceso(){

        $total = 0;
    
        

        return view('estadisticas.proceso', compact('total'));

    }

    public function viewCamino(){

        $total = 0;
    
        

        return view('estadisticas.camino', compact('total'));

    }

    public function viewAplazados(){

        $total = 0;
    
        

        return view('estadisticas.aplazados', compact('total'));

    }


    public function total_camino(){

        $id = request('id');
        
        $domicilios = Domicilio::select('*')->join('estados', 'domicilios.id','=','estados.id_domicilio')->where('id_domiciliario', $id)->get();


        
     $total =  $domicilios->where('estado','en camino')->count();

   
     
    

      return view('estadisticas.camino', compact('total'));
        
    }





    public function total_proceso(){

        $id = request('id');
        
        $domicilios = Domicilio::select('*')->join('estados', 'domicilios.id','=','estados.id_domicilio')->where('id_domiciliario', $id)->get();


        
     $total =  $domicilios->where('estado','en proceso')->count();

   
     
    

      return view('estadisticas.proceso', compact('total'));
        
    }

    



    public function total_aplazados(){

        $id = request('id');
        
        $domicilios = Domicilio::select('*')->join('estados', 'domicilios.id','=','estados.id_domicilio')->where('id_domiciliario', $id)->get();


        
     $total =  $domicilios->where('estado','aplazado')->count();

   
     
    

      return view('estadisticas.aplazados', compact('total'));
        
    }


    public function total_entregados(){

        $id = request('id');
        
        $domicilios = Domicilio::select('*')->join('estados', 'domicilios.id','=','estados.id_domicilio')->where('id_domiciliario', $id)->get();


        
     $total =  $domicilios->where('estado','entregado')->count();

   
     
    

      return view('estadisticas.entregados', compact('total'));
        
    }
}
