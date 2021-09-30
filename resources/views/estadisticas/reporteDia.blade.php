



@extends('layout.plantilla')

@section('title','reporte por dias')

@section('head')


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/chart.js'></script>


<link rel="stylesheet" type="text/css" href="css/register.css">

<script src='https://cdn.jsdelivr.net/npm/chart.js'></script>
          <style>


          .center{

            text-align: center;
            
            }

            input[type='submit']{

                padding:  10px;
                color: #fff;
                background: #0098cb;
                width: 200px;
              
              
                margin: 20px auto;
                margin-top: 0;
                border: 0;
                border-radius: 3px;
                cursor: pointer;
              }

              .derecha   { float: left; }

              .dimensiones{


                  width: 50px;
                  height: 50px;
                }

          </style>
          







    
@endsection



@section('content')


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Home management</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="{{route('home')}}">Home</a></li>&nbsp;

      <div class="dropdown">
        <button style="background-color: black" class="dropbtn"> <ion-icon name="stats"></ion-icon> estadisticas</button>
        <div class="dropdown-content">
          <a href="{{route('estadisticas.entregados')}}">domicilios entregados</a>
          <a href="{{route('estadisticas.camino')}}">domicilios en camino</a>
          <a href="{{route('estadisticas.aplazados')}}">domicilios aplazados</a>
          <a href="{{route('estadisticas.proceso')}}">domicilios proceso</a>
        </div>
      </div>
     
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
     
      <li><a href="{{route('logout')}}"> <span class="glyphicon glyphicon-log-out"></span> logout</a></li>
    </ul>
  </div>
</nav>



    <form  method='POST' action='{{route('reporteDia')}}'>

        @csrf


    <div class='center'>
      <label for='cars'>Choose Año:</label>
      <select name='año'>
        <option value='2021'>2021</option>
        <option value='2022'>2022</option>
        <option value='2023'>2023</option>
        <option value='2024'>2024</option>
        <option value='2025'>2025</option>
        <option value='2026'>2026</option>
        <option value='2027'>2027</option>
        <option value='2028'>2028</option>
        <option value='2029'>2029</option>
        <option value='2030'>2030</option>
       
      </select>
    <label for='cars'>Choose a Mes:</label>
    <select name='mes'>
      <option value='01'>Enero</option>
      <option value='02'>Febrero</option>
      <option value='03'>Marzo</option>
      <option value='04'>Abril</option>
      <option value='05'>Mayo</option>
      <option value='06'>Junio</option>
      <option value='07'>Julio</option>
      <option value='08'>Agosto</option>
      <option value='09'>Septiembre</option>
      <option value='10'>Octubre</option>
      <option value='11'>Noviembre</option>
      <option value='12'>Diciembre</option>
     
    </select>
 
   
      <br><br>
      <input type='submit' value='eleccion'>
      </div>
    </form><br>
  
  

  
  <br><br><br><br><br><br>
    

  @php
      
     $total1 =  $totales[0];
     $total2 =  $totales[1];
     $total3 =  $totales[2]; 
     $total4 =  $totales[3];
     $total5 =  $totales[4];
     $total6 = $totales[5];
     $total7 = $totales[6];
     $total8 = $totales[7];
     $total9  = $totales[8]; 
     $total10 = $totales[9]; 
     $total11 = $totales[10];
     $total12 = $totales[11]; 
     $total13 = $totales[12]; 
     $total14 = $totales[13]; 
     $total15 = $totales[14]; 
     $total16 = $totales[15];
     $total17 = $totales[16]; 
     $total18 = $totales[17]; 
     $total19 = $totales[18]; 
     $total20 = $totales[19]; 
     $total21 = $totales[20]; 
     $total22 = $totales[21]; 
     $total23 = $totales[22]; 
     $total24 = $totales[23];
     $total25 = $totales[24];
     $total26 = $totales[25];
     $total27 = $totales[26]; 
     $total28 = $totales[27]; 
     $total29 = $totales[28];
     $total30 = $totales[29]; 
     $total31 = $totales[30];

  @endphp

  

    <canvas id='myChart' width='0' height='0'></canvas>

    
    
    <script>
    
    
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19',
               '20','21','22','23','24','25','26','27','28','29','30','31'],
            datasets: [{
                label: ' # dias visitados',

             
                data: [{{$total1}},{{$total2}}, {{$total3}}, {{$total4}}, {{$total5}}, {{$total6}}, {{$total7}}, {{$total8}}, {{$total9}}, {{$total10}},
                {{$total11}}, {{$total12}}, {{$total13}}, {{$total14}}, {{$total15}}, {{$total16}}, {{$total17}}, {{$total18}}, {{$total19}}, {{$total20}},
                {{$total21}}, {{$total22}}, {{$total23}}, {{$total24}}, {{$total25}}, {{$total26}}, {{$total27}}, {{$total28}}, {{$total29}}, {{$total30}},
                {{$total31}}],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    
    
    
    </script>
   





@endsection

