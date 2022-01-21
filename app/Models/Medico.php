<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Medico extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "medicos";

    protected $fillable = [
        'name',
        'email',
        'password',
        'last_name',
        'especialidad_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    //muchos a uno
    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class);
    }

    //muchos a muchos
    public function users()
    {
        return $this->belongsToMany(User::class, 'citas');
    }
}
