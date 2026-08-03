<?php

namespace Database\Seeders;

use App\Models\Species;
use Illuminate\Database\Seeder;

class SpeciesSeeder extends Seeder
{
    public function run(): void
    {
        // Lista de especies
        $especies = [
            [
                'name' => 'Perro',
                'description' => 'Caninos domésticos',
            ],
            [
                'name' => 'Gato',
                'description' => 'Felinos domésticos',
            ],
            [
                'name' => 'Ave',
                'description' => 'Aves domésticas',
            ],
            [
                'name' => 'Conejo',
                'description' => 'Conejos domésticos',
            ],
            [
                'name' => 'Hámster',
                'description' => 'Roedores pequeños',
            ],
            [
                'name' => 'Pez',
                'description' => 'Peces ornamentales',
            ],
            [
                'name' => 'Tortuga',
                'description' => 'Quelonios domésticos',
            ],
        ];

        // Registrar o actualizar cada especie
        foreach ($especies as $especie) {
            Species::updateOrCreate(
                ['name' => $especie['name']],
                $especie
            );
        }
    }
}