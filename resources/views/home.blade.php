@extends('layouts.app')

@section('content')
 <div class="row">
            <form class="col s12">
            <div class="row">
                <center><h1 id="nomInsc">Inscripción de participantes</h1></center>
                <div class="input-field col s4">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="icon_prefix" type="text" class="validate">
                  <label for="icon_prefix">Nombre</label>
                </div>
                <div class="input-field col s4">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="icon_prefix" type="text" class="validate">
                  <label for="icon_prefix">Primer Apellido</label>
                </div>
                <div class="input-field col s4 ">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="icon_prefix" type="text" class="validate">
                  <label for="icon_prefix">Segundo Apellido</label>
                </div>
                <div class="input-field col s4">
                  <i class="material-icons prefix">phone</i>
                  <input id="icon_telephone" type="tel" class="validate">
                  <label for="icon_telephone">Teléfono</label>
                </div>
                <div class="input-field col s4">
                    <p>
                        
                      <i class="material-icons prefix">wc</i>
                      <label for="">Sexo</label><br>
                      <input name="group1" type="radio" id="test1" />
                      <label for="test1">Masculino</label>
                      
                      <input name="group1" type="radio" id="test2" />
                      <label for="test2">Femenino</label>
                    </p>
                </div>
                <div class="input-field col s4">
                  <i class="material-icons prefix">fitness_center</i>
                  <input id="icon_fitness" type="text" class="validate">
                  <label for="icon_fitness">Club</label>
                </div>
                <div class="input-field col s4">
                  <i class="material-icons prefix">public</i>
                  <input id="icon_telephone" type="text" class="validate">
                  <label for="icon_telephone">Nacionalidad</label>
                </div>
            </div>
            </form>
        </div>
        <div class="row">
            <form class="col s12">
                <div class="row">
                    <button class="btn waves-effect waves-light blue" type="submit" name="action">Enviar
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
        </div>
@endsection
