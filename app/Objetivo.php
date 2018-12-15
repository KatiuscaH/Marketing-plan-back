<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objetivo extends Model
{
    //
    protected $fillable = ['nombre', 'marketing_id'];

    public function marketing(){
        return $this->belongsTo(Marketing::class);
    }

    public function estrategias(){
        return $this->hasMany(Estrategia::class);
    }
}
