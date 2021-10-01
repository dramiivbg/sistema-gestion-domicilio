<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
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





public function viewReporteDia(){


    $totales = [];


    $totales[0] = 0;
    $totales[1] = 0;
    $totales[2] = 0;
    $totales[3] = 0;
    $totales[4] =  0;
    $totales[5] =  0;
    $totales[6] =  0;
    $totales[7] =  0;
    $totales[8] =  0;
    $totales[9] =  0;
    $totales[10] =  0;
    $totales[11] =  0;
    $totales[12] = 0;
    $totales[13] =  0;
    $totales[14] = 0;
    $totales[15] =  0;
    $totales[16] =  0;
    $totales[17] =  0;
    $totales[18] = 0;
    $totales[19] =  0;
    $totales[20] =  0;
    $totales[21] =  0;
    $totales[22] =  0;
    $totales[23] =  0;
    $totales[24] =  0;
    $totales[25] =  0;
    $totales[26] =  0;
    $totales[27] =  0;
    $totales[28] =  0;
    $totales[29] =  0;
    $totales[30] =  0;




    return view('estadisticas.reporteDia', compact('totales'));
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


    public function totales_ReporteDia(){


         $totales = [];

         $mes = request('mes');
         $año = request('año');

        
    

         $totales[0] = Domicilio::where('fecha',$año.'-'.$mes.'-'.'01')->get()->count();
         
         $totales[1] = Domicilio::where('fecha',$año.'-'.$mes.'-'.'02')->get()->count();
         $totales[2] = Domicilio::where('fecha',$año.'-'.$mes.'-'.'03')->get()->count();
         $totales[3] = Domicilio::where('fecha',$año.'-'.$mes.'-'.'04')->get()->count();
         $totales[4] = Domicilio::where('fecha',$año.'-'.$mes.'-'.'05')->get()->count();
         $totales[5] = Domicilio::where('fecha',$año.'-'.$mes.'-'.'06')->get()->count();
         $totales[6] = Domicilio::where('fecha',$año.'-'.$mes.'-'.'07')->get()->count();
         $totales[7] = Domicilio::where('fecha',$año.'-'.$mes.'-'.'08')->get()->count();
         $totales[8] = Domicilio::where('fecha',$año.'-'.$mes.'-'.'09')->get()->count();
         $totales[9] = Domicilio::where('fecha',$año.'-'.$mes.'-'.'10')->get()->count();
         $totales[10] = Domicilio::where('fecha',$año.'-'.$mes.'-'.'11')->get()->count();
         $totales[11] = Domicilio::where('fecha',$año.'-'.$mes.'-'.'12')->get()->count();
         $totales[12] = Domicilio::where('fecha',$año.'-'.$mes.'-'.'13')->get()->count();
         $totales[13] = Domicilio::where('fecha',$año.'-'.$mes.'-'.'14')->get()->count();
         $totales[14] = Domicilio::where('fecha',$año.'-'.$mes.'-'.'15')->get()->count();
         $totales[15] = Domicilio::where('fecha',$año.'-'.$mes.'-'.'16')->get()->count();
         $totales[16] = Domicilio::where('fecha',$año.'-'.$mes.'-'.'17')->get()->count();
         $totales[17] = Domicilio::where('fecha',$año.'-'.$mes.'-'.'18')->get()->count();
         $totales[18] = Domicilio::where('fecha',$año.'-'.$mes.'-'.'19')->get()->count();
         $totales[19] = Domicilio::where('fecha',$año.'-'.$mes.'-'.'20')->get()->count();
         $totales[20] = Domicilio::where('fecha',$año.'-'.$mes.'-'.'21')->get()->count();
         $totales[21] = Domicilio::where('fecha',$año.'-'.$mes.'-'.'22')->get()->count();
         $totales[22] = Domicilio::where('fecha',$año.'-'.$mes.'-'.'23')->get()->count();
         $totales[23] = Domicilio::where('fecha',$año.'-'.$mes.'-'.'24')->get()->count();
         $totales[24] = Domicilio::where('fecha',$año.'-'.$mes.'-'.'25')->get()->count();
         $totales[25] = Domicilio::where('fecha',$año.'-'.$mes.'-'.'26')->get()->count();
         $totales[26] = Domicilio::where('fecha',$año.'-'.$mes.'-'.'27')->get()->count();
         $totales[27] = Domicilio::where('fecha',$año.'-'.$mes.'-'.'28')->get()->count();
         $totales[28] = Domicilio::where('fecha',$año.'-'.$mes.'-'.'29')->get()->count();
         $totales[29] = Domicilio::where('fecha',$año.'-'.$mes.'-'.'30')->get()->count();

         $totales[30] = Domicilio::where('fecha',$año.'-'.$mes.'-'.'31')->get()->count();


        
        return view('estadisticas.reporteDia', compact('totales'));


    }


  

}
