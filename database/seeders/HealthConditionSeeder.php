<?php

namespace Database\Seeders;

use App\Models\HealthCondition;
use Illuminate\Database\Seeder;

class HealthConditionSeeder extends Seeder
{
    public function run(): void
    {
        $conditions = [
            [
                'name' => 'Obesidad',
                'description' => 'Exceso de peso que puede afectar la salud y movilidad de la mascota',
            ],
            [
                'name' => 'Diabetes',
                'description' => 'Alteración metabólica que afecta los niveles de glucosa en sangre',
            ],
            [
                'name' => 'Artritis',
                'description' => 'Inflamación de las articulaciones que puede causar dolor y dificultad de movimiento',
            ],
            [
                'name' => 'Otitis',
                'description' => 'Inflamación o infección del oído que requiere atención veterinaria',
            ],
            [
                'name' => 'Alergias',
                'description' => 'Reacción del sistema inmunológico ante ciertos alimentos o factores ambientales',
            ],
        ];

        foreach ($conditions as $condition) {

            HealthCondition::updateOrCreate(
                [
                    'name' => $condition['name'],
                ],
                [
                    'description' => $condition['description'],
                ]
            );

        }
    }
}