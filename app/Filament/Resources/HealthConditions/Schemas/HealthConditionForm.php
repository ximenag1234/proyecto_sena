<?php

namespace App\Filament\Resources\HealthConditions\Schemas;

use App\Models\Pet;
use Filament\Forms\Components\Select;
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

                Section::make('Información de la condición')
                    ->description(
                        'Registra una condición de salud y asígnala a una mascota.'
                    )
                    ->icon('heroicon-o-heart')
                    ->iconColor('danger')
                    ->columns(2)
                    ->schema([

                        TextInput::make('name')
                            ->label('Nombre de la condición')
                            ->placeholder(
                                'Ej: Otitis, alergia, dermatitis...'
                            )
                            ->prefixIcon('heroicon-o-heart')
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
                                'Selecciona la mascota que presenta esta condición.'
                            ),

                        Textarea::make('description')
                            ->label('Descripción')
                            ->placeholder(
                                'Describe la condición de salud...'
                            )
                            ->rows(6)
                            ->maxLength(2000)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}