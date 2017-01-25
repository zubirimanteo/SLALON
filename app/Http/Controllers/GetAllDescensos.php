<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class GetAllDescensos extends Controller
{

    public function getDescensos(){
        
        $id = $_GET["id_carrera"];
        
        $descensos = DB::table('descensos')
        ->join('piraguistas', 'descensos.id_piraguista', '=', 'piraguistas.id_piraguista')
        ->join('carrera', 'descensos.id_carrera', '=', 'carrera.id_carrera')
        ->where('carrera.id_carrera', '=', $id )
        ->get();
        
        return view('descensos',compact('descensos','id'));
        
    }

}