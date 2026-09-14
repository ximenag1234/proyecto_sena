<?php

namespace App\Filament\Resources\Medications\Pages;

use App\Filament\Resources\Medications\MedicationResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMedication extends CreateRecord
{
    protected static string $resource = MedicationResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }
}