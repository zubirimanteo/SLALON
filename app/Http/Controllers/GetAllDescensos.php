<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class GetAllDescensos extends Controller
{

    public function getDescensos(){
        
        if ($_GET != null){
        
            $id = $_GET["id_carrera"];
            
            $descensos = DB::table('descensos')
            ->join('piraguistas', 'descensos.id_piraguista', '=', 'piraguistas.id_piraguista')
            ->join('carreras', 'descensos.id_carrera', '=', 'carreras.id_carrera')
            ->where('carreras.id_carrera', '=', $id )
            ->get();
        
            return view('descensos',compact('descensos','id'));
        
        }
        
        else{
            
            return redirect('/descensosrt');
            
        }
    
    }
    
    public function lastDescensos(){
            
        //fecha lortzeko
        $fecha_actual= getdate();
        $y = $fecha_actual['year'];
        $m = $fecha_actual['mon'];
        $d = $fecha_actual['mday'];
        $fecha="$y-$m-$d";
        
        
        $descensos = DB::table('descensos')
        ->join('piraguistas', 'descensos.id_piraguista', '=', 'piraguistas.id_piraguista')
        ->join('carreras', 'descensos.id_carrera', '=', 'carreras.id_carrera')
        ->where('carreras.fecha_inicio', '<=', $fecha)
        ->where('carreras.fecha_final', '>=', $fecha)
        ->get();
        
        return view('descensos', ['descensos'=>$descensos]);
        
    }
        
}