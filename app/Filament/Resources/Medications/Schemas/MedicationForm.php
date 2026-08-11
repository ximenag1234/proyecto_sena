<?php

namespace App\Filament\Resources\Medications\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class MedicationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // ==========================================
                // INFORMACIÓN DEL MEDICAMENTO
                // ==========================================

                Section::make('Información del medicamento')
                    ->description(
                        'Registra un medicamento y agrega información importante sobre su uso.'
                    )
                    ->icon('heroicon-o-beaker')
                    ->iconColor('warning')
                    ->columns(1)
                    ->schema([

                        TextInput::make('name')
                            ->label('Nombre del medicamento')
                            ->placeholder('Ej: Amoxicilina, Ibuprofeno, Antibiótico...')
                            ->prefixIcon('heroicon-o-beaker')
                            ->required()
                            ->maxLength(150)
                            ->autofocus()
                            ->helperText(
                                'Escribe el nombre del medicamento.'
                            ),

                        Textarea::make('description')
                            ->label('Descripción')
                            ->placeholder(
                                'Describe el medicamento, su función, presentación u otra información importante...'
                            )
                            ->rows(7)
                            ->maxLength(2000)
                            ->columnSpanFull()
                            ->helperText(
                                'Agrega información relevante sobre este medicamento.'
                            ),

                    ]),
            ]);
    }
}
