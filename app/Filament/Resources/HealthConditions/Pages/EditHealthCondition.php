<?php

namespace App\Filament\Resources\HealthConditions\Pages;

use App\Filament\Resources\HealthConditions\HealthConditionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditHealthCondition extends EditRecord
{
    protected static string $resource = HealthConditionResource::class;

    protected ?int $petId = null;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['pet_id'] = $this->record->pets()->first()?->id;

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->petId = $data['pet_id'] ?? null;

        unset($data['pet_id']);

        return $data;
    }

    protected function afterSave(): void
    {
        if ($this->petId) {
            $this->record->pets()->sync([
                $this->petId,
            ]);
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}