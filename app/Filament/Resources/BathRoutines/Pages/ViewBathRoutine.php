<?php

namespace App\Filament\Resources\BathRoutines\Pages;

use App\Filament\Resources\BathRoutines\BathRoutineResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewBathRoutine extends ViewRecord
{
    protected static string $resource = BathRoutineResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
