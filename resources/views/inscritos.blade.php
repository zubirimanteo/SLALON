@extends('layout')

@section('navbar')

<nav>
    <div class="nav-wrapper light-blue darken-3">
        <a href="#" id="menuH2" data-activates="mobile-demo" class="button-collapse btn-floating right btn-flat fixed-action "><i class="material-icons" id="iconMenu">menu</i></a>
        <a href="#!" class="brand-logo center "><img src="/imgs/Logo.png" class="logo"></a>
        
        <ul class="left hide-on-med-and-down">
            <li><a href="{{ url('/') }}" id="home">Inicio</a></li>
            <li><a href="{{ url('/participantes') }}">Participantes</a></li>
            <li><a href="{{ url('/descensos') }}">Descensos</a></li>
            <li><a href="{{ url('/clubes') }}">Inscripción</a></li>
            <li><a href="">Participantes Inscritos</a></li>
            
        </ul>
        <ul class="right hide-on-med-and-down">
          <li><a href="{{ url('/logout') }}" class="waves-effect waves-light btn light-blue darken-1">Log out</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="{{ url('/') }}" id="home">Inicio</a></li>
            <li><a href="{{ url('/participantes') }}">Participantes</a></li>
            <li><a href="{{ url('/descensos') }}">Descensos</a></li>
            <li><a href="{{ url('/clubes')}}">Inscripción</a></li>
            <li><a href="{{ url('/inscritos')}}">Participantes Inscritos</a></li>
            <li class="divider"></li>
            <li><a href="{{ url('/logout') }}" class="waves-effect waves-light blue-text text-darken-4 ">Log out</a></li>
        </ul>
    </div>
</nav>
        
@stop

@section('content')

<div class="row inscritos">
    
    <center><h1 id="nomCamp">Participantes Inscritos</h1></center>
        
</div>

@stop