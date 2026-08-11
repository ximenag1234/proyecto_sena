<?php

namespace App\Filament\Resources\Breeds\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BreedForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // ==========================================
                // INFORMACIÓN DE LA RAZA
                // ==========================================

                Section::make('Información de la raza')
                    ->description(
                        'Registra las características principales de una raza de mascota.'
                    )
                    ->icon('heroicon-o-tag')
                    ->iconColor('primary')
                    ->columns(2)
                    ->schema([

                        TextInput::make('name')
                            ->label('Nombre de la raza')
                            ->placeholder('Ej: Labrador, Siamés, Beagle...')
                            ->prefixIcon('heroicon-o-tag')
                            ->required()
                            ->maxLength(100)
                            ->autofocus()
                            ->helperText(
                                'Escribe el nombre oficial o común de la raza.'
                            ),

                        Select::make('species')
                            ->label('Especie')
                            ->placeholder('Selecciona una especie')
                            ->options([
                                'perro' => '🐶 Perro',
                                'gato' => '🐱 Gato',
                                'ave' => '🐦 Ave',
                                'pez' => '🐟 Pez',
                                'conejo' => '🐰 Conejo',
                                'hamster' => '🐹 Hámster',
                                'cobaya' => '🐹 Cobaya (Cuy)',
                                'huron' => '🦦 Hurón',
                                'tortuga' => '🐢 Tortuga',
                                'iguana' => '🦎 Iguana',
                                'serpiente' => '🐍 Serpiente',
                                'chinchilla' => '🐭 Chinchilla',
                                'loro' => '🦜 Loro',
                                'canario' => '🐤 Canario',
                                'otro' => '🐾 Otro',
                            ])
                            ->prefixIcon('heroicon-o-sparkles')
                            ->required()
                            ->searchable()
                            ->native(false)
                            ->helperText(
                                'Selecciona la especie a la que pertenece la raza.'
                            ),

                        TextInput::make('size')
                            ->label('Tamaño')
                            ->placeholder('Ej: Pequeño, Mediano, Grande')
                            ->prefixIcon('heroicon-o-arrows-pointing-out')
                            ->required()
                            ->maxLength(50)
                            ->helperText(
                                'Indica el tamaño habitual de esta raza.'
                            ),

                    ]),

                // ==========================================
                // DESCRIPCIÓN
                // ==========================================

                Section::make('Descripción')
                    ->description(
                        'Añade información adicional sobre las características de la raza.'
                    )
                    ->icon('heroicon-o-document-text')
                    ->iconColor('success')
                    ->schema([

                        Textarea::make('description')
                            ->label('Descripción de la raza')
                            ->placeholder(
                                'Describe características, comportamiento, cuidados, temperamento u otra información importante...'
                            )
                            ->rows(6)
                            ->maxLength(1500)
                            ->columnSpanFull()
                            ->helperText(
                                'Puedes incluir información útil para el cuidado de esta raza.'
                            ),

                    ]),
            ]);
    }
}