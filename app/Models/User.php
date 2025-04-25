<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'username',
        'email',
        'email_verified_at',
        'email_code',
        'phone',
        'country',
        'address',
        'article_stock',
        'about',
        'password',
    ];
}
