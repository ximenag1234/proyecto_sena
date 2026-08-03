<?php

namespace App\Filament\Resources\FeedingPlans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FeedingPlansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
    TextColumn::make('food_type')
        ->label('Tipo de alimento')
        ->searchable(),

    TextColumn::make('amount')
        ->label('Cantidad')
        ->searchable(),

    TextColumn::make('frequency')
        ->label('Frecuencia')
        ->searchable(),

    TextColumn::make('age_min')
        ->label('Edad mínima')
        ->numeric()
        ->sortable(),

    TextColumn::make('age_max')
        ->label('Edad máxima')
        ->numeric()
        ->sortable(),

    TextColumn::make('weight_min')
        ->label('Peso mínimo')
        ->numeric()
        ->sortable(),

    TextColumn::make('weight_max')
        ->label('Peso máximo')
        ->numeric()
        ->sortable(),

    TextColumn::make('breed.name')
        ->label('Raza')
        ->searchable()
        ->sortable(),

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
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
