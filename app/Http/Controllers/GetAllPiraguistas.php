<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class GetAllPiraguistas extends Controller
{
    //
    public function getPiraguistas(){
        
        $users = DB::table('piraguistas')->get();
        
        return view('participantes', ['users' => $users]);
    }
}
