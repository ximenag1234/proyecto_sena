<?php

namespace App\Filament\Resources\HealthConditions\Pages;

use App\Filament\Resources\HealthConditions\HealthConditionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateHealthCondition extends CreateRecord
{
    protected static string $resource = HealthConditionResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }
}