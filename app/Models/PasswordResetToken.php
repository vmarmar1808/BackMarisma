<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordResetToken extends Model
{
    protected $table = 'password_reset_token';
    protected $fillable = ['email', 'token']; 
    public $timestamps = true;
}