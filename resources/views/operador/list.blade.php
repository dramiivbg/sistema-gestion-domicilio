  @extends('layout.plantilla')

@section('title','pedidos')

@section('head')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>




    
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
  


@foreach ($operadores as $operador)

<div class="card-header">

    <input  type="text" class="form-control">
</div>



<table class="table table-responsive table-bordered" >
    <thead class="thead-dark">
      <tr>
        <th scope="col">nombre completo</th>
        <th scope="col">telefono</th>
        <th scope="col">N° cedula</th>
        <th scope="col">rol</th>
        <th scope="col">tag</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">{{$operador->nombre_completo}}</th>
        <td>{{$operador->telefono}}</td>
        <td>{{$operador->num_cedula}}</td>
        <td>{{$operador->rol}}</td>
        <td>
          <form method="post"  action="{{route('operador.edit',$operador)}}">

            @csrf

            <input style="width: 0vh; height: 0vh;"  value="{{$operador->id}}" name="id">

            <button type="submit" style="width: 90px; height: 40px;"  class="btn btn-primary btn-lg"><ion-icon name="create"></ion-icon>edit</button>

 
        
        </form>
        
       

      
            
        </td>
        
      </tr>
    </tbody>
  </table>



  <div class="card-footer">

    {{$operadores->links()}}
  </div>
  
  
  
    
@endforeach
  

@endsection()
