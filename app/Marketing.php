<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marketing extends Model
{
    //
    public function estudiante()
    {
        return $this->hasOne(App\User::class)->where('rol', 1);
    }
    public function empresario()
    {
        return $this->hasOne(App\User::class)->where('rol', 2);
    }
}
