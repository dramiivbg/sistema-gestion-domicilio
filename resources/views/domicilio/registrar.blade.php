



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

          
              

              <form class="form-horizontal" method="POST" action="{{route('domicilio')}}">

                  @csrf
                  
                  <fieldset>
                      <legend class="text-center header">crear domicilio</legend>

                     

                      <div class="form-group">

                        <h1 style="text-align: center">pedido</h1><br>
                          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                          <div class="col-md-8">
                              <input id="fname" name="num_pedido" type="text" placeholder="numero del pedido" class="form-control" value="{{old('num_pedido')}}"><br>

  
                              {!! $errors->first('num_pedido', '<small>:message</small><br>') !!}

                    
                          </div>
                      </div>


                      <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                        <div class="col-md-8">
                            <input id="fname" name="articulos" type="text" placeholder="articulos" class="form-control" value="{{old('articulos')}}"><br>


                            {!! $errors->first('articulos', '<small>:message</small><br>') !!}

                  
                        </div>
                    </div>

                    <div class="center">

                      <label for=""> elejir cliente</label>
                      <select  name="cliente">
                        @php
                            

                            $clientes = App\Models\Cliente::all();
                       
                            foreach ($clientes as $cliente) {
                              
                           

                   
                           echo '<option value="'.$cliente->nombre .'">'. $cliente->nombre.'</option>';
                       
                        
                          }
                         
                       
                      
                       @endphp
                          
                        </select><br>
                   
                        {!! $errors->first('domiciliario','<small>:message</small><br>') !!}
                      </div><br>

                 
                 <p style="text-align: center"> si no se encuentra el cliente por favor dar clic en el checkbox para crearlo</p>

              


                    <div class="form-group">
                      <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                      <div class="col-md-8">

                    <input type="checkbox" name="check" id="check" value="1" onchange="javascript:showContent()" />

                  </div>
                </div>

                    <div id="content" style="display: none;"><br>
                     
                      <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                        <div class="col-md-8">
                            
                        <input id="phone" name="nombre_cliente" type="text" placeholder="nombre cliente" class="form-control" value="{{old('nombre_cliente')}}"><br>
                        {!! $errors->first('nombre_cliente' ,'<small>:message</small><br>') !!}
                    </div>
                    </div><br/>
                    <div class="form-group">
                      <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                      <div class="col-md-8">
                          
                      <input id="phone" name="telefono_cliente" type="text" placeholder="numero de telefono" class="form-control" value="{{old('telefono_cliente')}}"><br>
                      {!! $errors->first('telefono_cliente' ,'<small>:message</small><br>') !!}
                  </div>
                  </div><br/>
                  <div class="form-group">
                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                    <div class="col-md-8">
                        
                    <input id="phone" name="email_cliente" type="text" placeholder="correo electronico" class="form-control" value="{{old('email_cliente')}}"><br>
                    {!! $errors->first('email_cliente' ,'<small>:message</small><br>') !!}
                </div>
                </div><br/>
                    </div>



                 

                    <div class="center">

                      <label for=""> elejir comprador</label>
                      <select  name="comprador_id">
                        @php
                            

                            $compradores = App\Models\Compradore::all();
                       
                            foreach ($compradores as $comprador) {
                              
                           

                   
                           echo '<option value="'.$comprador->id .'">'. $comprador->nombre_completo.'</option>';
                       
                        
                          }
                         
                       
                      
                       @endphp
                          
                        </select><br>
                   
                        {!! $errors->first('domiciliario','<small>:message</small><br>') !!}
                      </div><br>

                 
                 <p style="text-align: center"> si no se encuentra el comprador por favor dar clic en el checkbox para crearlo</p>

                   


                    <div class="form-group">
                      <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                      <div class="col-md-8">

                    <input type="checkbox" name="check" id="check1" value="1" onchange="javascript:showContent1()" />

                  </div>
                </div>

                    <div id="content1" style="display: none;"><br>
                     
                      <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                        <div class="col-md-8">
                            
                        <input id="phone" name="nombre_completo" type="text" placeholder="nombre comprador" class="form-control" value="{{old('nombre_completo')}}"><br>
                        {!! $errors->first('nombre_completo' ,'<small>:message</small><br>') !!}
                    </div>
                    </div><br/>
                    <div class="form-group">
                      <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                      <div class="col-md-8">
                          
                      <input id="phone" name="email_comprador" type="text" placeholder="email" class="form-control" value="{{old('email_comprador')}}"><br>
                      {!! $errors->first('email_comprador' ,'<small>:message</small><br>') !!}
                  </div>
                  </div><br/>
                  <div class="form-group">
                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                    <div class="col-md-8">
                        
                    <input id="phone" name="direccion" type="text" placeholder="direccion" class="form-control" value="{{old('email')}}"><br>
                    {!! $errors->first('direccion' ,'<small>:message</small><br>') !!}
                </div>
                </div><br/>
                <div class="form-group">
                  <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                  <div class="col-md-8">
                      
                  <input id="phone" name="telefono_comprador" type="text" placeholder="telefono" class="form-control" value="{{old('telefono_comprador')}}"><br>
                  {!! $errors->first('telefono_comprador' ,'<small>:message</small><br>') !!}
              </div>
              </div>
                    </div><br>


                    <div class="center">

                      <label for=""> elejir domiciliario</label>
                      <select  name="domiciliario_id">
                        @php
                            

                            $domiciliarios = App\Models\Operadore::where('rol','domiciliario')->get();
                       
                            foreach ($domiciliarios as $domiciliario) {
                              
                           

                   
                           echo '<option value="'.$domiciliario->id .'">'. $domiciliario->nombre_completo.'</option>';
                       
                        
                          }
                         
                       
                      
                       @endphp
                          
                        </select>
                    </div>
                        <br>
                   
                    



                     
                          <div class="center">
                      <div class="form-group">
                          <div class="col-md-12 text-center">
                              <button type="submit" class="btn btn-primary btn-lg">crear</button>
                          </div>
                      </div>
                          </div>
                  </fieldset>
              </form>
          </div>
      </div>
  </div>
</div>



<script type="text/javascript">
  function showContent() {
      element = document.getElementById("content");
      check = document.getElementById("check");
      if (check.checked) {
          element.style.display='block';
      }
      else {
          element.style.display='none';
      }
  }
</script>


<script type="text/javascript">
  function showContent1() {
      element = document.getElementById("content1");
      check = document.getElementById("check1");
      if (check.checked) {
          element.style.display='block';
      }
      else {
          element.style.display='none';
      }
  }
</script>



@endsection


