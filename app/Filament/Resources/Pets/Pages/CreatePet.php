<?php

namespace App\Filament\Resources\Pets\Pages;

use App\Filament\Resources\Pets\PetResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePet extends CreateRecord
{
    protected static string $resource = PetResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // El usuario normal solo puede crear mascotas para sí mismo.
        if (! auth()->user()->hasRole('admin')) {
            $data['user_id'] = auth()->id();
        }

        return $data;
    }
}