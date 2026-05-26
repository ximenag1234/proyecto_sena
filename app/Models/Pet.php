<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    // Opcional
    protected $table = 'pets';

    protected $fillable = [
        'name',
        'species',
        'birth_date',
        'weight',
        'user_id',
        'breed_id',
    ];

    // 🔗 Relación: pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 🔗 Relación: pertenece a una raza
    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }

    // 🔗 Relación: muchos a muchos con condiciones de salud
    public function healthConditions()
    {
        return $this->belongsToMany(
            HealthCondition::class,
            'pet_health_condition',
            'pet_id',
            'health_condition_id'
        );
    }

    // 🔗 Relación: un pet tiene muchas actividades
    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    // 🔗 Relación: un pet tiene muchos recordatorios
    public function reminders()
    {
        return $this->hasMany(Reminder::class);
    }
}
