@extends('layout')
@section('navbar')
<nav>
    <div class="nav-wrapper light-blue darken-3">
        <a href="#" id="menuH2" data-activates="mobile-demo" class=" fixed-action btn-floating menu button-collapse right btn-flat"><i class="material-icons" id="iconMenu">menu</i></a>
        <a href="#!" class="brand-logo center "><img src="/imgs/Logo.png" class="logo"></a>
        
        <ul id="letternav" class=" left hide-on-med-and-down">
             @if (auth::guest())
            <li><a href="{{ url('/') }}">Inicio</a></li>
            <li><a href="{{ url('/participantes') }}/{{{ $id or '' }}}">Participantes</a></li>
            <li><a href="{{ url('/descensos') }}/{{{ $id or '' }}}">Descensos</a></li>
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
          <li><a  id="letternav" href="{{ url('/login') }}" id="letternav" class="waves-effect waves-light btn light-blue darken-1">Login</a></li>
        </ul>
        @else
        <ul class="right hide-on-med-and-down">
          <li><a  id="letternav" href="{{ url('/logout') }}" id="letternav" class="waves-effect waves-light btn light-blue darken-1">Log out</a></li>
        </ul>
        @endif
        @if (auth::guest())
        <ul class="side-nav" id="mobile-demo">
          <li><a href="{{ url('/')}}">Inicio</a></li>
          <li><a href="{{ url('/participantes') }}">Participantes</a></li>
          <li><a href="{{ url('/descensos') }}">Descensos</a></li>
          <li class="divider"></li>
          <li><a  href="{{ url('/login') }}" i class="waves-effect waves-blue blue-text text-darken-4 ">Login</a></li>
        </ul>
        @else
        
        <ul class="side-nav" id="mobile-demo">
          <li><a href="{{ url('/') }}">Inicio</a></li>
          <li><a href="{{ url('/participantes') }}">Participantes</a></li>
          <li><a href="{{ url('/descensos') }}">Descensos</a></li>
          <li><a href="{{ url('/clubes') }}">Inscripción</a></li>
          <li><a href="{{ url('/inscritos') }}">Inscritos</a></li>
          <li class="divider"></li>
          <li><a href="{{ url('/logout') }}"  class="waves-effect waves-light blue-text text-darken-4 ">Log out</a></li>
        </ul>
        @endif
    </div>
</nav>
@stop
@section('content')
<div class="section cuerpo  ">
    <h1 id="nomCamp" class="header center blue-text text-darken-4">Descensos</h1>
        <ul class="collection large">
            <li class="collection-item avatar">
                <i class="material-icons circle white">perm_identity</i>
                <table class="centered">
                    <tbody>
                      <tr>  
                            @if (auth::guest())
                            <td data-field="id"><strong>Nombre y Apellidos</strong></td>
                            <td data-field="number"><strong>Tiempo</strong></td>
                            <td data-field="number"><strong>Penalización</strong></td>
                            @else
                            <td data-field="id"><strong>Nombre y Apellidos</strong></td>
                            <td data-field="number"><strong>Tiempo</strong></td>
                            <td data-field="number"><strong>Penalización</strong></td>
                            @endif
                      </tr>
                    </tbody>
                </table>
            </li>
    <div id="table" class="table-editable">
            <li class="collection-item avatar  hide">
            <i class="material-icons circle">perm_identity</i>
              <table class="centered">
                 <tbody>
                  <tr>
                    <td contenteditable="false">Empty</td>
                    <td>00:00</td>
                    <td>+<span contenteditable="false">00</span>:<span contenteditable="false">00</span></td>
                    <td><button class="btn  table-remove"><i class="material-icons">delete</i></button></td>
                  </tr>
                </tbody>
              </table>
            </li>
            @foreach ($descensos as $d)
            <li class="collection-item avatar">
                <img  src="{{$d->avatar_piraguista}}" alt="" class="circle materialboxed">
                <table class="centered">
                 <tbody>
                  <tr>
                    <td class="edit" contenteditable="false">{{$d->nombre}} {{$d->apellido}} {{$d->apellido2}}</td>
                    <td>
                        
                        <span id="minutos{{$d->numero_descendiente}}">00</span>:<span id="segundos{{$d->numero_descendiente}}">00</span>:<span id="decimas{{$d->numero_descendiente}}">00</span>
                        
                    </td>
                    <td>+<span class="edit" contenteditable="false">00</span>:<span class="edit" contenteditable="false">00</span></td>
                  </tr>
                </tbody>
              </table>
            </li>
            @endforeach

            <!------------------------------->
            <li class="clonado">
                
            </li>
        </ul>
    </div><!--editable-->
     @if (auth::guest())
     @else
        <button id="editar-btn" class="btn blue">Editar <i class="material-icons">mode_edit</i></button>
    @endif
   
</div>

@stop