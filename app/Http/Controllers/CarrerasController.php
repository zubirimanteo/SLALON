<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\carrera;

class CarrerasController extends Controller
{
    //
    protected function createCarrera(Request $request)
    {
        
        
        $this->validate( $request, [
            'lugar' => 'required',
            'fecha_inicio' => 'required',
            'fecha_final' => 'required',
            'categoria' =>'required',
            'distancia' =>'required',
            'avatar' =>'required'
            
        ]);
    
        $carrera = carrera::create([
            'lugar' => $request->lugar,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_final' => $request->fecha_final,
            'categoria' => $request->categoria,
            'distancia' => $request->distancia,
            'avatar_carrera' => $request->avatar->store('/public/carreras'),
        ]);
        
        
        $arrayAvatar = explode("/", $carrera->avatar_carrera);
            $arrayAvatar[0] = 'storage';
            $arrayAvatarCorrect = '/' . $arrayAvatar[0] . '/' . $arrayAvatar[1] . '/' . $arrayAvatar[2];
            $carrera->update([
                'avatar_carrera' => $arrayAvatarCorrect
            ]); 
        
        
        return redirect('/carreras');
    }
}
