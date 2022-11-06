<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Authenticatable
{
    use HasFactory , Notifiable;

    protected $guard = 'admin' ;
    protected $guarded = [] ;
    
    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'password',
        'status',

    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
