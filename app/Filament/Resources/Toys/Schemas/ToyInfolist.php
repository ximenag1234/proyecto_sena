<?php

namespace App\Filament\Resources\Toys\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ToyInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Información del juguete')
                    ->description('Información registrada del juguete.')
                    ->icon('heroicon-o-gift')
                    ->iconColor('warning')
                    ->columns(2)
                    ->schema([

                        TextEntry::make('name')
                            ->label('Nombre del juguete')
                            ->icon('heroicon-m-gift')
                            ->placeholder('Sin registrar'),

                        TextEntry::make('type')
                            ->label('Tipo de juguete')
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

