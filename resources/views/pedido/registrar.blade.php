



@extends('layout.plantilla')

@section('title','registrar pedido')

@section('head')


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/register.css">

<!--dependencias de datepicker-->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">




@php
    
// session_start();

// $id = seccion('id');


// if(empty($id)){


//   return redirect('login');

// }

    
@endphp


    
@endsection



@section('content')


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Home management</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="{{route('home')}}">Home</a></li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
     
      <li><a href="{{route('logout')}}"> <span class="glyphicon glyphicon-log-out"></span> logout</a></li>
    </ul>
  </div>
</nav>


<div class="container">
  <div class="row">
      <div class="col-md-12">
          <div class="well well-sm">

          
              

              <form class="form-horizontal" method="POST" action="{{route('domicilio1')}}">

                  @csrf
                  
                  <fieldset>
                      <legend class="text-center header">programar domicilio</legend>

                      <div class="form-group">
                          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                          <div class="col-md-8">
                              <input id="fname" name="num_pedido" type="text" placeholder="numero del pedido" class="form-control" value="{{old('num_pedido')}}"><br>

  
                              {!! $errors->first('num_pedido', '<small>:message</small><br>') !!}

                    
                          </div>
                      </div>


                      <div class="form-group">
                          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                          <div class="col-md-8">
                              
                          <input id="phone" name="direccion" type="text" placeholder="direccion" class="form-control" value="{{old('direccion')}}"><br>
                          {!! $errors->first('direccion' ,'<small>:message</small><br>') !!}
                      </div>
                      </div>

                      <div class="form-group">
                          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                          <div class="col-md-8">
                              <input id="fname" name="empresa" type="text" placeholder="empresa" class="form-control" value="{{old('empresa')}}"><br>
                              {!! $errors->first('empresa','<small>:message</small><br>') !!}
                          </div>

                      </div>

                    
                      <div class="form-group">
                          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                          <div class="col-md-8">
                              
                            <input id="email" name="telefono_comprador" type="text" placeholder="telefono del comprador" class="form-control" value="{{old('telefono_comprador')}}"><br>
                            {!! $errors->first('telefono_comprador','<small>:message</small><br>') !!}
                          
                          </div>
                      </div>

                      <div class="form-group">


                          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                          <div class="col-md-8">
                              <input id="lname" name="telefono_vendedor" type="text" placeholder="telefono del vendedor" class="form-control" value="{{old('telefono_vendedor')}}"><br>
                              {!! $errors->first('telefono_vendedor','<small>:message</small><br>') !!}
                          
                          </div>
                      </div>

                      <div class="form-group">


                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                        <div class="col-md-8">
                            <input id="lname" name="email_vendedor" type="text" placeholder="email del vendedor" class="form-control" value="{{old('email_vendedor')}}"><br>
                            {!! $errors->first('email_vendedor','<small>:message</small><br>') !!}
                        
                        </div>
                    </div>

                    <div class="form-group">


                      <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                      <div class="col-md-8">
                          <input id="lname" name="email_comprador" type="text" placeholder="email del comprador" class="form-control" value="{{old('email_comprador')}}"><br>
                          {!! $errors->first('email_comprador','<small>:message</small><br>') !!}
                      
                      </div>
                  </div>

                      
                       <div class="container mt-5" style="text-align: center;">
                
                        <div class="form-group">

                          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                          <div class="col-md-8">

                          <label for="">fecha de llegada</label>
                            <div class='input-group date' id='datetimepicker'>
                            <input type='text' class="form-control"  name="fecha_llegada" value="{{old('fecha_llegada')}}"/><br>
                            {!! $errors->first('fecha_llegada','<small>:message</small><br>') !!}
                            <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                            </div>
                        </div>
                   </div>

                 
                       </div> 
                    
                  
                    <br><br>
                    <div class="container mt-5" style="text-align: center;">
                
                      <div class="form-group">

                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                        <div class="col-md-8">

                        <label for="">fecha de entregada</label>
                          <div class='input-group date' id='datetimepicker1'>
                          <input type='text' class="form-control"  name="fecha_entregada" value="{{old('fecha_entregada')}}"/><br>
                          {!! $errors->first('fecha_entregada','<small>:message</small><br>') !!}
                          <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                          </div>
                      </div>
                 </div>

               
                     </div> 
                  
                <br>
                


                     


                    
                      <div class="center">

                          <label for=""> elejir domiciliario</label>
                          <select  name="domiciliario">
                            @php
                                

                                $domiciliarios = App\Models\Operadore::where('rol','domiciliario')->get();
                           
                                foreach ($domiciliarios as $domiciliario) {
                                  
                               
  
                       
                               echo '<option value="'.$domiciliario->id .'">'. $domiciliario->nombre_completo.'</option>';
                           
                            
                              }
                             
                           
                          
                           @endphp
                              
                            </select><br>
                       
                            {!! $errors->first('domiciliario','<small>:message</small><br>') !!}
                          </div><br>

                     
                          <div class="center">
                      <div class="form-group">
                          <div class="col-md-12 text-center">
                              <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                          </div>
                      </div>
                          </div>
                  </fieldset>
              </form>
          </div>
      </div>
  </div>
</div>






@endsection


