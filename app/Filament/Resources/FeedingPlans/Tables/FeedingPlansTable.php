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
                    ->searchable(),
                TextColumn::make('amount')
                    ->searchable(),
                TextColumn::make('frequency')
                    ->searchable(),
                TextColumn::make('age_min')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('age_max')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('weight_min')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('weight_max')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('breed_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
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
