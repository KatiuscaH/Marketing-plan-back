<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estrategia extends Model
{
    //
    protected $fillable = ['tactica', 'responsable', 'fecha', 'presupuesto', 'objetivo_id', 'indicador_logro'];

    public function objetivos(){
        return $this->belongsTo(Objetivo::class, 'objetivo_id');
    }
}
