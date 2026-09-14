<?php

namespace App\Filament\Resources\Activities\Pages;

use App\Filament\Resources\Activities\ActivityResource;
use App\Models\Pet;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Validation\ValidationException;

class EditActivity extends EditRecord
{
    protected static string $resource = ActivityResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // El administrador puede editar actividades de cualquier mascota.
        if (auth()->user()->hasRole('admin')) {
            return $data;
        }

        // Verificar que la mascota seleccionada pertenezca
        // al usuario que inició sesión.
        $petBelongsToUser = Pet::query()
            ->where('id', $data['pet_id'] ?? null)
            ->where('user_id', auth()->id())
            ->exists();

        if (! $petBelongsToUser) {
            throw ValidationException::withMessages([
                'pet_id' => 'No puedes asignar esta actividad a una mascota que no te pertenece.',
            ]);
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