<?php

namespace App\Filament\Resources\Species\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SpeciesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
    TextColumn::make('name')
        ->label('Nombre')
        ->searchable(),

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
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
