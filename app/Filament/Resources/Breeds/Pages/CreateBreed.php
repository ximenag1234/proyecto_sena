<?php

namespace App\Filament\Resources\Breeds\Pages;

use App\Filament\Resources\Breeds\BreedResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBreed extends CreateRecord
{
    protected static string $resource = BreedResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }
}