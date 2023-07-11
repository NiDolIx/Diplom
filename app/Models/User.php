<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_name',
        'user_surname',
        'user_patronymic',
        'user_phone',
        'user_mail',
        'user_role',
        'password',
        'carservise_id'
    ];

    protected $table = 'users';

    public $timestamps = false;

    protected $primaryKey = 'user_id';

    protected $casts = [
        'user_id' => 'integer',
        'carservise_id' => 'integer',
        'user_name' => 'string',
        'user_surname' => 'string',
        'user_patronymic' => 'string',
        'user_phone' => 'string',
        'user_mail' => 'string',
        'user_role' => 'integer',
        'password' => 'encrypted'
    ];
}
