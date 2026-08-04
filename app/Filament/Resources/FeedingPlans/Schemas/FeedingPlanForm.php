<?php

namespace App\Filament\Resources\FeedingPlans\Schemas;

use App\Models\Breed;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class FeedingPlanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('food_type')
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

                Select::make('amount')
                    ->label('Cantidad de alimento (g)')
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
                    ->searchable()
                    ->required(),

                TextInput::make('frequency')
                    ->label('Frecuencia')
                    ->required(),

                TextInput::make('age_min')
                    ->label('Edad mínima')
                    ->numeric(),

                TextInput::make('age_max')
                    ->label('Edad máxima')
                    ->numeric(),

                TextInput::make('weight_min')
                    ->label('Peso mínimo')
                    ->numeric()
                    ->suffix('kg'),

                TextInput::make('weight_max')
                    ->label('Peso máximo')
                    ->numeric()
                    ->suffix('kg'),

                Select::make('breed_id')
                    ->label('Raza')
                    ->options(Breed::pluck('name', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }
}