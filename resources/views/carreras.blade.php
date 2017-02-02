@extends('layout')

@section('navbar')

<nav>
    <div  id="letternav"  class="nav-wrapper light-blue darken-3">
        <a href="#" id="menuH2" data-activates="mobile-demo" class="button-collapse btn-floating right btn-flat fixed-action "><i class="material-icons" id="iconMenu">menu</i></a>
        <a href="#!" class="brand-logo center "><img src="/imgs/Logo.png" class="logo"></a>
        
        <ul class="left hide-on-med-and-down">
            <li><a href="{{ url('/') }}" id="home">Inicio</a></li>
            <li><a href="{{ url('/participantes') }}">Participantes</a></li>
            <li><a href="{{ url('/descensos') }}">Descensos</a></li>
            <li><a href="{{ url('/clubes') }}">Inscripción</a></li>
            <li><a href="{{ url('/inscritos')}}">Inscritos</a></li>
            
        </ul>
        <ul class="right hide-on-med-and-down">
          <li><a  id="letternav" href="{{ url('/logout') }}" class="waves-effect waves-light btn light-blue darken-1">Log out</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="{{ url('/') }}" id="home">Inicio</a></li>
            <li><a href="{{ url('/participantes') }}">Participantes</a></li>
            <li><a href="{{ url('/descensos') }}">Descensos</a></li>
            <li><a href="{{ url('/clubes')}}">Inscripción</a></li>
            <li><a href="{{ url('/inscritos')}}">Inscritos</a></li>
            <li class="divider"></li>
            <li><a href="{{ url('/logout') }}" class="waves-effect waves-light blue-text text-darken-4 ">Log out</a></li>
        </ul>
    </div>
</nav>
        
@stop
@section('content')

<div class="row">
    <form class="inscripcion" method="POST" action="{{route('create.carrera')}}" enctype="multipart/form-data">
       {{ csrf_field() }}
    <div class="row">
        <br>
        <br>
        <center><h1 id="nomCamp">Añadir Carreras</h1></center>
        <div class="input-field col s6 offset-s3 espaciado">
          <i class="material-icons prefix">location_on</i>
          <input id="location_on" type="text" class="validate" name="lugar">
          <label for="location_on">Lugar</label>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="input-field col s6 offset-s3">
        <span>Fecha de Inicio</span>
        <input type="date" name="fecha_inicio" value="{{date('Y-m-d')}}">
        </div>
        <div class="input-field col s6 offset-s3">
        <span>Fecha de Finalizacion</span>
        <input type="date" name="fecha_final" value="{{date('Y-m-d')}}">
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="input-field col s6 offset-s3">
          <select class="browser-default s6 offset-s3" name="categoria">
            <option value="" disabled selected>Elija la Categoria</option>
            <option value="benjamin">Benjamin</option>
            <option value="alevin">Alevin</option>
            <option value="infantil">Infantil</option>
            <option value="cadete">Cadete</option>
            <option value="junior">Junior</option>
            <option value="senior">Senior</option>
            <option value="veterano">Veterano</option>
          </select>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="input-field col s6 offset-s3 espaciado">
          <i class="material-icons prefix">swap_horiz</i>
          <input id="swap_horiz" type="text" class="validate" name="distancia">
          <label for="swap_horiz">Distancia</label>
        </div>
        <br>
        <br>
        <br>
        <br>
         <div class="input-field col s6 offset-s3 espaciado">
            
                <div class="file-field input-field">
                  <div class="btn-large light-blue accent-5 waves-effect waves-orange">
                    <span><i class="material-icons">attach_file</i> Archivo</span>
                    <input type="file" name="avatar" value="fileupload" id="fileupload">
                  </div>
                  <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Subir Archivos">
                  </div>
                </div>

        </div>
        <br/>
        <br>
        <br>
        <br>
        <br>
        
       
            <button class="btn waves-effect waves-light blue col s2 offset-s7" type="submit" name="action" id="send">Enviar
                <i class="material-icons right">send</i>
            </button>
    </div>
    <div class="row camposRec">
            @foreach ($errors->all() as $error)
              <script type="text/javascript" src="">
                var send = documentByElementById('#send').addEventListener('click', showrequired);
                
                function showrequired(){
                  
                   alert( "{{ $error }}" );
                }
               
              </script>
                
            @endforeach
    </div>
    </form>
    
</div>

@stop