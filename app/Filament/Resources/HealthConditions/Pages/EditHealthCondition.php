<?php

namespace App\Filament\Resources\HealthConditions\Pages;

use App\Filament\Resources\HealthConditions\HealthConditionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditHealthCondition extends EditRecord
{
    protected static string $resource = HealthConditionResource::class;

    public function mount(int|string $record): void
    {
        abort_unless(
            auth()->check() && auth()->user()->hasRole('admin'),
            403
        );

        parent::mount($record);
    }

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}