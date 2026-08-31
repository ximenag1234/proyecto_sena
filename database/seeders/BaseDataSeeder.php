<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BaseDataSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            SpeciesSeeder::class,
            BreedSeeder::class,
            HealthConditionSeeder::class,
            MedicationSeeder::class,
            ToySeeder::class,
            BathRoutineSeeder::class,
            FeedingPlanSeeder::class,
            MedicationDoseSeeder::class,
            PetSeeder::class,
            ReminderSeeder::class,
            ActivitySeeder::class,
        ]);
    }
}
