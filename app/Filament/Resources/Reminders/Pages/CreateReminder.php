<?php

namespace App\Filament\Resources\Reminders\Pages;

use App\Filament\Resources\Reminders\ReminderResource;
use App\Models\Pet;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Validation\ValidationException;

class CreateReminder extends CreateRecord
{
    protected static string $resource = ReminderResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // El administrador puede crear recordatorios
        // para cualquier mascota.
        if (auth()->user()->hasRole('admin')) {
            return $data;
        }

        // Verificar que la mascota pertenezca al usuario.
        $petBelongsToUser = Pet::query()
            ->where('id', $data['pet_id'] ?? null)
            ->where('user_id', auth()->id())
            ->exists();

        if (! $petBelongsToUser) {
            throw ValidationException::withMessages([
                'pet_id' => 'No puedes crear un recordatorio para una mascota que no te pertenece.',
            ]);
        }

        return $data;
    }
}