<?php

namespace App\Filament\Resources\Pets\Schemas;

use App\Models\Breed;
use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
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

                Select::make('species')
                    ->label('Especie')
                    ->options([
                        'perro' => 'Perro',
                        'gato' => 'Gato',
                        'ave' => 'Ave',
                        'conejo' => 'Conejo',
                        'hamster' => 'Hámster',
                        'otro' => 'Otro',
                    ])
                    ->searchable()
                    ->required(),

                DatePicker::make('birth_date')
                    ->label('Fecha de nacimiento'),

                TextInput::make('weight')
                    ->label('Peso')
                    ->numeric()
                    ->suffix('kg'),

                Select::make('user_id')
                    ->label('Usuario')
                    ->options(User::pluck('name', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('breed_id')
                    ->label('Raza')
                    ->options(Breed::pluck('name', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }
}