<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class GetAllPiraguistas extends Controller
{
    //
    public function getPiraguistas(){
        
        $id = $_GET["id_carrera"];
        
        $users = DB::table('piraguistas')
        ->join('descensos', 'descensos.id_piraguista', '=', 'piraguistas.id_piraguista')
        ->join('carrera', 'descensos.id_carrera', '=', 'carrera.id_carrera')
        ->where('carrera.id_carrera', '=', $id)
        ->get();
        
        return view('participantes', ['users' => $users]);
    }
}
