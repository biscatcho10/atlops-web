<?php

namespace Modules\Admins\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laratrust\Traits\LaratrustUserTrait;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory, LaratrustUserTrait;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $guard = "admin";
}
