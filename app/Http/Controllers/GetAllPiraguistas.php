<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use DB;

class GetAllPiraguistas extends Controller
{
    //
    public function getPiraguistas(){
        
        if($_GET != null){
        
        $id = $_GET["id_carrera"];
        
        $users = DB::table('piraguistas')
        ->join('descensos', 'descensos.id_piraguista', '=', 'piraguistas.id_piraguista')
        ->join('carreras', 'descensos.id_carrera', '=', 'carreras.id_carrera')
        ->where('carreras.id_carrera', '=', $id)
        ->get();
        
        return view('participantes', ['users' => $users]);
        }
        
        else{
            return redirect('/participantesrt');
        }
        
    }
    
    public function lastPiraguistas(){
         //fecha lortzeko
        $fecha_actual= getdate();
        $y = $fecha_actual['year'];
        $m = $fecha_actual['mon'];
        $d = $fecha_actual['mday'];
        $fecha="$y-$m-$d";
        
        
        $users = DB::table('piraguistas')
        ->join('descensos', 'descensos.id_piraguista', '=', 'piraguistas.id_piraguista')
        ->join('carreras', 'descensos.id_carrera', '=', 'carreras.id_carrera')
        ->where('carreras.fecha_inicio', '<=', $fecha)
        ->where('carreras.fecha_final', '>=', $fecha)
        ->get();
        
        return view('participantes', ['users' => $users]);
    }
    
    public function inscritos(){
        
        $email = Auth::user()->email;
        //@-ren posizioa bilatu
        $pos=strpos ( $email , "@" );
        //@ aurretik dagoena lortu taldean gordetzeko
        $equipo=substr ( $email , 0 ,$pos);
        
        $inscritos = DB::table('piraguistas')
        ->join('descensos', 'descensos.id_piraguista', '=', 'piraguistas.id_piraguista')
        ->join('carreras', 'descensos.id_carrera', '=', 'carreras.id_carrera')
        ->where('piraguistas.club', '=', $equipo)
        ->get();
        
        return view('inscritos', ['inscritos' => $inscritos]);
        
        
        
    }
}
