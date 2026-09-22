<?php

namespace App\Filament\Resources\Toys\Pages;

use App\Filament\Resources\Toys\ToyResource;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewToy extends ViewRecord
{
    protected static string $resource = ToyResource::class;

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
                        ToyResource::getUrl('index')
                    );
                }),
        ];
    }
}