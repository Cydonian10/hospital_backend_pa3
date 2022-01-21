<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $table = "especialidads";


    use HasFactory;

    //uno a muchos
    public function medicos()
    {
        return $this->hasMany(Medico::class);
    }
}
