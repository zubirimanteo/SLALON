<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class balizas extends Model
{
    public function tablanm()
    {
        return $this->hasMany('tablanm');
    }
}
