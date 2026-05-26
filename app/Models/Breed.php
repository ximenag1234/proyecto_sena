<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    use HasFactory;

    // Nombre de la tabla (opcional porque Laravel lo infiere)
    protected $table = 'breeds';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'name',
        'species',
        'size',
        'description',
    ];

    // Si quieres definir relaciones (ejemplo con pets)
    public function pets()
    {
        return $this->hasMany(Pet::class);
    }
}