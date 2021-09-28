

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
        <li class="active"><a href="{{route('pedido.show')}}">Home</a></li>
        <li class="active"><a href="{{route('domicilio.entregado')}}">pedidos entregados</a></li>
       
        <li class="active"><a href="{{route('domicilio.pedidos')}}">pedidos</a></li>
       
        <li class="active"><a href="{{route('domicilio.camino')}}">pedidos en camino</a></li>
        
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
    
    <form  method="POST" action="{{route('pedido.comment')}}">

      @csrf
   
  
  <br>
  <br>
  

 
  
  @foreach ($domicilios_new as $domicilio )


  <p> <strong> <br> 
    
    <input type="text" name="id_estado" value="{{$domicilio->id}}" readonly>
    
    </strong>
    </p>


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
  
  

  <button type="submit" class="btn btn-primary btn-lg">comentar inconveniente</button>

    </form>
        </div>
          </div>
      </div>
    </div>
  
  </div> 
       
    
    
      
    
  
  
       
  @endforeach

    





@endsection()

    
       
    
    
      
    
  
  

    







