<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marketing extends Model
{
    //
    public function users()
    {
        return $this->hasMany(User::class, 'marketing_id');
    }
}
