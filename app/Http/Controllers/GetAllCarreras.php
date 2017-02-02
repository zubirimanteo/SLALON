<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class GetAllCarreras extends Controller
{
    public function getCarreras(){
        
        $carreras = DB::table('carreras')->get();
        
        return view('inicio', ['carreras' => $carreras]);
    }
    
    public function getOneCarreratoAddInscription(){
        $carreras =DB::table('carreras')->get();
        
        return view('clubes',['carreras' => $carreras]);
    }
}
