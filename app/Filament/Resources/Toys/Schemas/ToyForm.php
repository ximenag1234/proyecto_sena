<?php

namespace App\Filament\Resources\Toys\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ToyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // ==========================================
                // INFORMACIÓN DEL JUGUETE
                // ==========================================

                Section::make('Información del juguete')
                    ->description(
                        'Registra un juguete y especifica su categoría y características.'
                    )
                    ->icon('heroicon-o-sparkles')
                    ->iconColor('warning')
                    ->columns(2)
                    ->schema([

                        TextInput::make('name')
                            ->label('Nombre del juguete')
                            ->placeholder('Ej: Pelota, Kong, Cuerda...')
                            ->prefixIcon('heroicon-o-tag')
                            ->required()
                            ->maxLength(150)
                            ->autofocus()
                            ->helperText(
                                'Escribe el nombre del juguete.'
                            ),

                        Select::make('type')
                            ->label('Tipo de juguete')
                            ->placeholder('Selecciona una categoría')
                            ->options([
                                'mordedores' => '🦴 Mordedores',
                                'pelotas_y_lanzamiento' => '⚽ Pelotas y Lanzamiento',
                                'interactivos' => '🧩 Interactivos',
                                'peluches' => '🧸 Peluches',
                                'cuerdas' => '🪢 Cuerdas',
                                'sonoros' => '🔊 Sonoros',
                                'juguetes_para_gatos' => '🐱 Juguetes para Gatos',
                                'entrenamiento_y_ejercicio' => '🏃 Entrenamiento y Ejercicio',
                                'acuaticos' => '🌊 Acuáticos',
                                'dispensadores_de_premios' => '🍖 Dispensadores de Premios',
                                'persecucion_y_caza' => '🎯 Persecución y Caza',
                                'tuneles_y_escondites' => '🕳️ Túneles y Escondites',
                                'rascadores_y_accesorios_de_juego' => '🐾 Rascadores y Accesorios de Juego',
                                'juguetes_para_aves' => '🦜 Juguetes para Aves',
                                'juguetes_para_roedores' => '🐹 Juguetes para Roedores',
                                'juguetes_para_mascotas_pequenas' => '🐰 Juguetes para Mascotas Pequeñas',
                                'juguetes_electronicos' => '🤖 Juguetes Electrónicos',
                                'juguetes_dentales' => '🦷 Juguetes Dentales',
                                'juguetes_para_cachorros' => '🐶 Juguetes para Cachorros',
                                'juguetes_para_mascotas_senior' => '🐕 Juguetes para Mascotas Senior',
                                'otros' => '🐾 Otros Juguetes para Mascotas',
                            ])
                            ->prefixIcon('heroicon-o-sparkles')
                            ->searchable()
                            ->native(false)
                            ->required()
                            ->helperText(
                                'Selecciona la categoría que mejor describe el juguete.'
                            ),

                    ]),

                // ==========================================
                // DESCRIPCIÓN
                // ==========================================

                Section::make('Descripción del juguete')
                    ->description(
                        'Agrega información sobre el uso, características y beneficios del juguete.'
                    )
                    ->icon('heroicon-o-document-text')
                    ->iconColor('success')
                    ->schema([

                        Textarea::make('description')
                            ->label('Descripción')
                            ->placeholder(
                                'Describe el juguete, su funcionamiento, materiales, beneficios, recomendaciones de uso, etc.'
                            )
                            ->rows(6)
                            ->maxLength(2000)
                            ->columnSpanFull()
                            ->helperText(
                                'Incluye información que pueda ayudar a elegir o utilizar correctamente el juguete.'
                            ),

                    ]),
            ]);
    }
}
