@extends('layout.plantilla')


@section('title','change password')


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

            
                

                <form class="form-horizontal" method="post" action="{{route('change')}}">

                    @csrf
                    
                    <fieldset>
                        <legend class="text-center header">Change Password</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="fname" name="username" type="text" placeholder="email" class="form-control" value="{{old('username')}}"><br>
                                {!! $errors->first('username', '<small>:message</small><br>') !!}
                            </div>
                        </div>


                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="lname" name="new_password" type="password" placeholder="new password" class="form-control" value="{{old('password')}}"><br>
                                {!! $errors->first('new_password','<small>:message</small><br>') !!}
                            
                            </div>
                        </div>



                      

                       

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Change</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>





@endsection



