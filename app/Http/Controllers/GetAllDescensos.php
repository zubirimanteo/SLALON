<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class GetAllDescensos extends Controller
{
    public function getDescensos(){
        
        
        $descensos = DB::table('descensos')
        ->join('piraguistas', 'descensos.id_piraguista', '=', 'piraguistas.id_piraguista')
        ->join('carrera', 'descensos.id_carrera', '=', 'carrera.id_carrera')
        ->where('carrera.id_carrera', '=', 1)
        ->get();
        
        return view('descensos',['descensos' => $descensos]);
        
    }
}