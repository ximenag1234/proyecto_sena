<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toy extends Model
{
    use HasFactory;

    // Opcional
    protected $table = 'toys';

    protected $fillable = [
        'name',
        'type',
        'description',
    ];

    // Relación muchos a muchos con Breed
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