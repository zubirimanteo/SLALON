<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class carrera extends Model
{
    public function descensos()
    {
        return $this->hasMany('descensos');
    }
    protected $fillable = [
        'lugar','fecha_inicio','fecha_final','categoria','distancia','avatar_carrera',
    ];
    protected $primaryKey = 'id_carrera';
}
