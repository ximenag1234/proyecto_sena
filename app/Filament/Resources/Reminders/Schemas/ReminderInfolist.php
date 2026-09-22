<?php

namespace App\Filament\Resources\Reminders\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ReminderInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Información del recordatorio')
                    ->description('Información registrada del recordatorio.')
                    ->icon('heroicon-o-bell-alert')
                    ->iconColor('danger')
                    ->columns(2)
                    ->schema([

                        TextEntry::make('type')
                            ->label('Tipo de recordatorio')
                            ->icon('heroicon-m-bell-alert')
                            ->placeholder('Sin registrar'),

                        TextEntry::make('date_time')
                            ->label('Fecha y hora')
                            ->dateTime('d/m/Y H:i')
                            ->icon('heroicon-m-calendar')
                            ->placeholder('Sin registrar'),

                        TextEntry::make('status')
                            ->label('Estado')
                            ->formatStateUsing(fn ($state) => match ($state) {
                                'active' => 'Activo',
                                'inactive' => 'Inactivo',
                                'completed' => 'Completado',
                                'pending' => 'Pendiente',
                                default => $state ?? 'Sin estado',
                            }),

                        TextEntry::make('pet.name')
                            ->label('Mascota')
                            ->icon('heroicon-m-heart')
                            ->placeholder('Sin mascota'),

                    ]),

                Section::make('Información del registro')
                    ->icon('heroicon-o-information-circle')
                    ->iconColor('gray')
                    ->columns(2)
                    ->schema([

                        TextEntry::make('created_at')
                            ->label('Fecha de creación')
                            ->dateTime('d/m/Y H:i')
                            ->placeholder('Sin registrar'),

                        TextEntry::make('updated_at')
                            ->label('Última actualización')
                            ->dateTime('d/m/Y H:i')
                            ->placeholder('Sin registrar'),

                    ]),
            ]);
    }
}