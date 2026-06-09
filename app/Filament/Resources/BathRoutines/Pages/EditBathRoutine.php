<?php

namespace App\Filament\Resources\BathRoutines\Pages;

use App\Filament\Resources\BathRoutines\BathRoutineResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditBathRoutine extends EditRecord
{
    protected static string $resource = BathRoutineResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
