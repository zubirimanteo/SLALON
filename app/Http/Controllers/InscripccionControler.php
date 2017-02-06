<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\piraguista;
use App\descensos;
use DB;

class InscripccionControler extends Controller
{

    protected function createPiraguista(Request $request)
    {
        
        
        $this->validate( $request, [
            'nombre' => 'required',
            'apellido' => 'required',
            'apellido2' => 'required',
            'club' =>'required',
            'nacionalidad' =>'required',
            'genero' =>'required',
            'avatar' =>'required',
            'carrera' =>'required'
            
        ]);
    
        $piraguista = piraguista::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'apellido2' => $request->apellido2,
            'club' => $request->club,
            'nacionalidad' => $request->nacionalidad,
            'genero' => $request->genero,
            'avatar_piraguista' => $request->avatar->store('/public/avatars'),
        ]);
        
        $arrayAvatar = explode("/", $piraguista->avatar_piraguista);
        $arrayAvatar[0] = 'storage';
        $arrayAvatarCorrect = '/' . $arrayAvatar[0] . '/' . $arrayAvatar[1] . '/' . $arrayAvatar[2];
        $piraguista->update([
            'avatar_piraguista' => $arrayAvatarCorrect
        ]); 
        
        $descenso = descensos::create([
            'id_carrera' => $request->carrera,
            'id_piraguista' => $piraguista->id_piraguista,
            'numero_descendiente' => 0,
            'tiempo' => '00:00:00',
        ]);
        
        $descendiente = DB::table('descensos')
        ->where('descensos.id_carrera', '=', $request->carrera)
        ->where('descensos.id_descenso', '<', $descenso->id_descenso)
        ->get();
        
        if($descendiente != ''){
            $otroDescendiente = DB::table('descensos')
            ->where('descensos.id_carrera', '=', $request->carrera)
            ->max('descensos.numero_descendiente');
            $proximoDescendiente = $otroDescendiente+1;
            $descenso->update([
                'numero_descendiente' => $proximoDescendiente
            ]); 
        }
        else{
            $descenso->update([
                'numero_descendiente' => 1
            ]); 
        }
                
        return redirect('/clubes');
    }
}