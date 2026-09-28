<?php

namespace App\Filament\Resources\Toys\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ToysTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('name')
                    ->label('🧸 Juguete')
                    ->searchable()
                    ->sortable()
                    ->description('Nombre del juguete')
                    ->icon('heroicon-o-gift'),

                TextColumn::make('type')
                    ->label('🎯 Tipo')
                    ->badge()
                    ->searchable()
                    ->sortable(),

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