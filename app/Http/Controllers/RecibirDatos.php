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
        $sensor = $all['sensorPaso'];
        
        //make pusher great again(manda mensajes)
        $pusher = App::make('pusher');
        
        if($id == 1){
            $pusher->trigger('my-channel', 'eventoCarga', $id); 
        }
        else{
            $pusher->trigger('my-channel', 'eventoStop', $id);
        }
        
        if($id == 1){
            $numeroDescendiente = 1;
        }
        elseif($id == 5){
            $numeroDescendiente++;
        }
        
        // $evento = tablanm::create([
        //     'id_baliza' => $id,
        //     'id_descenso' => $descenso,
        //     'dato_paso' => $sensor,
        // ]);
       
    }
   
}