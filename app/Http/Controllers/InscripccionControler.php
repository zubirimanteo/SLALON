<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\piraguista;
use App\descensos;

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
        
        
        $descenso = new descensos;
        $descenso->id_carrera = $request->carrera;
        $descenso->id_piraguista = $piraguista->id_piraguista;
        $descenso->tiempo = '00:00:00';
        $descenso->save();
        
        $arrayAvatar = explode("/", $piraguista->avatar_piraguista);
            $arrayAvatar[0] = 'storage';
            $arrayAvatarCorrect = '/' . $arrayAvatar[0] . '/' . $arrayAvatar[1] . '/' . $arrayAvatar[2];
            $piraguista->update([
                'avatar_piraguista' => $arrayAvatarCorrect
            ]); 
        
        
        return redirect('/clubes');
    }
}

//