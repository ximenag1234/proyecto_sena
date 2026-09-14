<?php

namespace App\Filament\Resources\Pets\Pages;

use App\Filament\Resources\Pets\PetResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPet extends EditRecord
{
    protected static string $resource = PetResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // El usuario normal no puede cambiar el propietario.
        if (! auth()->user()->hasRole('admin')) {
            $data['user_id'] = $this->record->user_id;
        }

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),

            DeleteAction::make(),
        ];
    }
}