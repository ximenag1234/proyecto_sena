<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Crear o actualizar el usuario administrador
        User::updateOrCreate(
            ['email' => 'admin@test.com'],
            [
                'name' => 'Administrador',
                'password' => bcrypt('123456789'),
            ]
        );

        // Crear o actualizar el usuario de PetSchool
        User::updateOrCreate(
            ['email' => 'pet@gmail.com'],
            [
                'name' => 'petschool',
                'password' => bcrypt('123456789'),
            ]
        );

        // Crear 10 usuarios de prueba utilizando la fábrica
        User::factory(10)->create();
    }
}