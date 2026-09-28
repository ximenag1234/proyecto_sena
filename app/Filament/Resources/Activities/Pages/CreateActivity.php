<?php

namespace App\Filament\Resources\Activities\Pages;

use App\Filament\Resources\Activities\ActivityResource;
use App\Models\Pet;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Validation\ValidationException;

class CreateActivity extends CreateRecord
{
    protected static string $resource = ActivityResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // El administrador puede asignar la actividad
        // a cualquier mascota.
        if (auth()->user()->hasRole('admin')) {
            return $data;
        }

        // Verificar que la mascota seleccionada
        // pertenezca al usuario autenticado.
        $petBelongsToUser = Pet::query()
            ->where('id', $data['pet_id'] ?? null)
            ->where('user_id', auth()->id())
            ->exists();

        if (! $petBelongsToUser) {
            throw ValidationException::withMessages([
                'pet_id' => 'No puedes asignar una actividad a una mascota que no te pertenece.',
            ]);
        }

        return $data;
    }
}