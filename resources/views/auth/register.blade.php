



@extends('layout.plantilla')


@section('title','registrar operador')


@section('head')


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/register.css">
    
@endsection

@section('content')

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Home management</a>
      </div>
      <ul class="nav navbar-nav">
       
      </ul>
   
    </div>
  </nav>

  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">

            
                

                <form class="form-horizontal" method="POST" action="{{route('register1')}}">

                    @csrf
                    
                    <fieldset>
                        <legend class="text-center header">operator</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="fname" name="name" type="text" placeholder="full name" class="form-control" value="{{old('name')}}"><br>
                                {!! $errors->first('name', '<small>:message</small><br>') !!}
                            </div>
                        </div>


                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                
                            <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control" value="{{old('phone')}}"><br>
                            {!! $errors->first('phone' ,'<small>:message</small><br>') !!}
                        </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="fname" name="cedula" type="number" placeholder="ID number" class="form-control" value="{{old('cedula')}}"><br>
                                {!! $errors->first('cedula','<small>:message</small><br>') !!}
                            </div>

                        </div>

                      
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                                
                              <input id="email" name="email" type="text" placeholder="Email Address" class="form-control" value="{{old('email')}}"><br>
                              {!! $errors->first('email','<small>:message</small><br>') !!}
                            
                            </div>
                        </div>

                        <div class="form-group">


                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="lname" name="password" type="password" placeholder="password" class="form-control" value="{{old('password')}}"><br>
                                {!! $errors->first('password','<small>:message</small><br>') !!}
                            
                            </div>
                        </div>


                      
                        <div class="center">

                            <label for=""> roles</label>
                            <select  name="rol">
                                <option value="domiciliario">domiciliario</option>
                                
                                
                                
                              </select><br>
                         
                              {!! $errors->first('rol','<small>:message</small><br>') !!}
                            </div><br>

                       

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>





@endsection



