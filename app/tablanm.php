<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tablanm extends Model
{
    public function descensos()
    {
        return $this->belongsTo('descensos');
    }
    public function balizas()
    {
        return $this->belongsTo('balizas');
    }
}
