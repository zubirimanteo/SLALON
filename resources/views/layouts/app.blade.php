<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--<title>{{ config('app.name', 'Laravel') }}</title>-->
    <title>Slasport</title>
    <!-- Styles -->
    

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <!--Links puestos juan -->
    <link rel="icon" type="image/png" href="/imgs/Logo.png" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css">
    <link rel="stylesheet" href="/css/mystyle.css">
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
    <!--final de links-->
</head>
<body>
    <!--scripts-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <!--<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
    <!-- final scripts-->
    <div id="app light-blue lighten-5">
        <nav>
            <div class="nav-wrapper light-blue darken-3">
                <a href="#" id="menuH2" data-activates="mobile-demo" class="menu button-collapse left btn-flat fixed-action "><i class="material-icons" id="iconMenu">menu</i></a>
                <a href="#!" class="brand-logo center "><img src="/imgs/Logo.png" class="logo"></a>
        
                <ul class="left hide-on-med-and-down">
                     @if (auth::guest())
                    <li><a href="{{ url('/') }}">Inicio</a></li>
                    <li><a href="{{ url('/participantes') }}">Participantes</a></li>
                    <li><a href="#!">Descensos</a></li>
                    @else
                    <li><a href="{{ url('/') }}">Inicio</a></li>
                    <li><a href="{{ url('/participantes') }}">Participantes</a></li>
                    <li><a href="#!">Descensos</a></li>
                    <li><a href="#!">Inscripcion</a></li>
                    <li><a href="#!">Inscritos</a></li>
                    @endif
                </ul>
                <ul class="right hide-on-med-and-down">
                    <li><a href="{{ url('/login') }}" class="waves-effect waves-light btn light-blue darken-1">Login</a></li>
                </ul>
            </div>
    </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
