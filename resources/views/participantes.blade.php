@extends('layout')

@section('navbar')

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

@stop

@section('content')


@stop