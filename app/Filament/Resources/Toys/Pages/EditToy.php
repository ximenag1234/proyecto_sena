<?php

namespace App\Filament\Resources\Toys\Pages;

use App\Filament\Resources\Toys\ToyResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditToy extends EditRecord
{
    protected static string $resource = ToyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
