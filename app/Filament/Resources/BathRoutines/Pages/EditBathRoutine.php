<?php

namespace App\Filament\Resources\BathRoutines\Pages;

use App\Filament\Resources\BathRoutines\BathRoutineResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditBathRoutine extends EditRecord
{
    protected static string $resource = BathRoutineResource::class;

    public function mount(int|string $record): void
    {
        abort_unless(
            auth()->check() && auth()->user()->hasRole('admin'),
            403
        );

        parent::mount($record);
    }

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}