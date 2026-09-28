<?php

namespace App\Filament\Resources\Medications\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MedicationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('name')
                    ->label('💊 Medicamento')
                    ->searchable()
                    ->sortable()
                    ->description('Medicamento veterinario')
                    ->icon('heroicon-o-beaker'),

                TextColumn::make('pet.name')
                    ->label('🐾 Mascota')
                    ->badge()
                    ->color('success')
                    ->searchable()
                    ->sortable()
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