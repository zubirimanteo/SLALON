@extends('layouts.app')
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
            <li><a href="{{ url('/descensos') }}">Descensos</a></li>
            @else
            <li><a href="{{ url('/') }}">Inicio</a></li>
            <li><a href="{{ url('/participantes') }}">Participantes</a></li>
            <li><a href="{{ url('/descensos') }}">Descensos</a></li>
            <li><a href="{{ url('/clubes') }}">Inscripción</a></li>
            <li><a href="{{ url('/inscritos') }}"> Inscritos</a></li>
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
          <li><div class="userView">
            <div class="background">
              <img src="imgs/4.jpg">
            </div>
            <a href="#!user"><img class="circle" src="/imgs/Logo.png"></a>
            <a href="#!name"><span class="titleside white-text  name">Slasport</span></a>
          </div></li>
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
          <li><a href="{{ url('/clubes') }}">Inscripción</a></li>
          <li><a href="{{ url('/inscritos') }}">Inscritos</a></li>
          <li class="divider"></li>
          <li><a href="{{ url('/logout') }}" class="waves-effect waves-light blue-text text-darken-4 ">Log out</a></li>
        </ul>
        @endif
    </div>
</nav>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class=" col-md-8 col-md-offset-2">
            <div class=" panel panel-default">
                <br><br><br><br><br><br>
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <form class="form-horizontal col s6 push-s3" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--recuerdame no funcional-->
                        <!--<div class="form-group">-->
                        <!--    <div class="col-md-6 col-md-offset-4">-->
                        <!--        <div class="checkbox">-->
                        <!--            <label>-->
                        <!--                <input type="checkbox" name="remember"> Remember Me-->
                        <!--            </label>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary  light-blue darken-3">
                                    Login
                                </button>
                                <!--BOton de olvide mi password-->
                                <!--<a class="btn btn-link  light-blue darken-3" href="{{ url('/password/reset') }}">-->
                                <!--    Forgot Your Password?-->
                                <!--</a>-->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection