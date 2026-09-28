<?php

namespace App\Filament\Resources\HealthConditions\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class HealthConditionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('name')
                    ->label('🩺 Condición de salud')
                    ->searchable()
                    ->sortable()
                    ->description('Diagnóstico veterinario')
                    ->icon('heroicon-o-heart'),

                TextColumn::make('pets.name')
                    ->label('🐾 Mascota')
                    ->badge()
                    ->color('success')
                    ->searchable()
                    ->placeholder('Sin mascota'),

                TextColumn::make('description')
                    ->label('Descripción')
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->actions([
                \Filament\Actions\ViewAction::make(),
                \Filament\Actions\EditAction::make(),
            ]);
    }
}