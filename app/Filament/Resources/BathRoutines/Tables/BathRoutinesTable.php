<?php

namespace App\Filament\Resources\BathRoutines\Tables;

use Carbon\Carbon;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BathRoutinesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('age_min')
            ->striped()

            ->columns([

                TextColumn::make('frequency')
                    ->label('🛁 Frecuencia')
                    ->badge()
                    ->weight(FontWeight::Bold)
                    ->icon('heroicon-m-sparkles')
                    ->color(fn ($state) => match (mb_strtolower($state)) {
                        'diario' => 'danger',
                        'semanal' => 'success',
                        'quincenal' => 'warning',
                        'mensual' => 'info',
                        default => 'gray',
                    })
                    ->searchable(),

                TextColumn::make('age_min')
                    ->label('🐶 Edad mínima')
                    ->badge()
                    ->icon('heroicon-m-arrow-trending-up')
                    ->color('success')
                    ->suffix(' meses')
                    ->sortable(),

                TextColumn::make('age_max')
                    ->label('🐕 Edad máxima')
                    ->badge()
                    ->icon('heroicon-m-arrow-trending-down')
                    ->color('warning')
                    ->suffix(' meses')
                    ->sortable(),

                TextColumn::make('breed.name')
                    ->label('🐾 Raza')
                    ->icon('heroicon-m-heart')
                    ->iconColor('danger')
                    ->weight(FontWeight::Bold)
                    ->color('primary')
                    ->description('Aplica para esta raza')
                    ->searchable()
                    ->sortable(),

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
                    ->tooltip('Ver rutina'),

                EditAction::make()
                    ->label('')
                    ->icon('heroicon-m-pencil-square')
                    ->color('warning')
                    ->tooltip('Editar rutina'),

            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])

            ->emptyStateIcon('heroicon-o-sparkles')
            ->emptyStateHeading('No hay rutinas de baño')
            ->emptyStateDescription('Las rutinas de baño registradas aparecerán aquí.')

            ->paginated([10, 25, 50]);
    }
}