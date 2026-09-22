<?php

namespace App\Filament\Resources\Breeds\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BreedInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Información de la raza')
                    ->description('Información registrada de la raza.')
                    ->icon('heroicon-o-tag')
                    ->iconColor('warning')
                    ->columns(2)
                    ->schema([

                        TextEntry::make('name')
                            ->label('Nombre de la raza')
                            ->icon('heroicon-m-tag')
                            ->placeholder('Sin registrar'),

                        TextEntry::make('species')
                            ->label('Especie')
                            ->icon('heroicon-m-heart')
                            ->placeholder('Sin registrar'),

                        TextEntry::make('size')
                            ->label('Tamaño')
                            ->icon('heroicon-m-arrows-pointing-out')
                            ->placeholder('Sin registrar'),

                        TextEntry::make('description')
                            ->label('Descripción')
                            ->placeholder('Sin descripción')
                            ->columnSpanFull(),

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