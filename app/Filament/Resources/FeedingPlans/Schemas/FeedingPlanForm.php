<?php

namespace App\Filament\Resources\FeedingPlans\Schemas;

use App\Models\Breed;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FeedingPlanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // ==========================================
                // INFORMACIÓN DE ALIMENTACIÓN
                // ==========================================

                Section::make('Plan de alimentación')
                    ->description(
                        'Configura el tipo de alimento, cantidad y frecuencia recomendada.'
                    )
                    ->icon('heroicon-o-cake')
                    ->iconColor('success')
                    ->columns(2)
                    ->schema([

                        Select::make('food_type')
                            ->label('Tipo de comida')
                            ->placeholder('Selecciona el tipo de alimento')
                            ->options([
                                'alimento_seco' => '🥣 Alimento seco',
                                'alimento_humedo' => '🥫 Alimento húmedo',
                                'alimento_semihumedo' => '🍖 Alimento semihúmedo',
                                'dieta_casera' => '🏠 Dieta casera',
                                'dieta_barf' => '🥩 Dieta BARF',
                                'dieta_medicada' => '💊 Dieta medicada o terapéutica',
                                'snacks_premios' => '🦴 Snacks y premios',
                                'suplementos_nutricionales' => '💊 Suplementos nutricionales',
                                'leche_maternizada' => '🍼 Leche maternizada',
                                'dietas_especiales' => '🥗 Dietas especiales',
                            ])
                            ->prefixIcon('heroicon-o-sparkles')
                            ->searchable()
                            ->native(false)
                            ->required()
                            ->helperText(
                                'Selecciona el tipo de alimentación recomendado.'
                            ),

                        Select::make('amount')
                            ->label('Cantidad de alimento')
                            ->placeholder('Selecciona una cantidad')
                            ->options([
                                50 => '50 g',
                                100 => '100 g',
                                150 => '150 g',
                                200 => '200 g',
                                250 => '250 g',
                                300 => '300 g',
                                400 => '400 g',
                                500 => '500 g',
                            ])
                            ->prefixIcon('heroicon-o-scale')
                            ->searchable()
                            ->native(false)
                            ->required()
                            ->helperText(
                                'Cantidad recomendada de alimento por ración.'
                            ),

                        TextInput::make('frequency')
                            ->label('Frecuencia')
                            ->placeholder('Ej: 2 veces al día')
                            ->prefixIcon('heroicon-o-clock')
                            ->required()
                            ->maxLength(100)
                            ->helperText(
                                'Indica cuántas veces debe alimentarse la mascota.'
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
                                'Selecciona la raza a la que corresponde este plan.'
                            ),

                    ]),

                // ==========================================
                // RANGO DE EDAD
                // ==========================================

                Section::make('Rango de edad')
                    ->description(
                        'Define el rango de edad para el cual se recomienda este plan.'
                    )
                    ->icon('heroicon-o-calendar')
                    ->iconColor('warning')
                    ->columns(2)
                    ->schema([

                        TextInput::make('age_min')
                            ->label('Edad mínima')
                            ->placeholder('Ej: 1')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(30)
                            ->prefixIcon('heroicon-o-arrow-down')
                            ->suffix('años')
                            ->helperText(
                                'Edad mínima recomendada.'
                            ),

                        TextInput::make('age_max')
                            ->label('Edad máxima')
                            ->placeholder('Ej: 10')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(30)
                            ->prefixIcon('heroicon-o-arrow-up')
                            ->suffix('años')
                            ->helperText(
                                'Edad máxima recomendada.'
                            ),

                    ]),

                // ==========================================
                // RANGO DE PESO
                // ==========================================

                Section::make('Rango de peso')
                    ->description(
                        'Define el rango de peso de las mascotas para este plan alimenticio.'
                    )
                    ->icon('heroicon-o-scale')
                    ->iconColor('primary')
                    ->columns(2)
                    ->schema([

                        TextInput::make('weight_min')
                            ->label('Peso mínimo')
                            ->placeholder('Ej: 2.5')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(500)
                            ->step(0.1)
                            ->prefixIcon('heroicon-o-arrow-down')
                            ->suffix('kg')
                            ->helperText(
                                'Peso mínimo recomendado para este plan.'
                            ),

                        TextInput::make('weight_max')
                            ->label('Peso máximo')
                            ->placeholder('Ej: 15')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(500)
                            ->step(0.1)
                            ->prefixIcon('heroicon-o-arrow-up')
                            ->suffix('kg')
                            ->helperText(
                                'Peso máximo recomendado para este plan.'
                            ),

                    ]),
            ]);
    }
}