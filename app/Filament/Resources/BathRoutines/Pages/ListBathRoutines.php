<?php

namespace App\Filament\Resources\BathRoutines\Pages;

use App\Filament\Resources\BathRoutines\BathRoutineResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBathRoutines extends ListRecords
{
    protected static string $resource = BathRoutineResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
