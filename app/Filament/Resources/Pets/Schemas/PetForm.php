<?php

namespace App\Filament\Resources\Pets\Schemas;

use App\Models\Breed;
use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PetForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // ==========================================
                // INFORMACIÓN BÁSICA DE LA MASCOTA
                // ==========================================

                Section::make('Información de la mascota')
                    ->description('Registra los datos principales de tu mascota.')
                    ->icon('heroicon-o-heart')
                    ->iconColor('danger')
                    ->columns(2)
                    ->schema([

                        TextInput::make('name')
                            ->label('Nombre')
                            ->placeholder('Ej: Max, Luna, Toby...')
                            ->prefixIcon('heroicon-o-heart')
                            ->required()
                            ->maxLength(100)
                            ->autofocus(),

                        Select::make('species')
                            ->label('Especie')
                            ->placeholder('Selecciona una especie')
                            ->options([
                                'perro' => '🐶 Perro',
                                'gato' => '🐱 Gato',
                                'ave' => '🐦 Ave',
                                'conejo' => '🐰 Conejo',
                                'hamster' => '🐹 Hámster',
                                'otro' => '🐾 Otro',
                            ])
                            ->prefixIcon('heroicon-o-sparkles')
                            ->searchable()
                            ->native(false)
                            ->required(),

                        DatePicker::make('birth_date')
                            ->label('Fecha de nacimiento')
                            ->placeholder('Selecciona la fecha')
                            ->prefixIcon('heroicon-o-calendar')
                            ->native(false)
                            ->maxDate(now())
                            ->displayFormat('d/m/Y')
                            ->helperText(
                                'Si no conoces la fecha exacta, puedes aproximarla.'
                            ),

                        TextInput::make('weight')
                            ->label('Peso')
                            ->placeholder('Ej: 12.5')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(500)
                            ->step(0.1)
                            ->suffix('kg')
                            ->prefixIcon('heroicon-o-scale')
                            ->helperText(
                                'Ingresa el peso actual de la mascota.'
                            ),

                    ]),

                // ==========================================
                // PROPIETARIO Y RAZA
                // ==========================================

                Section::make('Propietario y características')
                    ->description(
                        'Relaciona la mascota con su propietario y su raza.'
                    )
                    ->icon('heroicon-o-identification')
                    ->iconColor('primary')
                    ->columns(2)
                    ->schema([

                        Select::make('user_id')
                            ->label('Propietario')
                            ->placeholder('Selecciona el propietario')
                            ->options(
                                User::query()
                                    ->orderBy('name')
                                    ->pluck('name', 'id')
                            )
                            ->prefixIcon('heroicon-o-user')
                            ->searchable()
                            ->preload()
                            ->native(false)
                            ->required()
                            ->helperText(
                                'Persona responsable de la mascota.'
                            ),

                        Select::make('breed_id')
                            ->label('Raza')
                            ->placeholder('Selecciona la raza')
                            ->options(
                                Breed::query()
                                    ->orderBy('name')
                                    ->pluck('name', 'id')
                            )
                            ->prefixIcon('heroicon-o-tag')
                            ->searchable()
                            ->preload()
                            ->native(false)
                            ->required()
                            ->helperText(
                                'Selecciona la raza correspondiente.'
                            ),

                    ]),
            ]);
    }
}
