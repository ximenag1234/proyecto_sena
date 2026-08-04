<?php

namespace App\Filament\Resources\BathRoutines\Schemas;

use App\Models\Breed;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BathRoutineForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('frequency')
                    ->label('Frecuencia')
                    ->required(),

                TextInput::make('age_min')
                    ->label('Edad_minima')
                    ->numeric(),

                TextInput::make('age_max')
                    ->label('Edad_maxima')
                    ->numeric(),

                Select::make('breed_id')
                    ->label('Raza')
                    ->options(Breed::pluck('name', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }
}