<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\piraguista;

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
            
        ]);
    
        $piraguista = piraguista::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'apellido2' => $request->apellido2,
            'club' => $request->club,
            'nacionalidad' => $request->nacionalidad,
            'genero' => $request->genero,
            'avatar' => $request->avatar->store('/public/avatars'),
        ]);
        // $piraguista = Piraguista::where('nombre', $request->nombre)->
        //                     where('apellido', $request->apellido)->
        //                     where('apellido2', $request->apellido2)->
        //                     first();
                            
        $arrayAvatar = explode("/", $piraguista->avatar);
            $arrayAvatar[0] = 'storage';
            $arrayAvatarCorrect = '/' . $arrayAvatar[0] . '/' . $arrayAvatar[1] . '/' . $arrayAvatar[2];
            $piraguista->update([
                'avatar' => $arrayAvatarCorrect
            ]);            
        return redirect('/participantes');
    }
}

//