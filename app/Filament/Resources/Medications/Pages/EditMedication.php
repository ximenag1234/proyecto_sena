<?php

namespace App\Filament\Resources\Medications\Pages;

use App\Filament\Resources\Medications\MedicationResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditMedication extends EditRecord
{
    protected static string $resource = MedicationResource::class;

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