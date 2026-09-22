<?php

namespace App\Filament\Resources\BathRoutines\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BathRoutineInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Información de la rutina de baño')
                    ->description('Información registrada de la rutina de baño.')
                    ->icon('heroicon-o-sparkles')
                    ->iconColor('info')
                    ->columns(2)
                    ->schema([

                        TextEntry::make('frequency')
                            ->label('Frecuencia')
                            ->icon('heroicon-m-arrow-path')
                            ->placeholder('Sin registrar'),

                        TextEntry::make('breed.name')
                            ->label('Raza')
                            ->icon('heroicon-m-tag')
                            ->placeholder('Sin raza'),

                        TextEntry::make('age_min')
                            ->label('Edad mínima')
                            ->suffix(' años')
                            ->placeholder('Sin registrar'),

                        TextEntry::make('age_max')
                            ->label('Edad máxima')
                            ->suffix(' años')
                            ->placeholder('Sin registrar'),

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