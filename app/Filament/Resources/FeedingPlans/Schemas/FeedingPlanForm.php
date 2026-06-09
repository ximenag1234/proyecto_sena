<?php

namespace App\Filament\Resources\FeedingPlans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;


class FeedingPlanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                select::make('food_type')
    ->label('Tipo de comida')
    ->options([
        'alimento_seco' => 'Alimento seco',
        'alimento_humedo' => 'Alimento húmedo',
        'alimento_semihumedo' => 'Alimento semihúmedo',
        'dieta_casera' => 'Dieta casera',
        'dieta_barf' => 'Dieta BARF',
        'dieta_medicada' => 'Dieta medicada o terapéutica',
        'snacks_premios' => 'Snacks y premios',
        'suplementos_nutricionales' => 'Suplementos nutricionales',
        'leche_maternizada' => 'Leche maternizada',
        'dietas_especiales' => 'Dietas especiales',
    ])
    ->required()
    ->searchable(),
                TextInput::make('amount')
                    ->label('Cantidad (g)')
                    ->numeric()
                    ->required()
                    ->suffix('g'),
                TextInput::make('frequency')
                    ->required(),
                TextInput::make('age_min')
                    ->numeric(),
                TextInput::make('age_max')
                    ->numeric(),
                TextInput::make('weight_min')
    ->label('Peso mínimo')
    ->numeric()
    ->suffix('kg'),
                TextInput::make('weight_max')
    ->label('Peso máximo')
    ->numeric()
    ->suffix('kg'),
                TextInput::make('breed_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
