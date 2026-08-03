<?php

namespace Database\Seeders;

use App\Models\Pet;
use App\Models\Reminder;
use Illuminate\Database\Seeder;

class ReminderSeeder extends Seeder
{
    public function run(): void
    {
        // Recorrer todas las mascotas
        foreach (Pet::all() as $mascota) {

            // Crear un recordatorio para cada mascota
            Reminder::create([
                'type' => 'Vacuna',
                'date_time' => now()->addWeek(),
                'status' => 'Pendiente',
                'pet_id' => $mascota->id,
            ]);
        }
    }
}