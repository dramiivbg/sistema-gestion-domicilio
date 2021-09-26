


@extends('layout.plantilla')

@section('title','comment')

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
        

        
              
          
        
        <li><a href="{{route('logout')}}"> <span class="glyphicon glyphicon-log-out"></span> logout</a></li>
      </ul>
    </div>
  </nav>



   
  <div class="flexp ">
    
    

  
  
    
    <form  method="POST" class="form-horizontal" action="{{route('pedido.asunto')}}" >

     
        @csrf
   
  
  
      <div class="form-group">


        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
        <div class="col-md-8">
         
           <label for="">motivo de aplazo</label><br>

            <textarea name="motivo" id="" cols="60" rows="15">

                
              
            </textarea>
         
            <br>
            {!! $errors->first('motivo','<small>:message</small><br>') !!}
        
        </div>
    </div><br>


    <div class="form-group">

      <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
      <div class="col-md-8">

      <label for="">nueva fecha</label>
        <div class='input-group date' id='datetimepicker2'>
        <input type='text' class="form-control"  name="nueva_fecha" value="{{old('nueva_fecha')}}"/><br>
        {!! $errors->first('nueva_fecha','<small>:message</small><br>') !!}
        <span class="input-group-addon">
          <span class="glyphicon glyphicon-calendar"></span>
        </span>
        </div>
    </div>
</div><br>

    <div class="center1">
        <div class="form-group">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
            </div>
        </div>
            </div>

  


 



    </form>
        
       
  </div> 
    
      
    
  
  
      


    





@endsection()