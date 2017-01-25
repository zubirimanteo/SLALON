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
            <li><a href="{{ url('/inscritos')}}">Participantes Inscritos</a></li>
            
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

<div class="row">
    <form class="inscripcion" method="POST" action="{{route('create.piraguista')}}" enctype="multipart/form-data">
       {{ csrf_field() }}
    <div class="row">
        <br>
        <br>
        <center><h1 id="nomCamp">Inscripción de participantes</h1></center>
        <div  class="input-field col s6 offset-s3 espaciado">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" class="validate" name="nombre">
          <label for="icon_prefix">Nombre</label>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="input-field col s6 offset-s3 espaciado">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" class="validate" name="apellido">
          <label for="icon_prefix">Primer Apellido</label>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="input-field col s6 offset-s3 espaciado">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" class="validate" name="apellido2">
          <label for="icon_prefix">Segundo Apellido</label>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="input-field col s6 offset-s3 espaciado">
          <i class="material-icons prefix">fitness_center</i>
          <input id="icon_fitness" type="text" class="validate" name="club">
          <label for="icon_fitness">Club</label>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="input-field col s6 offset-s3 espaciado">
          <i class="material-icons prefix">public</i>
          <input id="icon_telephone" type="text" class="validate" name="nacionalidad">
          <label for="icon_telephone">Nacionalidad</label>
        </div>
        <div class="input-field col s6 offset-s3 espaciado">
            <p>
              <i class="material-icons prefix">wc</i>
              <label for="">Sexo</label><br>
              <input name="genero" type="radio" id="test1" value="masculino"/>
              <label for="test1">Masculino</label>
              
              <input name="genero" type="radio" id="test2" value="femenino" />
              <label for="test2">Femenino</label>
            </p>
        </div>
        <br>
        <br>
        <br>
        <br>
         <div class="input-field col s6 offset-s3 espaciado">
             <form action="#">
                <div class="file-field input-field">
                  <div class="btn-large light-blue accent-5 waves-effect waves-orange">
                    <span><i class="material-icons">attach_file</i> Archivo</span>
                    <input type="file">
                  </div>
                  <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" name"avatar" id="uploadfile" placeholder="Subir Archivos">
                  </div>
                </div>
             </form>
        </div>
        <br/>
        <br>
        <br>
        <br>
        <br>
        <div class="input-field col s6 offset-s3">
          <select class="browser-default s6 offset-s3">
            <option value="" disabled selected>Elija la Carrera</option>
            @foreach($carrera as $carreras)
            <option name"carrera" value="{{$carreras->id_carrera}}">{{$carreras -> lugar}}</option>
            @endforeach
          </select>
        </div>
        <form  id="enviarD"  class="input-field col s5 offset-s4 ">
            <button class="btn waves-effect waves-light blue s12" type="submit" name="action">Enviar
                <i class="material-icons right">send</i>
            </button>
        </form>
    </div>
    <div class="row camposRec">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
    </div>
    </form>
    
</div>

@stop