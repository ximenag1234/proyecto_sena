<?php

namespace Database\Seeders;

use App\Models\Toy;
use Illuminate\Database\Seeder;

class ToySeeder extends Seeder
{
    public function run(): void
    {
        // Registrar o actualizar el juguete "Pelota"
        Toy::updateOrCreate(
            ['name' => 'Pelota'],
            [
                'type' => 'Mordedor',
                'description' => 'Pelota resistente',
            ]
        );

        // Registrar o actualizar el juguete "Cuerda"
        Toy::updateOrCreate(
            ['name' => 'Cuerda'],
            [
                'type' => 'Interactivo',
                'description' => 'Juego de fuerza',
            ]
        );

        // Registrar o actualizar el juguete "Ratón"
        Toy::updateOrCreate(
            ['name' => 'Ratón'],
            [
                'type' => 'Gato',
                'description' => 'Ratón de tela',
            ]
        );
    }
}