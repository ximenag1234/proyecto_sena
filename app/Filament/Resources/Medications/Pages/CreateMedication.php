<?php

namespace App\Filament\Resources\Medications\Pages;

use App\Filament\Resources\Medications\MedicationResource;
use App\Models\Pet;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Validation\ValidationException;

class CreateMedication extends CreateRecord
{
    protected static string $resource = MedicationResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (auth()->user()->hasRole('admin')) {
            return $data;
        }

        $petBelongsToUser = Pet::query()
            ->where('id', $data['pet_id'] ?? null)
            ->where('user_id', auth()->id())
            ->exists();

        if (! $petBelongsToUser) {
            throw ValidationException::withMessages([
                'pet_id' => 'No puedes asignar un medicamento a una mascota que no te pertenece.',
            ]);
        }

        $data['user_id'] = auth()->id();

        return $data;
    }
}