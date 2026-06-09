<?php

namespace App\Filament\Resources\Toys\Pages;

use App\Filament\Resources\Toys\ToyResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListToys extends ListRecords
{
    protected static string $resource = ToyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
