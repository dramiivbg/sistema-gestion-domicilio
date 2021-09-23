


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
        <li class="active"><a href="{{route('pedido.entregado')}}">pedidos entregados</a></li>
       
        <li class="active"><a href="{{route('pedido.aplazado')}}">pedidos aplazados</a></li>
       
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href=""><span class="glyphicon glyphicon-user"></span> Sr.sanchez</a></li>
        <li><a href="{{route('logout')}}"> <span class="glyphicon glyphicon-log-out"></span> logout</a></li>
      </ul>
    </div>
  </nav>



   
  <div class="flexp ">
    
    

  
  
    
    <form  method="POST" action="" >

     
        @csrf
   
  
  
      <div class="form-group">


        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
        <div class="col-md-8">
         
           

            <textarea name="nota" id="" cols="30" rows="10">

              
            </textarea>
         
            <br>
            {!! $errors->first('nota','<small>:message</small><br>') !!}
        
        </div>
    </div>

  


 

  <button type="submit" class="btn btn-primary btn-lg">enviar</button>

    </form>
        
       
  </div> 
    
      
    
  
  
      


    





@endsection()