<?php

namespace App\Filament\Resources\HealthConditions\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HealthConditionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Información de la condición de salud')
                    ->description(
                        'Información registrada sobre la condición de salud.'
                    )
                    ->icon('heroicon-o-heart')
                    ->iconColor('danger')
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