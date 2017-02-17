@extends('layout')

@section('navbar')
<!--NAVBAR-->

<nav>
    <div class="nav-wrapper light-blue darken-3">
        <a href="#" id="menuH2" data-activates="mobile-demo" class=" fixed-action btn-floating menu button-collapse right btn-flat"><i class="material-icons" id="iconMenu">menu</i></a>
        <a href="#!" class="brand-logo center "><img src="/imgs/Logo.png" class="logo"></a>
        
        <ul id="letternav" class="left hide-on-med-and-down">
             @if (auth::guest())
            <li><a href="{{ url('/') }}">Inicio</a></li>
            <li><a href="{{ url('/participantes') }}">Participantes</a></li>
            <li><a href="{{ url('/descensos') }}">Descensos</a></li>
            @elseif (Auth::user()->admin==1)
            <li><a href="{{ url('/') }}">Inicio</a></li>
            <li><a href="{{ url('/participantes') }}">Participantes</a></li>
            <li><a href="{{ url('/descensos') }}">Descensos</a></li>
            <li><a href="{{ url('/clubes') }}">Inscripción</a></li>
            <li><a href="{{ url('/inscritos') }}">Inscritos</a></li>
            <li><a href="{{ url('/carreras') }}">Carreras</a></li>
            @else
            <li><a href="{{ url('/') }}">Inicio</a></li>
            <li><a href="{{ url('/participantes') }}">Participantes</a></li>
            <li><a href="{{ url('/descensos') }}">Descensos</a></li>
            <li><a href="{{ url('/clubes') }}">Inscripción</a></li>
            <li><a href="{{ url('/inscritos') }}"> Inscritos</a></li>
            @endif
        </ul>
        @if (auth::guest())
        <ul class="right hide-on-med-and-down">
          <li><a href="{{ url('/login') }}" id="letternav" class="waves-effect waves-light btn light-blue darken-1">Login</a></li>
        </ul>
        @else
        <ul class="right hide-on-med-and-down">
          <li><a href="{{ url('/logout') }}" id="letternav" class="waves-effect waves-light btn light-blue darken-1">Log out</a></li>
        </ul>
        @endif
        @if (auth::guest())
        <ul class="side-nav" id="mobile-demo">
          <li><div class="userView">
            <div class="background">
              <img src="imgs/4.jpg">
            </div>
            <a href="#!user"><img class="circle" src="/imgs/Logo.png"></a>
            <a href="#!name"><span class="titleside white-text  name">Slasport</span></a>
          </div></li>
          <li><a href="{{ url('/')}}">Inicio</a></li>
          <li><a href="{{ url('/participantes') }}">Participantes</a></li>
          <li><a href="{{ url('/descensos') }}">Descensos</a></li>
          <li class="divider"></li>
          <li><a href="{{ url('/login') }}" class="waves-effect waves-blue blue-text text-darken-4 ">Login</a></li>
        </ul>
        @else
        
        <ul class="side-nav" id="mobile-demo">
          <li><a href="{{ url('/') }}">Inicio</a></li>
          <li><a href="{{ url('/participantes') }}">Participantes</a></li>
          <li><a href="{{ url('/descensos') }}">Descensos</a></li>
          <li><a href="{{ url('/clubes') }}">Inscripción</a></li>
          <li><a href="{{ url('/inscritos') }}">Inscritos</a></li>
          <li class="divider"></li>
          <li><a href="{{ url('/logout') }}" class="waves-effect waves-light blue-text text-darken-4 ">Log out</a></li>
        </ul>
        @endif
    </div>
</nav>
@stop

@section('content')
  
  <div id="myhome">
    <div id="index-banner wellcome"  class="parallax-container">
        <div class="section no-pad-bot">
          <div class="container">
            
            <h1 id="nomCampa" class=" header bold center titulo blue-text text-darken-4 ">SlaSport</h1>
          </div>
        </div>
        <div class="parallax">
          <!--<img class="imagenCab"  src="/imgs/rio.gif"></div>-->
          <video src="/imgs/Webface.mp4" class="imagenCab responsive-video" id="myvideo"  autoplay loop></video>
      </div>
  </div>
  
<div class="section center blue darcken-2">
  <h2 id="nomCamp"> Últimas Carreras</h2>
  <div class="row">
  @foreach ($carreras as $carrera)
        <div class="col s12 m6 l4">
          <div class="card">
            <div class="card-image ">
              <a href="{{ url('/descensos')}}/{{$carrera->id_carrera}}"><img src="{{$carrera->avatar_carrera}}"></a>
              <span class="card-title"><a href="{{ url('/descensos')}}/{{$carrera->id_carrera}}" id="nomCamp2" class="card-action orange-text text-darken-4" >{{$carrera->lugar}}</a></span>
            </div>
          </div>
        </div>
  @endforeach
  </div> 
</div>
@stop

