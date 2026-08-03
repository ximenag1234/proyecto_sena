<?php

namespace App\Filament\Resources\Pets\Tables;

use Carbon\Carbon;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PetsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable()
                    ->weight(FontWeight::Bold)
                    ->icon('heroicon-o-heart')
                    ->description(fn ($record) =>
                        $record->breed?->name ?? 'Sin raza registrada'
                    ),

                TextColumn::make('species')
                    ->label('Especie')
                    ->badge()
                    ->colors([
                        'success' => 'Perro',
                        'warning' => 'Gato',
                        'info' => 'Ave',
                        'gray',
                    ])
                    ->icon(fn ($state) => match ($state) {
                        'Perro' => 'heroicon-o-shield-check',
                        'Gato' => 'heroicon-o-sparkles',
                        'Ave' => 'heroicon-o-cloud',
                        default => 'heroicon-o-paw-print',
                    }),

                TextColumn::make('birth_date')
                    ->label('Fecha de nacimiento')
                    ->date('d/m/Y')
                    ->sortable()
                    ->icon('heroicon-o-calendar')
                    ->description(fn ($record) =>
                        $record->birth_date
                            ? Carbon::parse($record->birth_date)->age . ' años'
                            : 'Fecha desconocida'
                    ),

                TextColumn::make('weight')
                    ->label('Peso')
                    ->numeric(decimalPlaces: 1)
                    ->suffix(' kg')
                    ->sortable()
                    ->badge()
                    ->color(fn ($state) => match (true) {
                        $state < 5 => 'success',
                        $state < 20 => 'warning',
                        default => 'danger',
                    })
                    ->icon('heroicon-o-scale'),

                TextColumn::make('user.name')
                    ->label('Dueño')
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-o-user')
                    ->description(fn ($record) =>
                        $record->user?->email ?? 'Sin correo registrado'
                    ),

                TextColumn::make('breed.name')
                    ->label('Raza')
                    ->badge()
                    ->color('gray')
                    ->icon('heroicon-o-tag'),

                TextColumn::make('created_at')
                    ->label('Fecha de creación')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Última actualización')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make()
                    ->icon('heroicon-o-eye'),

                EditAction::make()
                    ->icon('heroicon-o-pencil-square'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}