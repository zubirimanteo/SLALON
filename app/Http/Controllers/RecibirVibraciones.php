<?php

namespace App\Http\Controllers;

use DB;
use App\descensos;
use App\tablanm;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class RecibirVibraciones extends Controller
{
    public function recibir(Request $request)
    {
        //recibe los datos de esta url
        //https://proyect76-igoreslein.c9users.io/vibracionesController?id=1&sensorVibracion=v1
        $all = $request->all();
        $id = $all['id']; //el id de la baliza
        $sensor = $all['sensorVibracion']; //dato que nos mandara el sensor de paso
        $nd = 0; //numero_descendiente
        //make pusher great again(manda mensajes)
        $pusher = App::make('pusher');
        
            
            //ultimo registro para saber que descenso actualizar
            $lastRegistro = DB::table('tablanms')
            ->where('id_nm', '=', DB::table('tablanms')->max('tablanms.id_nm'))
            ->get();
            
            foreach($lastRegistro as $lastRegistro){
                $id_lastDescenso = $lastRegistro->id_descenso;
            }
            
            //crear evento del dato recibido en la base de datos
            $evento = tablanm::create([
                'id_baliza' => $id,
                'id_descenso' => $id_lastDescenso,
                'dato_paso' => 0,
                'dato_vibracion' => $sensor,
            ]);
            
            //saber cual es el inicio de la carrera
            $inicioCarrera = DB::table('tablanms')
            ->where('id_descenso', '=', $id_lastDescenso)
            ->first();
            
            //tiempo inicio
            $tmpI = $inicioCarrera->created_at;
            $tmpI=strtotime($tmpI);

            //tiempo actual
            $tmpA = $evento->created_at;
            $tmpA=strtotime($tmpA);
            
            //sacar la diferencia y pasarlo como date
            $diferencia = $tmpA - $tmpI;
            $difTiempo=gmdate('H:i:s',$diferencia);
            
            //hacer un select para despues sumar bn la penalizacion
            $pen = DB::table('descensos')
            ->where('id_descenso', '=', $id_lastDescenso)
            ->get();
            //hacer una variable del tipo de penalizacion
            $tmpPen = '00:00:02';
            $tmpPen = strtotime($tmpPen);
            
            foreach($pen as $pen){
                $penal = $pen->penalizacion;
            }
            $penal=strtotime($penal);
            $penal=$penal+$tmpPen;
            $penal=gmdate('H:i:s', $penal);
            
            //hacer el update
            $descenso = DB::table('descensos')
            ->where('id_descenso', '=', $id_lastDescenso)
            ->update([
                'tiempo' => $difTiempo,
                'penalizacion' => $penal
            ]);
            
            //actualizar tiempo final
            //select para coger el tiempo y la penalizacion
            $final = DB::table('descensos')
            ->where('id_descenso', '=', $id_lastDescenso)
            ->get();
            
            foreach($final as $final){
                $tmp=$final->tiempo;
                $tmpP=$final->penalizacion;
                $estado=$final->estado;
            }
            
            $tmp=strtotime($tmp);
            $tmpP=strtotime($tmpP);
            //sumar los tiempos
            $tmpF=$tmp+$tmpP;
            $tmpF=gmdate('H:i:s', $tmpF);
            
            //dar formato tambien a los otros tiempos para poder cambiarlos despues mediante jquery
            $tmp=gmdate('H:i:s', $tmp);
            $tmpP=gmdate('H:i:s', $tmpP);
            //update el tiempo
            $descenso = DB::table('descensos')
            ->where('id_descenso', '=', $id_lastDescenso)
            ->update(['tiempoFinal' => $tmpF]);
            
            //crear un json para enviarlo a las demas paginas
            $arr = array('idDescenso' => $id_lastDescenso, 'tiempo' => $tmp, 'penalizacion' => $tmpP, 'tiempoFinal' => $tmpF, 'estado' => $estado);
            $datos=json_encode($arr);
            //mandar mensaje
            $pusher->trigger('my-channel', 'eventoVibracion', $datos);
            
       
    }
   
}