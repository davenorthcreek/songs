<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    public function songUse()
    {
        return $this->hasMany('App\SongUse');
    }
}
