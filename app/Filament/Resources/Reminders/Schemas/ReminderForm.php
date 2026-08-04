<?php

namespace App\Filament\Resources\Reminders\Schemas;

use App\Models\Pet;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ReminderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('type')
                    ->label('Tipo')
                    ->required(),

                DateTimePicker::make('date_time')
                    ->label('Fecha y hora')
                    ->required(),

                TextInput::make('status')
                    ->label('Estado')
                    ->required(),

                Select::make('pet_id')
                    ->label('Mascota')
                    ->options(Pet::pluck('name', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }
}