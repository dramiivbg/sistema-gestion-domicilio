<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @yield('head')

    <style>

@media only screen and (max-width: 600px){

    
}

    </style>

    <title>@yield('title')</title>

    <!--css--->

  
    

</head>
<body>
    
@yield('content')

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

<script type="text/javascript">
    $(function() {
       $('#datetimepicker').datetimepicker();
    });
</script>    

<script type="text/javascript">
    $(function() {
       $('#datetimepicker1').datetimepicker();
    });
</script>    

<script type="text/javascript">
    $(function() {
       $('#datetimepicker2').datetimepicker();
    });
</script>    

</html>