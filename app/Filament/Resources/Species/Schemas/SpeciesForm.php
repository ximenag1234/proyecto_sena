<?php

namespace App\Filament\Resources\Species\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SpeciesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // ==========================================
                // INFORMACIÓN DE LA ESPECIE
                // ==========================================

                Section::make('Información de la especie')
                    ->description(
                        'Registra una especie y agrega información relevante sobre sus características.'
                    )
                    ->icon('heroicon-o-sparkles')
                    ->iconColor('primary')
                    ->columns(1)
                    ->schema([

                        TextInput::make('name')
                            ->label('Nombre de la especie')
                            ->placeholder('Ej: Perro, Gato, Ave, Pez...')
                            ->prefixIcon('heroicon-o-sparkles')
                            ->required()
                            ->maxLength(100)
                            ->autofocus()
                            ->helperText(
                                'Escribe el nombre de la especie.'
                            ),

                        Textarea::make('description')
                            ->label('Descripción')
                            ->placeholder(
                                'Describe las características, cuidados o información importante de esta especie...'
                            )
                            ->rows(6)
                            ->maxLength(1500)
                            ->columnSpanFull()
                            ->helperText(
                                'Agrega información útil sobre la especie.'
                            ),

                    ]),
            ]);
    }
}
