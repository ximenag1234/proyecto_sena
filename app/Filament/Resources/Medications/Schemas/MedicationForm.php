<?php

namespace App\Filament\Resources\Medications\Schemas;

use App\Models\Pet;
use Filament\Forms\Components\Select;
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

                Section::make('Información del medicamento')
                    ->description(
                        'Registra un medicamento y asígnalo a una mascota.'
                    )
                    ->icon('heroicon-o-beaker')
                    ->iconColor('warning')
                    ->columns(2)
                    ->schema([

                        TextInput::make('name')
                            ->label('Nombre del medicamento')
                            ->placeholder(
                                'Ej: Amoxicilina, medicamento veterinario...'
                            )
                            ->prefixIcon('heroicon-o-beaker')
                            ->required()
                            ->maxLength(150)
                            ->autofocus(),

                        Select::make('pet_id')
                            ->label('Mascota')
                            ->placeholder('Selecciona una mascota')
                            ->options(function () {

                                $query = Pet::query()
                                    ->orderBy('name');

                                if (! auth()->user()?->hasRole('admin')) {
                                    $query->where(
                                        'user_id',
                                        auth()->id()
                                    );
                                }

                                return $query->pluck('name', 'id');
                            })
                            ->prefixIcon('heroicon-o-heart')
                            ->searchable()
                            ->preload()
                            ->native(false)
                            ->required()
                            ->helperText(
                                'Selecciona la mascota a la que pertenece este medicamento.'
                            ),

                        Textarea::make('description')
                            ->label('Descripción')
                            ->placeholder(
                                'Describe el medicamento, su función, presentación u otra información importante...'
                            )
                            ->rows(7)
                            ->maxLength(2000)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}