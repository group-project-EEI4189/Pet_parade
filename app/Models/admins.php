<?php

namespace App\Models;
 
use Illuminate\Foundation\Auth\User as Authenticatable;

class admins extends Authenticatable
{
    protected $guard = 'admin';

    protected $fillable = ['name', 'email', 'password'];
}
