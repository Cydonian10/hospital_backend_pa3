<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $table = "citas";

    protected $fillable = ['name', 'description', 'estado', 'user_id', 'medico_id', 'cliente'];
}
