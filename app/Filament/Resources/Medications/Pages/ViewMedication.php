<?php

namespace App\Filament\Resources\Medications\Pages;

use App\Filament\Resources\Medications\MedicationResource;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewMedication extends ViewRecord
{
    protected static string $resource = MedicationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()
                ->label('Editar'),

            Action::make('ok')
                ->label('OK')
                ->icon('heroicon-m-check')
                ->color('success')
                ->action(function () {
                    $this->redirect(
                        MedicationResource::getUrl('index')
                    );
                }),
        ];
    }
}