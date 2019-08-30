<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{

    public $fillable = ['title', 'songwriter', 'hymnal_page'];
    public function charts()
    {
        return $this->hasMany('App\Chart');
    }

    public function performances()
    {
        return $this->hasMany('App\Chart');
    }

    public function playlists()
    {
        return $this->belongsToMany('App\Playlist', 'song_uses');
    }


}
