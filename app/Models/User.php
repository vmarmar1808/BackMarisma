<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    // Campos ocultos en respuestas JSON
    protected $hidden = [
        'password',
    ];

    // Conversión de atributos
    protected $casts = [
        'password' => 'hashed', // Almacena la contraseña de forma segura
    ];
}
