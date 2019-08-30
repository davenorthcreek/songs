<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function musicianSkill()
    {
        return $this->hasMany('App\MusicianSkill');
    }
}
