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

Route::get('/landing', function () {
    return view('landing');
    
});

Route::get('/clubes', function () {
    return view('clubes');
    
});

Route::get('/descensos', function () {
    return view('descensos');
    
});
Route::get('/inscritos', function () {
    return view('inscritos');
    
});


Auth::routes();

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
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
Route::get('/participantesrt', 'GetAllPiraguistas@lastPiraguistas');
//ruta para mostrar las carreras __Juank__
Route::get('/', 'GetAllCarreras@getCarreras');
Route::get('/clubes', 'GetAllCarreras@getOneCarreratoAddInscription');
//ruta para crear piragustas
Route::post('/crear/piraguista', 'InscripccionControler@createPiraguista')->name('create.piraguista');
//ruta para coger descensos
Route::get('/descensos', 'GetAllDescensos@getDescensos');
Route::get('/descensosrt', 'GetAllDescensos@lastDescensos');
//ruta para inscritos
Route::get('/inscritos', 'GetAllPiraguistas@inscritos')











?>