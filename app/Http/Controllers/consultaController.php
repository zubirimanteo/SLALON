<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class consultaController extends Controller
{
    public function recibir(Request $request)
    {
        //recibe los datos de esta url
        //https://proyect76-igoreslein.c9users.io/consultaController?id=1
        $all = $request->all();
        $id = $all['id'];
        
        $pusher = App::make('pusher');
        
        $texto = 'recibo el dato';
        $pusher->trigger('my-channel', 'getConsulta', $texto); 
        
        $remonte = DB::table('balizas')
        ->where('balizas.id_baliza', '=', $id)
        ->get();
        
        foreach($remonte as $remonte){
            $remonte=$remonte->remonte;
            $remonte=$remonte.'';
            return $remonte;
        } 
        
    
    }
}
