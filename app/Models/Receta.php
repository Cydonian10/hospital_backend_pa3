<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{

    protected $table = "recetas";

    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'medico_name',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
