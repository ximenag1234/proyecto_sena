<?php

namespace App\Filament\Resources\Pets\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PetInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Información de la mascota')
                    ->description('Información registrada de tu mascota.')
                    ->icon('heroicon-o-heart')
                    ->iconColor('danger')
                    ->columns(2)
                    ->schema([

                        TextEntry::make('name')
                            ->label('Nombre')
                            ->icon('heroicon-m-heart'),

                        TextEntry::make('species')
                            ->label('Especie')
                            ->formatStateUsing(fn ($state) => match ($state) {
                                'perro' => '🐶 Perro',
                                'gato' => '🐱 Gato',
                                'ave' => '🐦 Ave',
                                'conejo' => '🐰 Conejo',
                                'hamster' => '🐹 Hámster',
                                'otro' => '🐾 Otro',
                                default => $state ?? 'Sin especie',
                            }),

                        TextEntry::make('birth_date')
                            ->label('Fecha de nacimiento')
                            ->date('d/m/Y')
                            ->placeholder('Sin registrar'),

                        TextEntry::make('weight')
                            ->label('Peso')
                            ->suffix(' kg')
                            ->placeholder('Sin registrar'),

                    ]),

                Section::make('Propietario y características')
                    ->description('Información relacionada con el propietario y la raza.')
                    ->icon('heroicon-o-identification')
                    ->iconColor('primary')
                    ->columns(2)
                    ->schema([

                        TextEntry::make('user.name')
                            ->label('Propietario')
                            ->icon('heroicon-m-user')
                            ->placeholder('Sin propietario'),

                        TextEntry::make('breed.name')
                            ->label('Raza')
                            ->icon('heroicon-m-tag')
                            ->placeholder('Sin raza'),

                    ]),

                Section::make('Información del registro')
                    ->icon('heroicon-o-information-circle')
                    ->iconColor('gray')
                    ->columns(2)
                    ->schema([

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