<?php

namespace App\Filament\Resources\Breeds\Pages;

use App\Filament\Resources\Breeds\BreedResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditBreed extends EditRecord
{
    protected static string $resource = BreedResource::class;

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