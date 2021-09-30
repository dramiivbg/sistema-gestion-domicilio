



@extends('layout.plantilla')

@section('title','en camino')

@section('head')


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/chart.js'></script>


<link rel="stylesheet" type="text/css" href="css/register.css">







    
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
          <a href="{{route('estadisticas.reporteDia')}}">domicilios por dias</a>
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

<form method="POST" action='{{route('camino')}}'>

  
   
    @csrf

    <div  style="float: left;">

        <label for=""> elejir domiciliario</label>
        <select  name="id"  style="width: 70%; text-align: center">
          @php
              

              $domiciliarios = App\Models\Operadore::where('rol','domiciliario')->get();
         
              foreach ($domiciliarios as $domiciliario) {
                
             

     
             echo '<option value="'.$domiciliario->id .'">'. $domiciliario->nombre_completo.'</option>';
         
          
            }
           
         
        
         @endphp
            
          </select>
      </div><br>

      <div  style=" float: left;">
        <div class="form-group">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary btn-lg" >enviar</button>
            </div>
        </div>
            </div>

    </form>

    <form method="POST" action='{{route('domiciliario.caminos')}}'>

  
   
      @csrf
  
      <div  style="float: right">
  
          <label for=""> elejir domiciliario</label>
          <select  name="id"  style="width: 70%; text-align: center">
            @php
                
  
                $domiciliarios = App\Models\Operadore::where('rol','domiciliario')->get();
           
                foreach ($domiciliarios as $domiciliario) {
                  
               
  
       
               echo '<option value="'.$domiciliario->id .'">'. $domiciliario->nombre_completo.'</option>';
           
            
              }
             
           
          
           @endphp
              
            </select>
        </div><br>
  
        <div  style="float: right;">
          <div class="form-group">
              <div class="col-md-12 text-center">
                  <button type="submit"  class="btn btn-primary btn-lg" >ver domicilios</button>
              </div>
          </div>
              </div>
  
      </form>
  
    <br><br><br><br><br><br>
    

  


<canvas id='myChart' width='0' height='0'></canvas>
            
<script>


var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['activos'],
        datasets: [{
            label: 'Total',
            data: [{{$total}}],
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

