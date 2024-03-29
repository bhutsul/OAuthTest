<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;

    protected $fillable = [
        'lastName', 'name', 'patronimicName', 'dateOfBirth', 'phone', 'email', 'city', 'registrationDate','active','code',
    ];
}
