@extends('layout')

@section('navbar')

<nav>
    <div class="nav-wrapper light-blue darken-3">
        <a href="#" id="menuH2" data-activates="mobile-demo" class=" fixed-action btn-floating menu button-collapse right btn-flat"><i class="material-icons" id="iconMenu">menu</i></a>
        <a href="#!" class="brand-logo center "><img src="/imgs/Logo.png" class="logo"></a>
        
        <ul id="letternav" class="left hide-on-med-and-down">
             @if (auth::guest())
            <li><a href="{{ url('/') }}">Inicio</a></li>
            <li><a href="{{ url('/participantes') }}">Participantes</a></li>
            <li><a href="{{ url('/descensos') }}">Descensos</a></li>
            @else
            <li><a href="{{ url('/') }}">Inicio</a></li>
            <li><a href="{{ url('/participantes') }}">Participantes</a></li>
            <li><a href="{{ url('/descensos') }}">Descensos</a></li>
            <li><a href="{{ url('/clubes') }}">Inscripción</a></li>
            <li><a href="{{ url('/inscritos') }}">Inscritos</a></li>
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
          <li><a href="{{ url('/clubes') }}!">Inscripción</a></li>
          <li><a href="#!">Inscritos</a></li>
          <li class="divider"></li>
          <li><a href="{{ url('/logout') }}" class="waves-effect waves-light blue-text text-darken-4 ">Log out</a></li>
        </ul>
        @endif
    </div>
</nav>
@stop

@section('content')

<div class="section cuerpo">
<h1 id="nomCamp" class="header bold center blue-text text-darken-4 ">Participantes</h1>

<ul class="collection large">
    <li class="collection-item avatar">
        <i class="material-icons circle white">perm_identity</i>
        <table class="centered">
            <tbody>
              <tr> 
                  <th data-field="" hidden >id_piraguista</th>
                  <th data-field="">Nombre</th>
                  <th data-field="nombre">Apellidos</th>
                  <th data-field="club">Club</th>
                  <th data-field="nacionalidad">Nacionalidad</th>
              </tr>
            </tbody>
        </table>
    </li>
    <br>
@foreach ($users as $user)
    <li class="collection-item avatar ">
        <img  src="{{$user->avatar_piraguista}}" alt="" class="circle materialboxed">
        <table class="centered">
         <tbody>
          <tr>
            <td hidden>{{$user->id_piraguista}}</td>
            <td>{{$user->nombre}}</td>
            <td>{{$user->apellido}} {{$user->apellido2}}</td>
            <td>{{$user->club}}</td>
            <td>{{$user->nacionalidad}}</td>
          </tr>
        </tbody>
      </table>
    </li>
@endforeach
</ul>

</div>
@stop