<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function playlist()
    {
        return $this->hasOne('App\Playlist');
    }

    public function involved()
    {
        return $this->belongsToMany('App\MusicianSkill', 'roles');
    }
}
