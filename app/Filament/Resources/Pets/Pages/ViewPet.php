<?php

namespace App\Filament\Resources\Pets\Pages;

use App\Filament\Resources\Pets\PetResource;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPet extends ViewRecord
{
    protected static string $resource = PetResource::class;

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
                        PetResource::getUrl('index')
                    );
                }),
        ];
    }
}