@extends('layout')
@section('content')
    
        <form action="{{ url('/recibirDatosController') }}" method="GET">
            <input id="icon_prefix" type="text" name="id">
            <label for="icon_prefix">ID</label>
            <br/>
            <input id="icon_prefix" type="text" name="sensorPaso">
            <label for="icon_prefix">SensorPaso</label>
            <button type="submit" id="send">Enviar
            </button>
        </form>
        <form action="{{ url('/vibracionesController') }}" method="GET">
            <input id="icon_prefix" type="text" name="id">
            <label for="icon_prefix">ID</label>
            <br/>
            <input id="icon_prefix" type="text" name="sensorVibracion">
            <label for="icon_prefix">sensorVibracion</label>
            <button type="submit" id="send">Enviar
            </button>
        </form>
    
@stop
