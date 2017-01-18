<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class participantes extends Model
{
    public function descensos()
    {
        return $this->hasMany('descensos');
    }
}
