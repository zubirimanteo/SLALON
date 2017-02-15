<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class descensos extends Model
{
    public function carrera()
    {
        return $this->belongsTo('carreras');
    }
    public function piraguistas()
    {
        return $this->belongsTo('piraguistas');
    }
    public function tablanm()
    {
        return $this->hasMany('tablanm');
    }
    protected $fillable = [
        'id_carrera', 'id_piraguista', 'numero_descendiente', 'tiempo', 'penalizacion', 'tiempoFinal', 'estado'
    ];
    protected $primaryKey = 'id_descenso';
}
