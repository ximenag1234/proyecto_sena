<?php

namespace Database\Seeders;

use App\Models\Breed;
use App\Models\Medication;
use App\Models\MedicationDose;
use Illuminate\Database\Seeder;

class MedicationDoseSeeder extends Seeder
{
    public function run(): void
    {
        // Obtener el primer medicamento registrado
        $medicamento = Medication::first();

        // Si no existe ningún medicamento, terminar el seeder
        if ($medicamento === null) {
            return;
        }

        // Recorrer todas las razas
        foreach (Breed::all() as $raza) {

            MedicationDose::updateOrCreate(
                [
                    'medication_id' => $medicamento->id,
                    'breed_id' => $raza->id,
                ],
                [
                    'amount' => '5 ml',
                    'frequency' => 'Cada 12 horas',
                    'age_min' => 1,
                    'age_max' => 20,
                    'weight_min' => 1,
                    'weight_max' => 60,
                ]
            );
        }
    }
}