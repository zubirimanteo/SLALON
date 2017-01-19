<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Piraguista extends Model
{
    public function descensos()
    {
        return $this->hasMany('descensos');
    }
    
    protected $fillable = [
        'nombre', 'apellido', 'apellido2', 'telefono', 'club', 'nacionalidad','genero', 'avatar',
    ];
    protected $primaryKey = 'id_piraguista';
}
