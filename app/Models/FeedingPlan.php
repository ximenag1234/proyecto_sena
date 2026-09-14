<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeedingPlan extends Model
{
    use HasFactory;

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
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }
}