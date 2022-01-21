<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{

    protected $table = "recetas";

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
