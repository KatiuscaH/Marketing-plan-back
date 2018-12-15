<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medios extends Model
{
    //
    protected $fillable = ['publicidad', 'caracteristicas', 'ubicacion', 'realizacion', 'duracion', 'numero', 'costo', 'marketing_id'];
}
