<?php

namespace App\Filament\Resources\Toys\Pages;

use App\Filament\Resources\Toys\ToyResource;
use Filament\Resources\Pages\CreateRecord;

class CreateToy extends CreateRecord
{
    protected static string $resource = ToyResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }
}