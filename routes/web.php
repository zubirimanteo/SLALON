<?php

use Illuminate\Support\Facades\App;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//vistas que se ven sin un usuario registrado
    //raiz para ver las carreras y la pagina de inicio
    
    //ruta para mostrar las carreras
    Route::get('/', 'GetAllCarreras@getCarreras');
    
    //ruta para coger piraguistas
    Route::get('/participantes/{id}', 'GetAllPiraguistas@getPiraguistas');
    Route::get('/participantes', 'GetAllPiraguistas@lastPiraguistas');
    
    //ruta para coger descensos
    Route::get('/descensos/{id}', 'GetAllDescensos@getDescensos');
    Route::get('/descensos', 'GetAllDescensos@lastDescensos');
//rutas de autentificacion

    //todas las rutas de autentificacion
    Auth::routes();
    //funcionalidad para deslogearse
    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/');
    });
    
//vistas con un usuario registrado cualquiera

    //ruta para que en la hoja de inscripcion se vean las carreras
    Route::get('/clubes', 'GetAllCarreras@getOneCarreratoAddInscription');
    //ruta para crear piragustas despues de rellenar la hoja de inscripcion ^
    Route::post('/crear/piraguista', 'InscripccionControler@createPiraguista')->name('create.piraguista');

    //ruta para inscritos
    Route::get('/inscritos', 'GetAllPiraguistas@inscritos');
    

//rutas para real time pusher y relacion con recibir datos de balizas

    //ruta funzionau berko zun recibirDatos?datuak=igor bezela baino recibirDatosController jarri ber da
    Route::get('/recibirDatos{datuak}', 'RecibirDatos@recibir');
    Route::get('/vibraciones{datuak}', 'RecibirVibraciones@recibir');
    //ruta para que las balizas consulten a la base de datos y devualvan la respuesta (remonte)
    Route::get('/consulta{datuak}', 'consultaController@recibir');
    //rutas de pusher real time //// para ver que los mensajes si se transmiten
    Route::get('/notifications', 'NotificationController@getIndex');
    Route::post('/notifications', 'NotificationController@postNotify');

//RUTAS DE PRUEBA

    //ruta para la vista del formulario para las carreras
    Route::get('/carreras', function () {
        return view('carreras');
    });
    
    //ruta para añadir carreras a la base de datos
    Route::post('/crear/carrera', 'CarrerasController@createCarrera')->name('create.carrera');


   


?>