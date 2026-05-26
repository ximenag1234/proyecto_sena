<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedingPlan extends Model
{
    use HasFactory;

    // Opcional (Laravel lo infiere)
    protected $table = 'feeding_plans';

    protected $fillable = [
        'food_type',
        'amount',
        'frequency',
        'age_min',
        'age_max',
        'weight_min',
        'weight_max',
        'breed_id',
    ];

    // 🔗 Relación: pertenece a una raza
    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }
}