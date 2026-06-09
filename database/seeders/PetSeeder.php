<?php

namespace Database\Seeders;

use App\Models\Pet;
use Illuminate\Database\Seeder;

class PetSeeder extends Seeder
{
    public function run(): void
    {
        $pets = [
            [
                'name' => 'Max',
                'species' => 'Perro',
                'birth_date' => '2020-03-15',
                'weight' => 25.5,
                'user_id' => 1,
                'breed_id' => 1,
            ],
            [
                'name' => 'Luna',
                'species' => 'Gato',
                'birth_date' => '2021-07-10',
                'weight' => 4.2,
                'user_id' => 1,
                'breed_id' => 2,
            ],
            [
                'name' => 'Rocky',
                'species' => 'Perro',
                'birth_date' => '2019-11-20',
                'weight' => 30.0,
                'user_id' => 2,
                'breed_id' => 3,
            ],
            [
                'name' => 'Milo',
                'species' => 'Gato',
                'birth_date' => '2022-01-05',
                'weight' => 3.8,
                'user_id' => 2,
                'breed_id' => 4,
            ],
            [
                'name' => 'Bella',
                'species' => 'Perro',
                'birth_date' => '2018-09-12',
                'weight' => 18.7,
                'user_id' => 3,
                'breed_id' => 5,
            ],
            [
                'name' => 'Simba',
                'species' => 'Gato',
                'birth_date' => '2020-05-22',
                'weight' => 5.1,
                'user_id' => 3,
                'breed_id' => 6,
            ],
            [
                'name' => 'Toby',
                'species' => 'Perro',
                'birth_date' => '2021-12-01',
                'weight' => 12.4,
                'user_id' => 4,
                'breed_id' => 7,
            ],
            [
                'name' => 'Nala',
                'species' => 'Gato',
                'birth_date' => '2019-04-18',
                'weight' => 4.6,
                'user_id' => 4,
                'breed_id' => 8,
            ],
            [
                'name' => 'Bruno',
                'species' => 'Perro',
                'birth_date' => '2023-02-14',
                'weight' => 8.9,
                'user_id' => 5,
                'breed_id' => 9,
            ],
            [
                'name' => 'Coco',
                'species' => 'Perro',
                'birth_date' => '2022-08-30',
                'weight' => 6.3,
                'user_id' => 5,
                'breed_id' => 10,
            ],
        ];

        foreach ($pets as $pet) {
            Pet::create($pet);
        }
    }
}