<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class carrera extends Model
{
    public function descensos()
    {
        return $this->hasMany('descensos');
    }
}
