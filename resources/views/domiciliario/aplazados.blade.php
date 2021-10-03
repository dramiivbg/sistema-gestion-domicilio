


@extends('layout.plantilla')

@section('title','pedidos')

@section('head')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/pedido.scss">

    
@endsection

@section('content')


<nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Home management</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{route('pedido.show')}}">Home</a></li>&nbsp;

        <div class="dropdown">
          <button style="background-color: black; " class="dropbtn"> <ion-icon name="stats"></ion-icon> estadisticas</button>
          <div class="dropdown-content">
            <a href="{{route('estadisticas.entregados')}}">domicilios entregados</a>
          <a href="{{route('estadisticas.camino')}}">domicilios en camino</a>
          <a href="{{route('estadisticas.reporteDia')}}">domicilios por dias</a>
          <a href="{{route('estadisticas.proceso')}}">domicilios proceso</a>
          </div>
        </div>
       
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        
        <li><a href="{{route('logout')}}"> <span class="glyphicon glyphicon-log-out"></span> logout</a></li>
      </ul>
    </div>
  </nav>



   
  
  <div class="flexp ">
    <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="well well-sm">
    
   

      
   
  
  <br>
  <br>
  



  
      
  @foreach ($domicilios as $domicilio )




  <p> <strong>numero del domicilio <br> 
    
    <input type="text" name="id" value="{{$domicilio->id_domicilio}}" readonly>
    
    </strong>
    </p>
  

  <p> <strong>N° pedido <br> 
    
    {{$domicilio->num_pedido}}

    </strong>
    </p>
    
    
    
    <p> direccion: {{
    
    $domicilio->direccion
    
    }}</p>
    
    
    <p>telefono del comprador: {{
    
    $domicilio->telefono
    
    }}</p>
    
    <p>motivo: {{
    
        $domicilio->motivo
        
        }}</p>
    <br><br><br>
  

  @endforeach

  
        </div>
          </div>
      </div>
    </div>

 
  
  </div> 
       
    
    
      
    
  
  
       


  

    





@endsection()
