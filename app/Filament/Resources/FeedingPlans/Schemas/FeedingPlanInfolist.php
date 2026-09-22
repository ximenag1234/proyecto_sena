<?php

namespace App\Filament\Resources\FeedingPlans\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FeedingPlanInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Información de alimentación')
                    ->description('Información registrada del plan de alimentación.')
                    ->icon('heroicon-o-cake')
                    ->iconColor('success')
                    ->columns(2)
                    ->schema([

                        TextEntry::make('food_type')
                            ->label('Tipo de comida')
                            ->formatStateUsing(fn ($state) => match ($state) {
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
                                default => $state ?? 'Sin registrar',
                            }),

                        TextEntry::make('amount')
                            ->label('Cantidad de alimento')
                            ->suffix(' g')
                            ->placeholder('Sin registrar'),

                        TextEntry::make('frequency')
                            ->label('Frecuencia')
                            ->placeholder('Sin registrar'),

                        TextEntry::make('breed.name')
                            ->label('Raza')
                            ->icon('heroicon-m-tag')
                            ->placeholder('Sin raza'),

                    ]),

                Section::make('Rango de edad')
                    ->description('Edad recomendada para este plan.')
                    ->icon('heroicon-o-calendar')
                    ->iconColor('warning')
                    ->columns(2)
                    ->schema([

                        TextEntry::make('age_min')
                            ->label('Edad mínima')
                            ->suffix(' años')
                            ->placeholder('Sin registrar'),

                        TextEntry::make('age_max')
                            ->label('Edad máxima')
                            ->suffix(' años')
                            ->placeholder('Sin registrar'),

                    ]),

                Section::make('Rango de peso')
                    ->description('Peso recomendado para este plan.')
                    ->icon('heroicon-o-scale')
                    ->iconColor('primary')
                    ->columns(2)
                    ->schema([

                        TextEntry::make('weight_min')
                            ->label('Peso mínimo')
                            ->suffix(' kg')
                            ->placeholder('Sin registrar'),

                        TextEntry::make('weight_max')
                            ->label('Peso máximo')
                            ->suffix(' kg')
                            ->placeholder('Sin registrar'),

                    ]),

                Section::make('Información del registro')
                    ->icon('heroicon-o-information-circle')
                    ->iconColor('gray')
                    ->columns(2)
                    ->schema([

                        TextEntry::make('created_at')
                            ->label('Fecha de creación')
                            ->dateTime('d/m/Y H:i')
                            ->placeholder('Sin registrar'),

                        TextEntry::make('updated_at')
                            ->label('Última actualización')
                            ->dateTime('d/m/Y H:i')
                            ->placeholder('Sin registrar'),

                    ]),
            ]);
    }
}