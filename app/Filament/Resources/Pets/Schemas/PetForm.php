<?php

namespace App\Filament\Resources\Pets\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PetForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nombre')
                    ->required(),
                TextInput::make('species')
                    ->label('Especie')
                    ->required(),
                DatePicker::make('birth_date'),
                TextInput::make('weight')
                    ->label('Peso')
                    ->numeric(),
                TextInput::make('user_id')
                    ->label('Usuario_id')
                    ->required()
                    ->numeric(),
                TextInput::make('breed_id')
                    ->label('Raza_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
