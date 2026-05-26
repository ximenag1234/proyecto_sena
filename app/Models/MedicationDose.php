<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicationDose extends Model
{
    use HasFactory;

    // Opcional
    protected $table = 'medication_doses';

    protected $fillable = [
        'amount',
        'frequency',
        'age_min',
        'age_max',
        'weight_min',
        'weight_max',
        'medication_id',
        'breed_id',
    ];

    // 🔗 Relación: pertenece a un medicamento
    public function medication()
    {
        return $this->belongsTo(Medication::class);
    }

    // 🔗 Relación: pertenece a una raza
    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }
}