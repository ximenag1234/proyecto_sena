<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Pet;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    public function run(): void
    {
        $activities = [
            [
                'type' => 'Paseo',
                'description' => 'Paseo diario por el parque o zona recreativa',
            ],
            [
                'type' => 'Baño',
                'description' => 'Baño, limpieza e higiene general de la mascota',
            ],
            [
                'type' => 'Alimentación',
                'description' => 'Registro de comida y alimentación diaria',
            ],
            [
                'type' => 'Veterinario',
                'description' => 'Consulta veterinaria y control preventivo',
            ],
            [
                'type' => 'Juego',
                'description' => 'Tiempo de juego, diversión y actividad física',
            ],
        ];

        Pet::all()->each(function (Pet $pet) use ($activities) {

            foreach ($activities as $activity) {

                Activity::create([
                    'type' => $activity['type'],
                    'date_time' => now()->subDays(rand(0, 30)),
                    'description' => $activity['description'],
                    'pet_id' => $pet->id,
                ]);

            }

        });
    }
}