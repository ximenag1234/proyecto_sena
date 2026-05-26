<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BathRoutine extends Model
{
    use HasFactory;

    // Opcional
    protected $table = 'bath_routines';

    protected $fillable = [
        'frequency',
        'age_min',
        'age_max',
        'breed_id',
    ];

    // 🔗 Relación: pertenece a una raza
    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }
}