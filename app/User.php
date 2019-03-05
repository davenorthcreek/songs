<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;
use App\Auth\CanCreatePassword;
use App\Auth\Contracts\CanCreatePassword as CanCreatePasswordContract;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements canCreatePasswordContract
{
    use Notifiable, CanResetPassword, CanCreatePassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
