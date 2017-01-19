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

Route::get('/', function () {
    return view('inicio');
    
});

Route::get('/landing', function () {
    return view('landing');
    
});

Route::get('/clubes', function () {
    return view('clubes');
    
});

Route::get('/descensos', function () {
    return view('descensos');
    
});

// Route::get('/admin', function () {
//     return view('admin');
// });


Auth::routes();

Route::get('/logout', function () {
    Auth::logout();
    return view('inicio');
});

Route::get('/home', 'HomeController@index');

//ruta funzionau berko zun recibirDatos?datuak=igor bezela baino recibirDatosController jarri ber da
Route::get('/recibirDatos{datuak}', 'RecibirDatos@recibir');

//rutas de pusher real time
Route::get('/notifications', 'NotificationController@getIndex');
Route::post('/notifications', 'NotificationController@postNotify');

//rutas de acceso a DB
//ruta para coger piraguistas
Route::get('/participantes', 'GetAllPiraguistas@getPiraguistas');
//ruta para crear piragustas
Route::post('/crear/piraguista', 'InscripccionControler@createPiraguista')->name('create.piraguista');
//ruta para coger descensos
Route::get('/descensos', 'GetAllDescensos@getDescensos');
