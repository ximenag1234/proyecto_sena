<?php

namespace App\Filament\Resources\Species\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SpeciesInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Información de la especie')
                    ->description(
                        'Información registrada de la especie.'
                    )
                    ->icon('heroicon-o-paw-print')
                    ->iconColor('primary')
                    ->columns(2)
                    ->schema([

                        TextEntry::make('name')
                            ->label('Nombre'),

                        TextEntry::make('description')
                            ->label('Descripción')
                            ->placeholder('Sin descripción'),

                        TextEntry::make('created_at')
                            ->label('Fecha de creación')
                            ->dateTime('d/m/Y H:i'),

                        TextEntry::make('updated_at')
                            ->label('Última actualización')
                            ->dateTime('d/m/Y H:i'),

                    ]),

            ]);
    }
}