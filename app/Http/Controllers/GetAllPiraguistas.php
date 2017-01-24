<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class GetAllPiraguistas extends Controller
{
    //
    public function getPiraguistas(){
        
        $users = DB::table('piraguistas')
        ->join('descensos', 'descensos.id_piraguista', '=', 'piraguistas.id_piraguista')
        ->join('carrera', 'descensos.id_carrera', '=', 'carrera.id_carrera')
        ->where('carrera.id_carrera', '=', 1)
        ->get();
        
        return view('participantes', ['users' => $users]);
    }
}
