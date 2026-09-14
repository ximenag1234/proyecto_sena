<?php

namespace App\Filament\Resources\Species\Pages;

use App\Filament\Resources\Species\SpeciesResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSpecies extends CreateRecord
{
    protected static string $resource = SpeciesResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }
}