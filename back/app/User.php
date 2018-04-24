<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password', 'role'];

    protected $hidden = ['password', 'remember_token',];

    protected $attributes = [
        'role' => 0
    ];

    public function isDoctor()
    {
        return $this->role === 1;
    }
}
