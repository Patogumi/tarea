<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

		<!-- amCharts custom font -->
		<link href='https://fonts.googleapis.com/css?family=Covered+By+Your+Grace' rel='stylesheet' type='text/css'>
		
		<!-- amCharts javascript sources -->
		<script type="text/javascript" src="https://www.amcharts.com/lib/3/amcharts.js"></script>
		<script type="text/javascript" src="https://www.amcharts.com/lib/3/serial.js"></script>
		<script type="text/javascript" src="https://www.amcharts.com/lib/3/themes/chalk.js"></script>
		
@yield('special')



    <title>App Test - @yield('title')</title>
  </head>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2">
                @section('sidebar')
                    <h2>SonGokU</h2>
                    <h4>Tu cancionero Saijajin</h4>
                    <ul>
                      <li><a href="{{ route('inicio') }}">Bienvenida</a></li>
                      <li><a href="{{ route('search') }}">La aplicación</a></li>
                      <li><a href="{{ route('dbcheck') }}">Revisión de los datos almacenados</a></li>
                      <li><a href="{{ route('app') }}">Para jugar con formularios</a></li>
                      <li><a href="{{ route('am') }}">Una pruebita básica</a></li>
                    </ul>
                    
                @show
            </div>
            <div class="col-9">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Axios -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <!-- AMCharts -->

    <script src="https://cdn.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js"></script>


  </body>
</html>