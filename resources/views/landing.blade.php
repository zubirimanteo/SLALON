@extends('layout')

@section('navbar')
<!--NAVBAR-->
    <nav class="">
        <div class="nav-wrapper light-blue darken-3">
            <a href="#!" class="brand-logo center"><img src="/imgs/Logo.png" class="logo"></a>
            <a href="#" id="menuH" data-activates="mobile-demo" class="button-collapse right fixed-action "><i class="material-icons" id="iconMenu">menu</i></a>
          <ul class="left hide-on-med-and-down">
            <div class="tabs transparent">
              <li class=""><a href="#descensos" id="decs" class="blue-text text-lighten-5 waves-effect waves-light btn-flat">Inicio</a></li>
              <li class=""><a href="#descensos" id="decs" class="blue-text text-lighten-5 waves-effect waves-light btn-flat">Descensos</a></li>
              <li><a class="blue-text text-lighten-5 waves-effect waves-light btn-flat" href="" data-target="ventanaLog" >Log In</a></li>
            </div>
          </ul>
          <ul class="side-nav" id="mobile-demo">
            <!--<li><a href="" data-target="ventanaLog"><i class="material-icons">perm_identity</i> Log In</a></li>-->
            <li class="tab col s4"><a href="#wellcome">Home</a></li>
            <li class="tab col s4"><a href="#descensos">Descensos</a></li>
          </ul>
        </div>
    </nav>
    <!--END OF NAVBAR-->
    <!--LOGIN-->
    <!-- ventana que aparece despues de pulsar el boton de login-->
    <!--<div id="ventanaLog" class="modal">-->
    <!--    <div class="modal-content">-->
    <!--        <form class="col s5" role="form" method="POST" action="{{ url('/login') }}">-->
    <!--        {{ csrf_field() }}-->
    <!--        <div class="row   {{ $errors->has('email') ? ' has-error' : '' }}">-->
    <!--            <div class="input-field col s9">-->
    <!--                <input id="email" type="email" class="validate">-->
    <!--                <label for="email" data-error="Correo Erroneo" data-success="Correcto!">Email</label>-->
    <!--                @if ($errors->has('email'))-->
    <!--                <span class="help-block">-->
    <!--                <strong>{{ $errors->first('email') }}</strong>-->
    <!--                </span>-->
    <!--                @endif-->
    <!--            </div>-->
    <!--        </div>-->
                  
    <!--        <div class="row {{ $errors->has('password') ? ' has-error' : '' }}">-->
    <!--            <div class="input-field col s9">-->
    <!--                <input id="password" type="password" class="validate">-->
    <!--                <label for="password">Password</label>-->
    <!--                @if ($errors->has('password'))-->
    <!--                <span class="help-block">-->
    <!--                <strong>{{ $errors->first('password') }}</strong>-->
    <!--                </span>-->
    <!--                @endif-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        </form>-->
    <!--      <div class="modal-footer">-->
    <!--        <button type="submit" href="" class="blue lighten-1 modal-action modal-close waves-effect waves-green btn">Entrar</button>-->
    <!--        <a href="#registro" class="modal-action modal-close waves-effect waves-blue btn-flat ">Registrate</a>-->
    <!--        <a class="btn modal-action modal-close waves-effect waves-blue btn-flat small" href="#forgotPass">-->
    <!--        </a>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--</div><!--final ventana login-->
    <!-- ventana que aparece despues de pulsar el boton de login -->
    <!--REGISTRO-->
    <!-- ventana consecuente a pulsar el boton de registro en la ventana de login -->
    <div id="registro" class="modal">
        <div class="modal-content">
            <form id="formValidate" class="col s6 " role="form" method="POST" action="{{ url('/register') }}">
              {{ csrf_field() }}
              
                <div class="row {{ $errors->has('name') ? ' has-error' : '' }}">
                    <div class="input-field col s10">
                        <input id="name" type="text" class="validate nam" name="name" required/>
                        <label for="name">Nombre</label>
                        @if ($errors->has('name'))
                          <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                          </span>
                        @endif
                    </div>
                </div>
                
                <div class="row {{ $errors->has('name') ? ' has-error' : '' }}">
                    <div class="input-field col s10">
                        <input id="email" type="email" class="validate">
                        <label for="email" data-error="wrong" data-success="right" required>Email</label>
                        @if ($errors->has('email'))
                          <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                          </span>
                        @endif
                    </div>
                </div>
                
                <div class="row {{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="input-field col s10">
                        <input id="password" type="password" class="validate password" name="password" required>
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s10">
                      <input id="cpassword" type="password" class="validate cpassword" name="cpassword" required>
                      <label for="cpassword">Confirma Password</label> 
                    </div>
                </div>
            </form>
        </div>
        
        <div class="modal-footer">
              <a href="#!" class="blue lighten-1 modal-action modal-close waves-effect waves-green btn">Registrar</a>
        </div>
    </div>
    <div id="forgotPass" class="modal" role="form" method="POST" action="{{ url('/password/reset') }}">
      <div class="modal-content">
        <!--@if (session('status'))-->
        <!--  <div class="alert alert-success">-->
        <!--{{ session('status') }}-->
        <!--  </div>-->
        <!--@endif-->
        <form role="form" method="POST" action="{{ url('/password/email') }}">
         <!--{{ csrf_field() }}-->
          <div class="row">
            <div class="input-field">
              <input id="email" type="email" class="validate">
              <label for="email" data-error="Correo Erroneo" data-success="Correcto!">Email</label>
            </div>
            <!--@if ($errors->has('email'))-->
            <!--  <span class="help-block">-->
            <!--      <strong>{{ $errors->first('email') }}</strong>-->
            <!--  </span>-->
            <!--@endif-->
          </div> 
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" href="#!" class=" modal-action modal-close waves-effect waves-green btn">Enviar</button>
      </div>
      
    </div>
    <!-- ventana consecuente a pulsar el boton de registro en la ventana de login -->
    <!-- FINAL DE LA BARRA DE NAVEGADOR CON TODAS SUS FUNCIONES-->

@stop

@section('content')
  
  <div id="myhome">
    <div id="index-banner wellcome"  class="parallax-container">
        <div class="section no-pad-bot">
          <div class="container">
            <br><br>
            <h1 id="nomCamp" class="header bold center blue-text text-darken-4 ">Copinsa construimos para ti</h1>
          </div>
        </div>
        <div class="parallax"><img class="imagenCab"  src="/imgs/rio.gif"></div>
      </div>
    <div class="section">
      <div class="row">
      <div class="col s12">
        <ul class="tabs">
          <li class="tab col s3"><a id="clasi" href="#clasificacion" class="blue-text text-darken-2">Clasificación</a></li>
          <li class="tab col s3"><a id="time" href="#tiempo" class="blue-text text-darken-2">Tiempo</a></li>
          <li class="tab col s3"><a id="penal" href="#penalizacion" class="blue-text text-darken-2">Penalización</a></li>
          <li class="tab col s3"><a id="fail" href="#faltas" class="blue-text text-darken-2">Faltas</a></li>
        </ul>
      </div>
      <!--marcadores-->
      <div id="clasificacion" class="col s7 offset-s2">
        <h3 class="center">Clasificación</h3>
        <ul class="collection">
          <li class="collection-item avatar">
            <img src="https://3.bp.blogspot.com/-rYfrgqy_ZcM/VCDVHR6CQqI/AAAAAAAAJSA/xzPeJtHX2ac/s1600/2261917.jpg" class="circle materialboxed">
            <!--<input type=submit onclick="mueveReloj()">-->
            <!--<input id="reloj" type="text" name="reloj" size="10"> -->
            <span class="title"> OLA KE ASE</span>
            
          </li>
        </ul>
        <ul class="collection">
          <li class="collection-item avatar">
            <img src="https://pbs.twimg.com/profile_images/2875917330/33ea1d55d63925c7e2c45a80c67fd6a7_400x400.jpeg" class="circle materialboxed">
            <input type="text" name="reloj" size="10"> 
            <span class="title"> OLA KE MIRA</span>
          </li>
        </ul>
      </div><!--classificacion end-->
      <div id="tiempo" class="col s7 offset-s2">
        <h3 class="center">Tiempo</h3>
        <ul class="collection">
          <li class="collection-item avatar">
            <img src="https://3.bp.blogspot.com/-rYfrgqy_ZcM/VCDVHR6CQqI/AAAAAAAAJSA/xzPeJtHX2ac/s1600/2261917.jpg" class="circle materialboxed">
            <span class="title"> OLA KE ASE</span>
          </li>
        </ul>
        <ul class="collection">
          <li class="collection-item avatar">
            <img src="https://pbs.twimg.com/profile_images/2875917330/33ea1d55d63925c7e2c45a80c67fd6a7_400x400.jpeg" class="circle materialboxed">
            <span class="title"> OLA KE MIRA</span>
          </li>
        </ul>
      </div><!--tiempo end-->
      <div id="penalizacion" class="col s7 offset-s2">
        <h3 class="center">Penalización</h3>
        <ul class="collection">
          <li class="collection-item avatar">
            <img src="https://3.bp.blogspot.com/-rYfrgqy_ZcM/VCDVHR6CQqI/AAAAAAAAJSA/xzPeJtHX2ac/s1600/2261917.jpg" class="circle materialboxed">
            <span class="title"> OLA KE ASE</span>
          </li>
        </ul>
        <ul class="collection">
          <li class="collection-item avatar">
            <img src="https://pbs.twimg.com/profile_images/2875917330/33ea1d55d63925c7e2c45a80c67fd6a7_400x400.jpeg" class="circle materialboxed">
            <span class="title"> OLA KE MIRA</span>
          </li>
        </ul>
      </div><!--penalizaciones end-->
      <div id="faltas" class="col s7 offset-s2">
        <h3 class="center">Faltas</h3>
        <ul class="collection">
          <li class="collection-item avatar">
            <img src="https://3.bp.blogspot.com/-rYfrgqy_ZcM/VCDVHR6CQqI/AAAAAAAAJSA/xzPeJtHX2ac/s1600/2261917.jpg" class="circle materialboxed">
            <span class="title"> OLA KE ASE</span>
          </li>
        </ul>
        <ul class="collection">
          <li class="collection-item avatar">
            <img src="https://pbs.twimg.com/profile_images/2875917330/33ea1d55d63925c7e2c45a80c67fd6a7_400x400.jpeg" class="circle materialboxed">
            <span class="title"> OLA KE MIRA</span>
          </li>
        </ul>
      </div>
      </div><!--faltas end-->
    </div><!--final de seccion-->
  </div><!--final de home -->
  <div id="descensos">
    
  </div>
@stop