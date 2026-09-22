<?php

namespace App\Filament\Resources\BathRoutines\Schemas;

use App\Models\Pet;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BathRoutineForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // ==========================================
                // INFORMACIÓN DE LA RUTINA
                // ==========================================

                Section::make('Rutina de baño')
                    ->description(
                        'Configura la rutina de baño para una de tus mascotas.'
                    )
                    ->icon('heroicon-o-sparkles')
                    ->iconColor('info')
                    ->columns(2)
                    ->schema([

                        // ==========================================
                        // MASCOTA
                        // ==========================================

                        Select::make('pet_id')
                            ->label('Mascota')
                            ->placeholder('Selecciona una mascota')
                            ->options(function () {

                                if (auth()->user()?->hasRole('admin')) {
                                    return Pet::query()
                                        ->orderBy('name')
                                        ->pluck('name', 'id');
                                }

                                return Pet::query()
                                    ->where('user_id', auth()->id())
                                    ->orderBy('name')
                                    ->pluck('name', 'id');
                            })
                            ->prefixIcon('heroicon-o-face-smile')
                            ->searchable()
                            ->preload()
                            ->native(false)
                            ->required()
                            ->helperText(
                                'Selecciona la mascota para la que deseas registrar esta rutina.'
                            ),

                        // ==========================================
                        // FRECUENCIA
                        // ==========================================

                        TextInput::make('frequency')
                            ->label('Frecuencia')
                            ->placeholder('Ej: Cada 15 días')
                            ->prefixIcon('heroicon-o-arrow-path')
                            ->required()
                            ->maxLength(100)
                            ->helperText(
                                'Indica cada cuánto debe realizarse el baño.'
                            ),

                        // ==========================================
                        // TIPO DE BAÑO
                        // ==========================================

                        Select::make('bath_type')
                            ->label('Tipo de baño')
                            ->placeholder('Selecciona el tipo de baño')
                            ->options([
                                'Baño completo' => '🛁 Baño completo',
                                'Baño medicado' => '💊 Baño medicado',
                                'Baño antipulgas' => '🐜 Baño antipulgas',
                                'Baño en seco' => '✨ Baño en seco',
                                'Baño de limpieza' => '🧼 Baño de limpieza',
                                'Otro' => '🐾 Otro',
                            ])
                            ->prefixIcon('heroicon-o-beaker')
                            ->searchable()
                            ->native(false)
                            ->required()
                            ->helperText(
                                'Selecciona el tipo de baño que necesita la mascota.'
                            ),

                        // ==========================================
                        // OBSERVACIONES
                        // ==========================================

                        TextInput::make('description')
                            ->label('Observaciones')
                            ->placeholder(
                                'Ej: Usar champú para piel sensible'
                            )
                            ->prefixIcon('heroicon-o-document-text')
                            ->maxLength(255)
                            ->columnSpanFull()
                            ->helperText(
                                'Puedes agregar cuidados o recomendaciones especiales.'
                            ),

                    ]),
            ]);
    }
}