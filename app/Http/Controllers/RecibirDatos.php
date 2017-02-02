<?php

namespace App\Http\Controllers;

use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class RecibirDatos extends Controller
{
    public function recibir(Request $request)
    {
        
        $all = $request->all();
        $id = $all['id'];
        $dp = $all['dp'];
        $dv = $all['dv'];
        $ts = $all['ts'];
        
        $pusher = App::make('pusher');
        
        
        if($id == 1){
        $pusher->trigger('my-channel', 'eventoCarga', $id); 
        // $contador++;
        }
        else{
        $pusher->trigger('my-channel', 'eventoStop', $id);
        }
        
        // $piraguistas = DB::table('piraguistas')->value('id_piraguista');
        // var_dump($piraguistas);
        // if($id = 1){
        //     $idCarrera = DB::table('carrera')->where('lugar', 'donosti')->value('id_carrera');
        //     $piraguistas = DB::table('piraguistas')->value('id_piraguista');
        //     DB::table('descensos')->insert([
        //         'id_carrera' => $idCarrera,
                
        //     ]);
        // };
        /*   DB::table('tablanm')->insert([
            'id_baliza' => $id,
            'correcto' => rand(0,1),
        ]);
        */
    }
   
}