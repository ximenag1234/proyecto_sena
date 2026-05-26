<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    use HasFactory;

    // Opcional
    protected $table = 'reminders';

    protected $fillable = [
        'type',
        'date_time',
        'status',
        'pet_id',
    ];

    // 🔗 Relación: pertenece a una mascota
    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
}