<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seller extends Authenticatable
{
    use HasFactory , Notifiable;

    protected $guard = 'seller' ;

    protected $guarded =[];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
