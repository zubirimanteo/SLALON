<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class GetAllDescensos extends Controller
{
    public function getDescensos(){
        
        $descensos = DB::table('descensos')->get();
        // $results = DB::select('select * from descensos where id = :id', ['id' => 1]);
        $piraguistas = DB::table('piraguistas')->get();
        
        return view('descensos', compact('descensos','piraguistas'));
        
    }
}