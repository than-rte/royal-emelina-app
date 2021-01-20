<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminLoginToken extends Authenticatable
{
    public $timestamps = false;
    protected $fillable = ['password'];
}
