<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Musician extends Model
{
    public function skills()
    {
        return $this->belongsToMany('App\Skill');
    }
}
