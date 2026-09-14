<?php

namespace App\Filament\Resources\Reminders\Pages;

use App\Filament\Resources\Reminders\ReminderResource;
use App\Models\Pet;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Validation\ValidationException;

class EditReminder extends EditRecord
{
    protected static string $resource = ReminderResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // El administrador puede editar recordatorios
        // de cualquier mascota.
        if (auth()->user()->hasRole('admin')) {
            return $data;
        }

        // Verificar que la mascota seleccionada pertenezca
        // al usuario autenticado.
        $petBelongsToUser = Pet::query()
            ->where('id', $data['pet_id'] ?? null)
            ->where('user_id', auth()->id())
            ->exists();

        if (! $petBelongsToUser) {
            throw ValidationException::withMessages([
                'pet_id' => 'No puedes asignar este recordatorio a una mascota que no te pertenece.',
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