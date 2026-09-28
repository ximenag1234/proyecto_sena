<?php

namespace App\Filament\Resources\HealthConditions\Pages;

use App\Filament\Resources\HealthConditions\HealthConditionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateHealthCondition extends CreateRecord
{
    protected static string $resource = HealthConditionResource::class;

    protected ?int $petId = null;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Guardamos temporalmente la mascota seleccionada
        $this->petId = isset($data['pet_id'])
            ? (int) $data['pet_id']
            : null;

        // pet_id NO pertenece a health_conditions
        unset($data['pet_id']);

        // La condición pertenece al usuario que la crea
        $data['user_id'] = auth()->id();

        return $data;
    }

    protected function afterCreate(): void
    {
        // Guardar la relación en pet_health_condition
        if ($this->petId !== null) {
            $this->record->pets()->sync([
                $this->petId,
            ]);
        }
    }

    protected function getRedirectUrl(): string
    {
        // Después de guardar, regresar al listado
        return HealthConditionResource::getUrl('index');
    }
}