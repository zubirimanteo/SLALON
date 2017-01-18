<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class NotificationController extends Controller
{
    public function getIndex()
    {
        return view('notification');
    }

    public function postNotify(Request $request)
    {
        
        $text = $request['clave'];
        $pusher = App::make('pusher');
        $pusher->trigger('my-channel', 'my-event', $text); 

    }
}
