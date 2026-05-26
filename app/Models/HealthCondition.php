<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthCondition extends Model
{
    use HasFactory;

    // Laravel lo infiere, pero lo dejamos explícito
    protected $table = 'health_conditions';

    protected $fillable = [
        'name',
        'description',
    ];

    // Relación muchos a muchos con Pet
    public function pets()
    {
        return $this->belongsToMany(
            Pet::class,
            'pet_health_condition',
            'health_condition_id',
            'pet_id'
        );
    }
}