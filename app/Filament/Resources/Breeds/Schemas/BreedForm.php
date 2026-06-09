<?php

namespace App\Filament\Resources\Breeds\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;


class BreedForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nombre')
                    ->required(),
               Select::make('species')
    ->label('Especie')
    ->options([
        'perro' => 'Perro',
        'gato' => 'Gato',
        'ave' => 'Ave',
        'pez' => 'Pez',
        'conejo' => 'Conejo',
        'hamster' => 'Hámster',
        'cobaya' => 'Cobaya (Cuy)',
        'huron' => 'Hurón',
        'tortuga' => 'Tortuga',
        'iguana' => 'Iguana',
        'serpiente' => 'Serpiente',
        'chinchilla' => 'Chinchilla',
        'loro' => 'Loro',
        'canario' => 'Canario',
        'otro' => 'Otro',
    ])
    ->required()
    ->searchable(),
                TextInput::make('size')
                    ->label('Tamaño')
                    ->required(),
                Textarea::make('description')
                    ->label('Descripción')
                    ->columnSpanFull(),
            ]);
    }
}
