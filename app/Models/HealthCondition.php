<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HealthCondition extends Model
{
    use HasFactory;

    protected $table = 'health_conditions';

    protected $fillable = [
        'name',
        'description',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

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