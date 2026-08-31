<?php

namespace Database\Seeders;

use App\Models\Breed;
use App\Models\Pet;
use Illuminate\Database\Seeder;

class PetSeeder extends Seeder
{
    public function run(): void
    {
        $mascotas = [
            [
                'name' => 'Max',
                'species' => 'Perro',
                'birth_date' => '2020-03-15',
                'weight' => 25.5,
                'user_id' => 1,
                'breed' => 'Labrador Retriever',
            ],
            [
                'name' => 'Luna',
                'species' => 'Gato',
                'birth_date' => '2021-07-10',
                'weight' => 4.2,
                'user_id' => 1,
                'breed' => 'Persa',
            ],
            [
                'name' => 'Rocky',
                'species' => 'Perro',
                'birth_date' => '2019-11-20',
                'weight' => 30.0,
                'user_id' => 2,
                'breed' => 'Pastor Alemán',
            ],
            [
                'name' => 'Milo',
                'species' => 'Gato',
                'birth_date' => '2022-01-05',
                'weight' => 3.8,
                'user_id' => 2,
                'breed' => 'Siamés',
            ],
            [
                'name' => 'Bella',
                'species' => 'Perro',
                'birth_date' => '2018-09-12',
                'weight' => 18.7,
                'user_id' => 5,
                'breed' => 'Golden Retriever',
            ],
            [
                'name' => 'Simba',
                'species' => 'Gato',
                'birth_date' => '2020-05-22',
                'weight' => 5.1,
                'user_id' => 3,
                'breed' => 'Persa',
            ],
            [
                'name' => 'Toby',
                'species' => 'Perro',
                'birth_date' => '2021-12-01',
                'weight' => 12.4,
                'user_id' => 4,
                'breed' => 'Labrador Retriever',
            ],
            [
                'name' => 'Nala',
                'species' => 'Gato',
                'birth_date' => '2019-04-18',
                'weight' => 4.6,
                'user_id' => 4,
                'breed' => 'Siamés',
            ],
            [
                'name' => 'Bruno',
                'species' => 'Perro',
                'birth_date' => '2023-02-14',
                'weight' => 8.9,
                'user_id' => 5,
                'breed' => 'Golden Retriever',
            ],
            [
                'name' => 'Coco',
                'species' => 'Perro',
                'birth_date' => '2022-08-30',
                'weight' => 6.3,
                'user_id' => 5,
                'breed' => 'Labrador Retriever',
            ],
        ];

        foreach ($mascotas as $mascota) {

            $breed = Breed::where('name', $mascota['breed'])
                ->where('species', $mascota['species'])
                ->firstOrFail();

            Pet::create([
                'name' => $mascota['name'],
                'species' => $mascota['species'],
                'birth_date' => $mascota['birth_date'],
                'weight' => $mascota['weight'],
                'user_id' => $mascota['user_id'],
                'breed_id' => $breed->id,
            ]);
        }
    }
}
