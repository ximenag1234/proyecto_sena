<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    // Opcional
    protected $table = 'activities';

    protected $fillable = [
        'type',
        'date_time',
        'description',
        'pet_id',
    ];
    protected $casts = [
    'date_time' => 'datetime',
];

    // 🔗 Relación: pertenece a una mascota
    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
}