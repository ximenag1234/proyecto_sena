<?php

namespace App\Filament\Resources\HealthConditions\Pages;

use App\Filament\Resources\HealthConditions\HealthConditionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHealthConditions extends ListRecords
{
    protected static string $resource = HealthConditionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
