<?php

namespace App\Http\Controllers;

use DB;
use App\descensos;
use App\tablanm;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use DateTime;

class RecibirDatos extends Controller
{
    public function recibir(Request $request)
    {
        //recibe los datos de esta url
        //https://proyect76-igoreslein.c9users.io/recibirDatosController?id=1&sensorPaso=v1
        $all = $request->all();
        $id = $all['id']; //el id de la baliza
        $sensor = $all['sensorPaso']; //dato que nos mandara el sensor de paso
        $penalizacion = '00:00:02'; //dato de penalizacion
        $nd = 0; //numero_descendiente
        //make pusher great again(crea un servicio de pusher para contactar con los demas)
        $pusher = App::make('pusher');
            
        
        if($id == 1){
            
            do{
                //loop para encontrar una carrera sin tiempo actualizado 
                //para empezar un nuevo descenso
                $nd++;
                $descendiente = DB::table('descensos')
                ->where('descensos.numero_descendiente', '=', $nd)
                ->get();
                foreach($descendiente as $descendiente){
                    $tiempo = $descendiente->tiempo;
                    $id_descenso = $descendiente->id_descenso;
                }
                
                //select para saber el maximo de descensos y no bloquearse en el bucle
                $max = DB::table('descensos')
                ->max('numero_descendiente');
                
            }while($tiempo != '00:00:00' & $max!=$nd);
            
            if($tiempo == '00:00:00'){
                
                //crear evento del dato recibido en la base de datos
                $evento = tablanm::create([
                    'id_baliza' => $id,
                    'id_descenso' => $id_descenso,
                    'dato_paso' => $sensor,
                    'dato_vibracion' => 0,
                ]);
                //update el estado
                $descenso=DB::table('descensos')
                ->where('id_descenso', '=', $id_descenso)
                ->update(['estado' => 'descendiendo']);
                //mandar mensaje correcto
                //crear un json para enviarlo a las demas paginas
                $arr = array('idDescenso' => $id_descenso, 'tiempo' => '00:00:00', 'tiempoFinal' => '00:00:00', 'estado' => 'descendiendo');
                $datos=json_encode($arr);
                //mandar mensaje
                $pusher->trigger('my-channel', 'eventoPaso', $datos);
            
            }//if($tiempo == '00:00:00')
           
            
        }//if($id == 1)
        
        else{
            
            //BUSCAR ULTIMO REGISTRO
            
                //ultimo registro para saber que descenso actualizar
                    $lastRegistro = DB::table('tablanms')
                    ->where('id_nm', '=', DB::table('tablanms')->max('tablanms.id_nm'))
                    ->get();
                    
                    foreach($lastRegistro as $lastRegistro){
                        $id_lastDescenso = $lastRegistro->id_descenso;
                        $id_lastBaliza = $lastRegistro->id_baliza;
                        $lastSensor = $lastRegistro->dato_paso;
                    }
            
            //CREAR EL EVENTO 
            
                //crear evento del dato recibido en la base de datos
                    $evento = tablanm::create([
                        'id_baliza' => $id,
                        'id_descenso' => $id_lastDescenso,
                        'dato_paso' => $sensor,
                        'dato_vibracion' => 0,
                    ]);
            
            //SABER SI ES REMONTE
                //SELECT LA ACTUAL BALIZA
                    $baliza = DB::table('balizas')
                    ->where('id_baliza', '=', $id)
                    ->get();
                    foreach ($baliza as $baliza) {
                        $remonte = $baliza->remonte;
                    }
                //SELECT EL ACTUAL DESCENSO    
                    $penDescenso = DB::table('descensos')
                    ->where('id_descenso', '=', $id_lastDescenso)
                    ->get();
                    foreach($penDescenso as $penDescenso){
                        $tmpP = $penDescenso->penalizacion;
                    }
                //TIEMPO DE PENALIZACION 
                    $penal = '00:00:02';
                    $tmpP = strtotime($tmpP);
                    $penal = strtotime($penal);
                    
                
                    if($remonte){
                        
                        //SI EL ANTERIOR REGISTRO ES DE LA MISMA BALIZA, CONTROLAR QUE SIGUE CORRECTAMENTE
                        if($id == $id_lastBaliza){
                            
                            if($lastSensor == 's3' or $lastSensor == 's4'){
                                if($sensor == 's3' or $sensor == 's4')
                                    //PENALIZAR EVENTO PARA QUE NO SALTE EN LAS CONDICIONES
                                    
                                        $penalizado = DB::table('tablanms')
                                        ->where('id_baliza', '=', $id)
                                        ->update(['dato_paso' => 'penalizado']);
                                        
                                    //PENALIZAR EL TIEMPO EN EL DESCENSO
                                        
                                        $tmpP = $tmpP + $penal;
                                        $tmpP=gmdate('H:i:s', $tmpP);
                    
                                        $penalizar = DB::table('descensos')
                                        ->where('id_descenso', '=', $id_lastDescenso)
                                        ->update(['penalizacion' => $tmpP]);
                                    
                            }
                            elseif($lastSensor == 's1' or $lastSensor == 's2'){
                                if($sensor == 's1' or $sensor == 's2')
                                    //PENALIZAR EVENTO PARA QUE NO SALTE EN LAS CONDICIONES
                                    
                                        $penalizado = DB::table('tablanms')
                                        ->where('id_baliza', '=', $id)
                                        ->update(['dato_paso' => 'penalizado']);
                                        
                                    //PENALIZAR EL TIEMPO EN EL DESCENSO
                                    
                                        $tmpP = $tmpP + $penal;
                                        $tmpP=gmdate('H:i:s', $tmpP);
                                        
                                        $penalizar = DB::table('descensos')
                                        ->where('id_descenso', '=', $id_lastDescenso)
                                        ->update(['penalizacion' => $tmpP]);
                                        
                            }
                            
                        }
                        //SINO CONTROLAR QUE ENTRE POR FUERA
                        else{
                            if($sensor == 's1' or $sensor == 's2')
                                //PENALIZAR EVENTO PARA QUE NO SALTE EN LAS CONDICIONES
                                
                                    $penalizado = DB::table('tablanms')
                                    ->where('id_baliza', '=', $id)
                                    ->update(['dato_paso' => 'penalizado']);
                                    
                                //PENALIZAR EL TIEMPO EN EL DESCENSO
                                
                                    $tmpP = $tmpP + $penal;
                                    $tmpP=gmdate('H:i:s', $tmpP);
                                        
                                    $penalizar = DB::table('descensos')
                                    ->where('id_descenso', '=', $id_lastDescenso)
                                    ->update(['penalizacion' => $tmpP]);
                                
                        }
                    }
                    
            //CONTROLAR QUE NO SE HAYA SALTADO LA ULTIMA PUERTA
            
                    $saltoPuerta = $id-$id_lastBaliza;    
                    if($saltoPuerta>1){
                        for($i = 0; $i < $saltoPuerta; $i++){
                            //PENALIZAR REGISTRO CON ID_LASTBALIZA+$I+1
                            
                                //CREAR EVENTO PENALIZADO
                                $evento = tablanm::create([
                                    'id_baliza' => $id+$i+1,
                                    'id_descenso' => $id_lastDescenso,
                                    'dato_paso' => 'penalizado',
                                    'dato_vibracion' => 0,
                                ]);
                                
                                //PENALIZAR EL TIEMPO EN EL DESCENSO
                                
                                $tmpP = $tmpP + $penal;
                                $tmpP=gmdate('H:i:s', $tmpP);
                                        
                                $penalizar = DB::table('descensos')
                                ->where('id_descenso', '=', $id_lastDescenso)
                                ->update(['penalizacion' => $tmpP]);
                        }
                    }
            
            //ACTUALIZAR EL TIEMPO SOLO    
                //SELECT INICIO DE LA CARRERA
                $inicioCarrera = DB::table('tablanms')
                ->where('id_descenso', '=', $id_lastDescenso)
                ->first();
                
                //tiempo inicio
                $tmpI = $inicioCarrera->created_at;
                $tmpI=strtotime($tmpI);
    
                //tiempo actual
                $tmpA = $evento->created_at;
                $tmpA=strtotime($tmpA);
                
                //sacar la diferencia y pasar a formato date
                $diferencia = $tmpA - $tmpI;
                $difTiempo=gmdate('H:i:s',$diferencia);
                
                //hacer el update
                $descenso = DB::table('descensos')
                ->where('id_descenso', '=', $id_lastDescenso)
                ->update(['tiempo' => $difTiempo]);
                
            //ACTUALIZAR EL TIEMPO FINAL Y LA PENALIZACION
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
                
                if($id!=5){
                    //crear un json para enviarlo a las demas paginas
                    $arr = array('idDescenso' => $id_lastDescenso, 'tiempo' => $tmp, 'tiempoFinal' => $tmpF, 'estado' => $estado);
                    $datos=json_encode($arr);
                    //mandar mensaje
                    $pusher->trigger('my-channel', 'eventoPaso', $datos);
                }
                else{
                    //update el estado
                    $descenso = DB::table('descensos')
                    ->where('id_descenso', '=', $id_lastDescenso)
                    ->update(['estado' => 'terminado']);
                    //crear un json para enviarlo a las demas paginas
                    $arr = array('idDescenso' => $id_lastDescenso, 'tiempo' => $tmp, 'tiempoFinal' => $tmpF, 'estado' => 'terminado');
                    $datos=json_encode($arr);
                    //mandar mensaje
                    $pusher->trigger('my-channel', 'eventoPaso', $datos);
                }

            
        }//if($id == 1) 
        
    }
   
}

?>
