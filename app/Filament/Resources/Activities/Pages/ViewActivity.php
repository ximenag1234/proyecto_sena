<?php

namespace App\Filament\Resources\Activities\Pages;

use App\Filament\Resources\Activities\ActivityResource;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewActivity extends ViewRecord
{
    protected static string $resource = ActivityResource::class;

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
                        ActivityResource::getUrl('index')
                    );
                }),
        ];
    }
}