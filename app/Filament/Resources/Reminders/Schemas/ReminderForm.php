<?php

namespace App\Filament\Resources\Reminders\Schemas;

use Filament\Forms\Components\DateTimePicker;
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
                    ->label('Feacha_tiempo')
                    ->required(),
                TextInput::make('status')
                    ->label('Estrato')
                    ->required(),
                TextInput::make('pet_id')
                    ->label('Mascota_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
