<?php

namespace App\Filament\Resources\HealthConditions\Pages;

use App\Filament\Resources\HealthConditions\HealthConditionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewHealthCondition extends ViewRecord
{
    protected static string $resource = HealthConditionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
