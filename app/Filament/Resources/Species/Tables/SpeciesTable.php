<?php

namespace App\Filament\Resources\Species\Tables;

use Carbon\Carbon;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SpeciesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->striped()

            ->columns([

                TextColumn::make('name')
                    ->label('🐾 Especie')
                    ->badge()
                    ->weight(FontWeight::Bold)
                    ->icon(fn ($state) => match (mb_strtolower($state)) {
                        'perro' => 'heroicon-m-shield-check',
                        'gato' => 'heroicon-m-heart',
                        'ave' => 'heroicon-m-paper-airplane',
                        'conejo' => 'heroicon-m-sparkles',
                        default => 'heroicon-m-tag',
                    })
                    ->color(fn ($state) => match (mb_strtolower($state)) {
                        'perro' => 'success',
                        'gato' => 'warning',
                        'ave' => 'info',
                        'conejo' => 'primary',
                        default => 'gray',
                    })
                    ->description('Tipo de mascota')
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label('➕ Creado')
                    ->icon('heroicon-m-plus-circle')
                    ->badge()
                    ->color('success')
                    ->formatStateUsing(fn ($state) => Carbon::parse($state)->diffForHumans())
                    ->tooltip(fn ($record) => Carbon::parse($record->created_at)->format('d/m/Y H:i'))
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('🔄 Actualizado')
                    ->icon('heroicon-m-arrow-path')
                    ->badge()
                    ->color('warning')
                    ->formatStateUsing(fn ($state) => Carbon::parse($state)->diffForHumans())
                    ->tooltip(fn ($record) => Carbon::parse($record->updated_at)->format('d/m/Y H:i'))
                    ->toggleable(isToggledHiddenByDefault: true),

            ])

            ->filters([
                //
            ])

            ->recordActions([

                EditAction::make()
                    ->label('')
                    ->icon('heroicon-m-pencil-square')
                    ->color('warning')
                    ->tooltip('Editar especie'),

            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])

            ->emptyStateIcon('heroicon-o-tag')
            ->emptyStateHeading('No hay especies registradas')
            ->emptyStateDescription('Cuando registres una especie aparecerá aquí.')

            ->paginated([10, 25, 50]);
    }
}