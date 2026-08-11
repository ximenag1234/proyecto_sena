<?php

namespace App\Filament\Resources\HealthConditions\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HealthConditionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // ==========================================
                // INFORMACIÓN DE LA CONDICIÓN
                // ==========================================

                Section::make('Información de la condición de salud')
                    ->description(
                        'Registra una condición de salud y proporciona información relevante sobre ella.'
                    )
                    ->icon('heroicon-o-heart')
                    ->iconColor('danger')
                    ->columns(1)
                    ->schema([

                        TextInput::make('name')
                            ->label('Nombre de la condición')
                            ->placeholder('Ej: Alergia, Otitis, Dermatitis...')
                            ->prefixIcon('heroicon-o-heart')
                            ->required()
                            ->maxLength(150)
                            ->autofocus()
                            ->helperText(
                                'Escribe el nombre de la condición de salud.'
                            ),

                        Textarea::make('description')
                            ->label('Descripción')
                            ->placeholder(
                                'Describe los síntomas, características o información importante de esta condición...'
                            )
                            ->rows(6)
                            ->maxLength(2000)
                            ->columnSpanFull()
                            ->helperText(
                                'Agrega información útil para identificar y comprender esta condición.'
                            ),

                    ]),
            ]);
    }
}

