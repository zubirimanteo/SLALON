@extends('layout')
@section('content')
<nav class="nav-extended">
    <div class="nav-wrapper light-blue darken-3">
        <a href="#!" class="brand-logo center"><img src="/imgs/Logo.png" class="logo"></a>
        <a href="#" id="menuH" data-activates="mobile-demo" class="button-collapse right btn-large fixed-action  light-blue darken-3 "><i class="material-icons" id="iconMenu">menu</i></a>
        
        <ul class="right hide-on-med-and-down">
            <li><a class="dropdown-button left " href="#!" data-activates="opciones"><i class="left material-icons">settings</i></a></li>
             <ul id="opciones" class="dropdown-content">
                <li><a href="#!">Perfil</a></li>
                <li class="divider"></li>
                <li><a href="#!">Cerrar Sesión</a></li>
            </ul>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="#!">Perfil</a></li>
            <li class="divider"></li>
            <li><a href="#!">Cerrar Sesión</a></li>
        </ul>
        <ul class="tabs tabs-transparent">
            <li class="tab col s4"><a id="vgeneral" href="#vista">Vista General</a></li>
            <li class="tab col s4"><a id="datosDes" href="#descenso">Datos Descenso/Nuevo Descenso</a></li>
            <li class="tab col s4"><a id="dparti" href="#participantes">Datos Participantes</a></li>
        </ul>
    </div>
</nav>
<!--Vista General-->
<div id="vista" class="col s12">
    <h1 id="nomCamp" class="header bold center blue-text text-darken-4 ">Nombre de la Carrera/campeonato</h1>
    <div class="section">
        <div class="row">
        <table>
        <thead>
          <tr>
              <th hidden data-id="id">id</th>
              <th data-string="name">Nombre</th>
              <th data-time="time">Tiempo</th>
              <th data-number="time">Penalización</th>
              <th data-number="time">Faltas</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>Juan</td>
            <td>
                <h3><span id="minutos">00</span>:<span id="segundos">00</span>:<span id="decimas">00</span></h3>
                <input type="button" onclick="detenerse()" value="detenerse"/>
                <input type="button" onclick="carga()" value="Empieza"/>
            </td>
            <td class="editable">++++++++</td>
            <td class="editable">++++++++</td>
            
          </tr>
          <tr>
            <td>Igor</td>
            <td>
                <h3><span id="minutos">00</span>:<span id="segundos">00</span>:<span id="decimas">00</span></h3>
                <input type="button" onclick="detenerse()" value="deternse"/>
                <input type="button" onclick="carga()" value="Empieza"/>
            </td>
            <td class="editable">++++++++</td>
            <td class="editable">++++++++</td>
            
          </tr>
          <tr>
            <td>Markel</td>
            <td>
                <h3><span id="minutos">00</span>:<span id="segundos">00</span>:<span id="decimas">00</span></h3>
                <input type="button" onclick="detenerse()" value="deternse"/>
                <input type="button" onclick="carga()" value="Empieza"/>
            </td>
            <td class="editable">++++++++</td>
            <td class="editable">++++++++</td>
           
          </tr>
        </tbody>
      </table>
            
        </div>
    </div>
</div>
<!--Final de Vista General-->
<div id="descenso" class="col s12">
    <div id="table" class="table-editable">
        <span class="table-add"><a ><i class=" material-icons waves-effect waves-yellow">add</i> </a></span>
        <table class="table">
          <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th></th>
            <th></th>
          </tr>
          <tr>
            <td contenteditable="true">Nombre</td>
            <td contenteditable="true">Apellido</td>
            <td>
               <span class="table-remove"><i class="material-icons">delete</i></span>
            </td>
            <td>
            </td>
          </tr>
          <!-- This is our clonable table line -->
          <tr class="hide">
            <td contenteditable="true">Untitled</td>
            <td contenteditable="true">undefined</td>
            <td>
             <span class="table-remove"><i class="material-icons">delete</i></span>
            </td>
            <td>
            </td>
          </tr>
        </table>
      </div>
      
      <button id="export-btn" class="btn btn-primary">Export Data</button>
      <p id="export"></p>
    </div>
</div>
<div id="participantes" class="col s12">
    
</div>

        

@stop