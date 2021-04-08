<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    
    protected $fillable = [
        'nisn', 'nama', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

}
