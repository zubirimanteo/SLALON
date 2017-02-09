<?php

namespace App\Http\Controllers;

use DB;
use App\descensos;
use App\tablanm;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class RecibirDatos extends Controller
{
    public function recibir(Request $request)
    {
        //recibe los datos de esta url
        //https://proyect76-igoreslein.c9users.io/recibirDatosController?id=1&sensorPaso=v1
        $all = $request->all();
        $id = $all['id']; //el id de la baliza
        $sensor = $all['sensorPaso']; //dato que nos mandara el sensor de paso
        $nd = 0; //numero_descendiente
        //make pusher great again(manda mensajes)
        $pusher = App::make('pusher');
        
            
        
        if($id == 1){
            
            do{
                $nd++;
                $descendiente = DB::table('descensos')
                ->where('descensos.numero_descendiente', '=', $nd)
                ->get();
                foreach($descendiente as $descendiente){
                    $tiempo = $descendiente->tiempo;
                    $id_descenso = $descendiente->id_descenso;
                }
            }while($tiempo != '00:00:00');
            
            $pusher->trigger('my-channel', 'eventoCarga', $nd);
            
            $evento = tablanm::create([
                'id_baliza' => $id,
                'id_descenso' => $id_descenso,
                'dato_paso' => $sensor,
                'dato_vibracion' => 0,
            ]);
            
        }//if($id == 1)
        
        else{
            
            $lastRegistro = DB::table('tablanms')
            ->where('id_nm', '=', DB::table('tablanms')->max('tablanms.id_nm'))
            ->get();
            
            foreach($lastRegistro as $lastRegistro){
                $id_lastDescenso = $lastRegistro->id_descenso;
            }
            $lastDescenso = DB::table('descensos')
            ->where('id_descenso', '=', $id_lastDescenso)
            ->get();
            
            $evento = tablanm::create([
                'id_baliza' => $id,
                'id_descenso' => $id_lastDescenso,
                'dato_paso' => $sensor,
                'dato_vibracion' => 0,
            ]);
            
            if($id != 5){
                $pusher->trigger('my-channel', 'eventoStop', $lastDescenso->numero_descendiente);
            }
            else{
                $pusher->trigger('my-channel', 'evento', 'deberia parar');
            }//if($id != 5)
            
        }//if($id == 1) 
        

       
    }
   
}