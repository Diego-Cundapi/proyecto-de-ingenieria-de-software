<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles; 

// class User extends Authenticatable implements MustVerifyEmail
class User extends Authenticatable
{
    // use HasApiTokens, HasFactory, Notifiable;
    use HasApiTokens, HasFactory;
    use HasRoles; 

    protected $fillable = [
        'name',
        'email',
        'password',
        'telefono',
        'direccion',
        'ciudad',
        'estado',
        'codigo_postal',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
