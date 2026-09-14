<?php

namespace App\Filament\Resources\Reminders\Schemas;

use App\Models\Pet;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ReminderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // ==========================================
                // INFORMACIÓN DEL RECORDATORIO
                // ==========================================

                Section::make('Información del recordatorio')
                    ->description(
                        'Programa y administra los recordatorios relacionados con las mascotas.'
                    )
                    ->icon('heroicon-o-bell')
                    ->iconColor('warning')
                    ->columns(2)
                    ->schema([

                        TextInput::make('type')
                            ->label('Tipo de recordatorio')
                            ->placeholder('Ej: Vacunación, baño, medicamento...')
                            ->prefixIcon('heroicon-o-bell')
                            ->required()
                            ->maxLength(100)
                            ->helperText(
                                'Indica qué tipo de recordatorio deseas registrar.'
                            ),

                        Select::make('pet_id')
                            ->label('Mascota')
                            ->placeholder('Selecciona una mascota')
                            ->options(function () {

                                // ADMIN:
                                // Puede seleccionar cualquier mascota.
                                if (auth()->user()?->hasRole('admin')) {
                                    return Pet::query()
                                        ->orderBy('name')
                                        ->pluck('name', 'id');
                                }

                                // USUARIO NORMAL:
                                // Solo puede seleccionar sus propias mascotas.
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
                                'Selecciona la mascota asociada al recordatorio.'
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
                                'Indica cuándo debe cumplirse el recordatorio.'
                            ),

                        TextInput::make('status')
                            ->label('Estado')
                            ->placeholder('Ej: Pendiente')
                            ->prefixIcon('heroicon-o-check-circle')
                            ->required()
                            ->maxLength(50)
                            ->helperText(
                                'Indica el estado actual del recordatorio.'
                            ),

                    ]),
            ]);
    }
}