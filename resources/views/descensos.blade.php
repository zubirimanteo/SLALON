@extends('layouts.app')
@section('navbar')
@stop
@section('content')
<div class="section cuerpo  light-blue lighten-5">
    <h1 id="nomCamp" class="header center blue-text text-darken-4">Descensos</h1>
        <ul class="collection large">
            <li class="collection-item avatar">
                <i class="material-icons circle white">perm_identity</i>
                <table class="centered">
                    <tbody>
                      <tr>  
                            @if (auth::guest())
                            <td data-field="id"><strong>Nombre</strong></td>
                            <td data-field="number"><strong>Tiempo</strong></td>
                            <td data-field="number"><strong>Penalización</strong></td>
                            @else
                            <td data-field="id"><strong>Nombre</strong></td>
                            <td data-field="number"><strong>Tiempo</strong></td>
                            <td data-field="number"><strong>Penalización</strong></td>
                            <td><button class="btn" id="table-add"><i class="material-icons">library_add</i></button></td>
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
                    <td contenteditable="true">Empty</td>
                    <td>00:00</td>
                    <td>+<span contenteditable="true">00:00</span></td>
                    <td><button class="btn  table-remove"><i class="material-icons">delete</i></button></td>
                  </tr>
                </tbody>
              </table>
            </li>
            @foreach ($piraguistas as $p)
                @foreach ($descensos as $d)
            <li class="collection-item avatar">
                <img  src="{{$p->avatar}}" alt="" class="circle materialboxed">
                <table class="centered">
                 <tbody>
                  <tr>
                    <td>{{$p->nombre}} {{$p->apellido}} {{$p->apellido2}}</td>
                    <td>{{$d->tiempo}}</td>
                    <td>{{$p->nacionalidad}}</td>
                  </tr>
                </tbody>
              </table>
            </li>
                @endforeach
            @endforeach

            <!------------------------------->
            <li class="clonado">
                
            </li>
        </ul>
     </div><!--editable-->
    
    <button id="export-btn" class="btn ">Export Data</button>
    <button id="editar-btn" class="btn ">Editar</button>
      <p id="export"></p>
   
</div>

<footer class="page-footer light-blue darken-3">
      <div class="container">
            <div class="row">
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Contacto</h5>
                <ul>
                  <h6><li><a class="grey-text text-lighten-3" href="https://twitter.com/SlasportSP"> <i class="icon-twitter"> @SlasportSP </i></a></li></h6>
                  <h6><li><a class="grey-text text-lighten-3" href="#!"> <i class="icon-facebook"></i> Slasport</a></li></h6>
                  <h6><li><a class="grey-text text-lighten-3" href="#!"><i class="material-icons">phone</i> 666-666-666</a></li></h6>
                </ul>

              </div>
            </div>
      </div>
</footer>

@stop