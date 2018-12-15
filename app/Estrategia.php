<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estrategia extends Model
{
    //

    public function objetivos(){
        return $this->belongsTo(Objetivo::class);
    }
}
