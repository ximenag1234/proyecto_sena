<?php

namespace App\Filament\Resources\Activities\Schemas;

use App\Models\Pet;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ActivityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // ==========================================
                // INFORMACIÓN DE LA ACTIVIDAD
                // ==========================================

                Section::make('Información de la actividad')
                    ->description(
                        'Registra una actividad realizada por la mascota.'
                    )
                    ->icon('heroicon-o-bolt')
                    ->iconColor('warning')
                    ->columns(2)
                    ->schema([

                        Select::make('type')
                            ->label('Tipo de actividad')
                            ->placeholder('Selecciona el tipo de actividad')
                            ->options([
                                'Juego' => '🎮 Juego',
                                'Paseo' => '🚶 Paseo',
                                'Entrenamiento' => '🏆 Entrenamiento',
                                'Ejercicio' => '💪 Ejercicio',
                                'Socialización' => '👥 Socialización',
                                'Descanso' => '😴 Descanso',
                                'Alimentación' => '🍖 Alimentación',
                                'Higiene y Aseo' => '🛁 Higiene y Aseo',
                                'Caza e Instinto' => '🐾 Caza e Instinto',
                                'Masticación' => '🦴 Masticación',
                                'Exploración' => '🔎 Exploración',
                                'Estimulación Mental' => '🧠 Estimulación Mental',
                                'Agilidad' => '⚡ Agilidad',
                                'Natación' => '🏊 Natación',
                                'Búsqueda y Rastreo' => '🔍 Búsqueda y Rastreo',
                                'Tirar y Aflojar' => '🪢 Tirar y Aflojar',
                                'Lanzar y Recoger' => '🎾 Lanzar y Recoger',
                                'Escalada' => '🧗 Escalada',
                                'Observación y Vigilancia' => '👀 Observación y Vigilancia',
                                'Transporte y Viaje' => '🚗 Transporte y Viaje',
                            ])
                            ->prefixIcon('heroicon-o-sparkles')
                            ->searchable()
                            ->native(false)
                            ->required()
                            ->helperText(
                                'Selecciona el tipo de actividad realizada.'
                            ),

                        DateTimePicker::make('date_time')
                            ->label('Fecha y hora')
                            ->placeholder('Selecciona fecha y hora')
                            ->prefixIcon('heroicon-o-calendar')
                            ->native(false)
                            ->seconds(false)
                            ->displayFormat('d/m/Y H:i')
                            ->required()
                            ->helperText(
                                'Indica cuándo se realizó la actividad.'
                            ),

                        Select::make('pet_id')
                            ->label('Mascota')
                            ->placeholder('Selecciona una mascota')
                            ->options(function () {

                                // Admin: puede ver todas las mascotas.
                                if (auth()->user()?->hasRole('admin')) {
                                    return Pet::query()
                                        ->orderBy('name')
                                        ->pluck('name', 'id');
                                }

                                // Usuario normal: solo sus propias mascotas.
                                return Pet::query()
                                    ->where('user_id', auth()->id())
                                    ->orderBy('name')
                                    ->pluck('name', 'id');
                            })
                            ->prefixIcon('heroicon-o-heart')
                            ->searchable()
                            ->preload()
                            ->native(false)
                            ->required()
                            ->helperText(
                                'Selecciona la mascota que realizó la actividad.'
                            ),

                    ]),

                // ==========================================
                // DESCRIPCIÓN
                // ==========================================

                Section::make('Detalles de la actividad')
                    ->description(
                        'Añade información adicional sobre la actividad realizada.'
                    )
                    ->icon('heroicon-o-document-text')
                    ->iconColor('primary')
                    ->schema([

                        Textarea::make('description')
                            ->label('Descripción')
                            ->placeholder(
                                'Describe qué hizo la mascota, cuánto tiempo duró, cómo se comportó, etc.'
                            )
                            ->rows(5)
                            ->maxLength(1000)
                            ->columnSpanFull()
                            ->helperText(
                                'Puedes agregar observaciones o detalles importantes de la actividad.'
                            ),

                    ]),
            ]);
    }
}