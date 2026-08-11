<?php

namespace App\Filament\Resources\BathRoutines\Schemas;

use App\Models\Breed;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BathRoutineForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // ==========================================
                // INFORMACIÓN DE LA RUTINA DE BAÑO
                // ==========================================

                Section::make('Rutina de baño')
                    ->description(
                        'Configura la frecuencia de baño recomendada según la raza y la edad.'
                    )
                    ->icon('heroicon-o-sparkles')
                    ->iconColor('info')
                    ->columns(2)
                    ->schema([

                        TextInput::make('frequency')
                            ->label('Frecuencia')
                            ->placeholder('Ej: Cada 15 días')
                            ->prefixIcon('heroicon-o-arrow-path')
                            ->required()
                            ->maxLength(100)
                            ->helperText(
                                'Indica cada cuánto se recomienda realizar el baño.'
                            ),

                        Select::make('breed_id')
                            ->label('Raza')
                            ->placeholder('Selecciona una raza')
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
                                'Selecciona la raza a la que corresponde esta rutina.'
                            ),

                    ]),

                // ==========================================
                // RANGO DE EDAD
                // ==========================================

                Section::make('Rango de edad')
                    ->description(
                        'Define el rango de edad para el que aplica esta rutina de baño.'
                    )
                    ->icon('heroicon-o-calendar')
                    ->iconColor('primary')
                    ->columns(2)
                    ->schema([

                        TextInput::make('age_min')
                            ->label('Edad mínima')
                            ->placeholder('Ej: 1')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(100)
                            ->suffix('años')
                            ->prefixIcon('heroicon-o-chevron-double-right')
                            ->helperText(
                                'Edad mínima recomendada para esta rutina.'
                            ),

                        TextInput::make('age_max')
                            ->label('Edad máxima')
                            ->placeholder('Ej: 10')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(100)
                            ->suffix('años')
                            ->prefixIcon('heroicon-o-chevron-double-right')
                            ->helperText(
                                'Edad máxima recomendada para esta rutina.'
                            ),

                    ]),
            ]);
    }
}
