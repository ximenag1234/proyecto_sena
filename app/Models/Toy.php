<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Toy extends Model
{
    use HasFactory;

    protected $table = 'toys';

    protected $fillable = [
        'name',
        'type',
        'description',
        'user_id',
        'pet_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function pet(): BelongsTo
    {
        return $this->belongsTo(Pet::class);
    }

    public function breeds()
    {
        return $this->belongsToMany(
            Breed::class,
            'breed_toy',
            'toy_id',
            'breed_id'
        );
    }
}