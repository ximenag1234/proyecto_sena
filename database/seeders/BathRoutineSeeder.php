<?php

namespace Database\Seeders;

use App\Models\BathRoutine;
use App\Models\Breed;
use Illuminate\Database\Seeder;

class BathRoutineSeeder extends Seeder
{
    public function run(): void
    {
        foreach (Breed::all() as $breed) {

            $frequency = match (true) {

                str_contains(strtolower($breed->name), 'caniche') => 'Cada 15 días',

                str_contains(strtolower($breed->name), 'persa') => 'Cada 20 días',

                str_contains(strtolower($breed->name), 'labrador') => 'Cada 30 días',

                default => 'Cada 30 días',

            };

            BathRoutine::updateOrCreate(
                [
                    'breed_id' => $breed->id,
                ],
                [
                    'frequency' => $frequency,
                    'age_min' => 0,
                    'age_max' => 20,
                ]
            );

        }
    }
}