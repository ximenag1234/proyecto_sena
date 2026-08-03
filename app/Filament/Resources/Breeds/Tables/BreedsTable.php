<?php

namespace App\Filament\Resources\Breeds\Tables;

use Carbon\Carbon;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BreedsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('name')
            ->striped()

            ->columns([

                TextColumn::make('name')
                    ->label('🐾 Raza')
                    ->icon('heroicon-m-heart')
                    ->iconColor('danger')
                    ->weight(FontWeight::Bold)
                    ->color('primary')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('species')
                    ->label('🐶 Especie')
                    ->badge()
                    ->icon(fn ($state) => match (mb_strtolower($state)) {
                        'perro' => 'heroicon-m-shield-check',
                        'gato' => 'heroicon-m-face-smile',
                        default => 'heroicon-m-tag',
                    })
                    ->color(fn ($state) => match (mb_strtolower($state)) {
                        'perro' => 'info',
                        'gato' => 'warning',
                        default => 'gray',
                    })
                    ->searchable()
                    ->sortable(),

                TextColumn::make('size')
                    ->label('📏 Tamaño')
                    ->badge()
                    ->icon(fn ($state) => match (mb_strtolower($state)) {
                        'pequeño', 'pequeno' => 'heroicon-m-minus-circle',
                        'mediano' => 'heroicon-m-adjustments-horizontal',
                        'grande' => 'heroicon-m-plus-circle',
                        default => 'heroicon-m-arrows-pointing-out',
                    })
                    ->color(fn ($state) => match (mb_strtolower($state)) {
                        'pequeño', 'pequeno' => 'success',
                        'mediano' => 'warning',
                        'grande' => 'danger',
                        default => 'gray',
                    })
                    ->sortable()
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label('Creado')
                    ->badge()
                    ->icon('heroicon-m-plus-circle')
                    ->color('success')
                    ->formatStateUsing(fn ($state) => Carbon::parse($state)->diffForHumans())
                    ->tooltip(fn ($record) => Carbon::parse($record->created_at)->format('d/m/Y H:i'))
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Actualizado')
                    ->badge()
                    ->icon('heroicon-m-arrow-path')
                    ->color('warning')
                    ->formatStateUsing(fn ($state) => Carbon::parse($state)->diffForHumans())
                    ->tooltip(fn ($record) => Carbon::parse($record->updated_at)->format('d/m/Y H:i'))
                    ->toggleable(isToggledHiddenByDefault: true),

            ])

            ->filters([
                //
            ])

            ->recordActions([

                ViewAction::make()
                    ->label('')
                    ->icon('heroicon-m-eye')
                    ->color('info')
                    ->tooltip('Ver raza'),

                EditAction::make()
                    ->label('')
                    ->icon('heroicon-m-pencil-square')
                    ->color('warning')
                    ->tooltip('Editar raza'),

            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])

            ->emptyStateIcon('heroicon-o-heart')
            ->emptyStateHeading('No hay razas registradas')
            ->emptyStateDescription('Las razas aparecerán aquí cuando las agregues.')

            ->paginated([10, 25, 50]);
    }
}