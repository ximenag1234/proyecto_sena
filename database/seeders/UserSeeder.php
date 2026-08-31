<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Crear el rol de Super Admin si no existe
        Role::firstOrCreate([
            'name' => 'super_admin',
            'guard_name' => 'web',
        ]);

        // Crear administrador
        $admin = User::updateOrCreate(
            ['email' => 'admin@test.com'],
            [
                'name' => 'Administrador',
                'password' => '123456789',
            ]
        );

        // Asignar Super Admin
        $admin->assignRole('super_admin');

        // Crear usuario de PetSchool
        User::updateOrCreate(
            ['email' => 'pet@gmail.com'],
            [
                'name' => 'petschool',
                'password' => '123456789',
            ]
        );

        // Crear usuarios de prueba
        User::factory(10)->create();
    }
}
