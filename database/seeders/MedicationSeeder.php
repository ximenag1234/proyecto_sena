<?php

namespace Database\Seeders;

use App\Models\Medication;
use Illuminate\Database\Seeder;

class MedicationSeeder extends Seeder
{
    public function run(): void
    {
        // Lista de medicamentos
        foreach ([
            'Amoxicilina',
            'Carprofeno',
            'Meloxicam',
            'Prednisolona'
        ] as $medicamento) {

            Medication::updateOrCreate(
                [
                    'name' => $medicamento
                ],
                [
                    'description' => $medicamento
                ]
            );
        }
    }
}