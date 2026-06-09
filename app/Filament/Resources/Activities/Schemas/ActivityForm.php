<?php

namespace App\Filament\Resources\Activities\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class ActivityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('type')
    ->label('Tipo')
    ->options([
        'Juego' => 'Juego',
        'Paseo' => 'Paseo',
        'Entrenamiento' => 'Entrenamiento',
        'Ejercicio' => 'Ejercicio',
        'Socialización' => 'Socialización',
        'Descanso' => 'Descanso',
        'Alimentación' => 'Alimentación',
        'Higiene y Aseo' => 'Higiene y Aseo',
        'Caza e Instinto' => 'Caza e Instinto',
        'Masticación' => 'Masticación',
        'Exploración' => 'Exploración',
        'Estimulación Mental' => 'Estimulación Mental',
        'Agilidad' => 'Agilidad',
        'Natación' => 'Natación',
        'Búsqueda y Rastreo' => 'Búsqueda y Rastreo',
        'Tirar y Aflojar' => 'Tirar y Aflojar',
        'Lanzar y Recoger' => 'Lanzar y Recoger',
        'Escalada' => 'Escalada',
        'Observación y Vigilancia' => 'Observación y Vigilancia',
        'Transporte y Viaje' => 'Transporte y Viaje',
    ])
    ->searchable()
    ->required(),
                DateTimePicker::make('date_time')
                    ->label('Fecha_hora')
                    ->required(),
                Textarea::make('description')
                    ->label('Descripcion')
                    ->columnSpanFull(),
                Select::make('pet_id')
    ->label('Mascota')
    ->relationship('pet', 'name')
    ->searchable()
    ->preload()
    ->required(),
            ]);
    }
}
