
@extends('layout.plantilla')


@section('title','editar pedido')


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

            
                

                <form class="form-horizontal" method="POST" action="{{route('edit-pedido')}}">

                    @csrf
                    
                    <fieldset>
                        <legend class="text-center header">pedido</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="fname"  value="{{$pedido->num_pedido}}" name="num_pedido"  type="text"  class="form-control" readonly ><br>
                              
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="fname" name="articulos" value="{{$pedido->articulos}}" type="text"  class="form-control" value="{{old('articulos')}}"><br>
                                {!! $errors->first('articulos', '<small>:message</small><br>') !!}
                            </div>
                        </div><br>


                       

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Edit</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>





@endsection


