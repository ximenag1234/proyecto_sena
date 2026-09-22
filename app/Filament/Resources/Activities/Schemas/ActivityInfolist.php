<?php

namespace App\Filament\Resources\Activities\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ActivityInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Información de la actividad')
                    ->description('Información registrada de la actividad.')
                    ->icon('heroicon-o-bolt')
                    ->iconColor('info')
                    ->columns(2)
                    ->schema([

                        TextEntry::make('type')
                            ->label('Tipo de actividad')
                            ->icon('heroicon-m-bolt')
                            ->placeholder('Sin registrar'),

                        TextEntry::make('date_time')
                            ->label('Fecha y hora')
                            ->dateTime('d/m/Y H:i')
                            ->icon('heroicon-m-calendar')
                            ->placeholder('Sin registrar'),

                        TextEntry::make('description')
                            ->label('Descripción')
                            ->placeholder('Sin descripción')
                            ->columnSpanFull(),

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