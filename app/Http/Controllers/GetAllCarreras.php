<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class GetAllCarreras extends Controller
{
    public function getCarreras(){
        
        $carreras = DB::table('carrera')->get();
        
        return view('inicio', ['carreras' => $carreras]);
    }
    
    public function getOneCarreratoAddInscription(){
        $carrera =DB::table('carrera')->get();
        
        return view('clubes',['carrera' => $carrera]);
    }
}
