<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marketing extends Model
{
    public function users()
    {
        return $this->hasMany(User::class, 'marketing_id');
    }

    public function objetivos(){
        return $this->hasMany(Objetivo::class, 'marketing_id');
    }

    public function medios(){
        return $this->hasMany(Medios::class, 'marketing_id');
    }

    public function estrategias() {
        return $this->hasManyThrough(Estrategia::class, Objetivo::class);
    }
}