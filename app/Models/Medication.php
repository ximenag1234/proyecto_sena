<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    use HasFactory;

    // Opcional (Laravel lo infiere)
    protected $table = 'medications';

    protected $fillable = [
        'name',
        'description',
    ];

    // Relación: un medicamento tiene muchas dosis
    public function doses()
    {
        return $this->hasMany(MedicationDose::class);
    }
}