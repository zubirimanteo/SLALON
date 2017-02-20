@extends('layout')

@section('script')

<script type="text/javascript">
  
  $(document).ready(function(){
        function getXMLHTTPRequest(){
            versiones = ["MSXML2.XMLHttp.5.0", "MSXML2.XMLHttp.4.0",
            "MSXML2.XMLHttp.3.0", "MSXML2.XMLHttp",
            "Microsoft.XMLHttp"];
                    if(typeof XMLHttpRequest != "undefined"){
                    return new XMLHttpRequest();
                    } else {
                    for (var i = 0; i < versiones.length; i++) {
                    try{
                    req = new ActiveXObject(versiones[i]);
                    return req;
                    } catch (err1) {
                    // Esto evita que se genere un error y pare la ejec.
                    }
                }
            }
        }
        function inicializar(url){
            http=getXMLHTTPRequest();
            http.onreadystatechange = procesarEvento;
            http.open("GET", url, true);
            http.send(null);
            tiempo=setTimeout("finDeEspera()",3000);
        }
        function procesarEvento(){
            var detalles = document.getElementById("detalles");
            if(http.readyState == 4){
                if(http.status==200) {
                    clearTimeout(tiempo);
                    // Aquí escribiremos lo que queremos que se
                    //ejecute tras recibir la respuesta
                    xmlFuntzioa(this);
                } else {
                    // Ha ocurrido un error
                    alert("Error: "+http.statusText);
                }
            }
        }
        function finDeEspera(){
            http.abort();
            // Mostrar mensaje de sobrecarga del servidor
            // o en la pagina HTML
            alert('Intente nuevamente más tarde');
        }
        function xmlFuntzioa(xml) {
            var i;
            var xmlDoc = xml.responseXML;
            var cartel = "";
            var x = xmlDoc.getElementsByTagName("country");
            for (i = 0; i <x.length; i++) {

 
           var code = x[i].getAttribute('code');
            var j = xmlDoc.getElementsByTagName("country")[i];
            var k = j.childNodes[0];
            var l = k.nodeValue;
            $('#nacionalidad').append($('<option>', { 
                value: code,
                text : l 
            }));

            }
 
        }
inicializar('./countries.xml');
});
  
</script>

@stop

@section('navbar')

<nav>
    <div  id="letternav"  class="nav-wrapper light-blue darken-3">
        <a href="#" id="menuH2" data-activates="mobile-demo" class="button-collapse btn-floating right btn-flat fixed-action "><i class="material-icons" id="iconMenu">menu</i></a>
        <a href="#!" class="brand-logo center "><img src="/imgs/Logo.png" class="logo"></a>
        
        <ul class="left hide-on-med-and-down">
            @if (Auth::user()->admin==1)
            <li><a href="{{ url('/') }}">Inicio</a></li>
            <li><a href="{{ url('/participantes') }}">Participantes</a></li>
            <li><a href="{{ url('/descensos') }}">Descensos</a></li>
            <li><a href="{{ url('/clubes') }}">Inscripción</a></li>
            <li><a href="{{ url('/inscritos') }}">Inscritos</a></li>
            <li><a href="{{ url('/carreras') }}">Carreras</a></li>
            @else
            <li><a href="{{ url('/') }}" id="home">Inicio</a></li>
            <li><a href="{{ url('/participantes') }}">Participantes</a></li>
            <li><a href="{{ url('/descensos') }}">Descensos</a></li>
            <li><a href="{{ url('/clubes') }}">Inscripción</a></li>
            <li><a href="{{ url('/inscritos')}}">Inscritos</a></li>
            @endif
            
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
          <select id="nacionalidad" class="browser-default s6 offset-s3" name="nacionalidad">
            <option value="" disabled selected>Elija la Nacionalidad</option>
          </select>
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
        <div class="input-field col s6 offset-s3">
          <select class="browser-default s6 offset-s3" name="carrera">
            <option value="" disabled selected>Elija la Carrera</option>
            @foreach($carreras as $carreras)
            <option value="{{$carreras->id_carrera}}">{{$carreras -> lugar}}</option> 
            @endforeach
          </select>
        </div>
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