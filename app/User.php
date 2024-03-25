<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    protected $table = "users";
    protected $fillable = [
    	'name',
        'email',
        'password',
        'role'
    ];
}
