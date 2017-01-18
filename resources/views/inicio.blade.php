@extends('layout')

@section('navbar')
<!--NAVBAR-->
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
  
    <!-- ventana consecuente a pulsar el boton de registro en la ventana de login -->
    <!-- FINAL DE LA BARRA DE NAVEGADOR CON TODAS SUS FUNCIONES-->

@stop

@section('content')
  
  <div id="myhome">
    <div id="index-banner wellcome"  class="parallax-container">
        <div class="section no-pad-bot">
          <div class="container">
            <br><br>
            <h1 id="nomCamp" class="header bold center blue-text text-darken-4 ">SlaSport</h1>
          </div>
        </div>
        <div class="parallax"><img class="imagenCab"  src="/imgs/rio.gif"></div>
      </div>
  </div>
  
  <div class="row">
        <div class="col s4">
          <div class="card medium">
            <div class="card-image">
              <img src="imgs/4.jpg">
              <span class="card-title">Campeonato de Azkoitia</span>
            </div>
            <div class="card-content">
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
              <a href="#">Click para mas información</a>
            </div>
          </div>
        </div>
        
        
        <div class="col s4">
          <div class="card small">
            <div class="card-image">
              <img src="imgs/4.jpg">
              <span class="card-title">Campeonato de Legazpi</span>
            </div>
            <div class="card-content">
              <p></p>
            </div>
            <div class="card-action">
              <a href="#">Click para mas información</a>
            </div>
          </div>
        </div>
        
        
        <div class="col s4">
          <div class="card small">
            <div class="card-image">
              <img src="imgs/4.jpg">
              <span class="card-title">Campeonato de Donosti</span>
            </div>
            <div class="card-content">
              <p></p>
            </div>
            <div class="card-action">
              <a href="#">Click para mas información</a>
            </div>
          </div>
        </div>
      </div>
      
@stop

