



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
   

    
     
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
     
      <li><a href="{{route('logout')}}"> <span class="glyphicon glyphicon-log-out"></span> logout</a></li>
    </ul>
  </div>
</nav>


<p>por favor verifique </p>





@endsection

