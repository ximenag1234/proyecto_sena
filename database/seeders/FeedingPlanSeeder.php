<?php

namespace Database\Seeders;

use App\Models\Breed;
use App\Models\FeedingPlan;
use Illuminate\Database\Seeder;

class FeedingPlanSeeder extends Seeder
{
    public function run(): void
    {
        foreach (Breed::all() as $breed) {

            FeedingPlan::create([
                'food_type' => 'Alimento concentrado premium',
                'amount' => '300 gramos',
                'frequency' => '2 veces al día',
                'age_min' => 1,
                'age_max' => 20,
                'weight_min' => 1,
                'weight_max' => 80,
                'breed_id' => $breed->id,
            ]);

        }
    }
}