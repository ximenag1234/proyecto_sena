<?php

namespace App\Filament\Resources\Species\Pages;

use App\Filament\Resources\Species\SpeciesResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSpecies extends EditRecord
{
    protected static string $resource = SpeciesResource::class;

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
            DeleteAction::make(),
        ];
    }
}