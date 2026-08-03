<?php

namespace Database\Seeders;

use App\Models\Breed;
use Illuminate\Database\Seeder;

class BreedSeeder extends Seeder
{
    public function run(): void
    {
        $razas = [

            [
                'name' => 'Labrador Retriever',
                'species' => 'Perro',
                'size' => 'Grande',
                'description' => 'Perro familiar y cariñoso',
            ],

            [
                'name' => 'Pastor Alemán',
                'species' => 'Perro',
                'size' => 'Grande',
                'description' => 'Perro guardián e inteligente',
            ],

            [
                'name' => 'Golden Retriever',
                'species' => 'Perro',
                'size' => 'Grande',
                'description' => 'Muy amigable y juguetón',
            ],

            [
                'name' => 'Persa',
                'species' => 'Gato',
                'size' => 'Mediano',
                'description' => 'Pelaje largo y abundante',
            ],

            [
                'name' => 'Siamés',
                'species' => 'Gato',
                'size' => 'Mediano',
                'description' => 'Muy activo y sociable',
            ],

        ];

        foreach ($razas as $raza) {

            Breed::updateOrCreate(
                ['name' => $raza['name']],
                $raza
            );

        }
    }
}