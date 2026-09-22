<?php

namespace App\Filament\Resources\FeedingPlans\Tables;

use Carbon\Carbon;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FeedingPlansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->striped()

            ->columns([

                TextColumn::make('food_type')
                    ->label('🍖 Tipo de alimento')
                    ->badge()
                    ->weight(FontWeight::Bold)
                    ->icon(fn ($state) => match (mb_strtolower($state)) {
                        'concentrado' => 'heroicon-m-cube',
                        'barf' => 'heroicon-m-fire',
                        'casero' => 'heroicon-m-home',
                        'húmedo', 'humedo' => 'heroicon-m-beaker',
                        default => 'heroicon-m-cake',
                    })
                    ->color(fn ($state) => match (mb_strtolower($state)) {
                        'concentrado' => 'warning',
                        'barf' => 'danger',
                        'casero' => 'success',
                        'húmedo', 'humedo' => 'info',
                        default => 'gray',
                    })
                    ->searchable(),

                TextColumn::make('amount')
                    ->label('🥣 Cantidad')
                    ->badge()
                    ->icon('heroicon-m-scale')
                    ->color('primary')
                    ->weight(FontWeight::Bold)
                    ->description('Por porción')
                    ->searchable(),

                TextColumn::make('frequency')
                    ->label('⏰ Frecuencia')
                    ->badge()
                    ->icon('heroicon-m-clock')
                    ->color('warning')
                    ->weight(FontWeight::Bold)
                    ->searchable(),

                // ==========================================
                // MASCOTA
                // ==========================================

                TextColumn::make('pet.name')
                    ->label('🐾 Mascota')
                    ->badge()
                    ->icon('heroicon-m-face-smile')
                    ->color('success')
                    ->weight(FontWeight::Bold)
                    ->searchable()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('➕ Creado')
                    ->icon('heroicon-m-plus-circle')
                    ->badge()
                    ->color('success')
                    ->formatStateUsing(
                        fn ($state) => Carbon::parse($state)->diffForHumans()
                    )
                    ->tooltip(
                        fn ($record) => Carbon::parse($record->created_at)
                            ->format('d/m/Y H:i')
                    )
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('🔄 Actualizado')
                    ->icon('heroicon-m-arrow-path')
                    ->badge()
                    ->color('warning')
                    ->formatStateUsing(
                        fn ($state) => Carbon::parse($state)->diffForHumans()
                    )
                    ->tooltip(
                        fn ($record) => Carbon::parse($record->updated_at)
                            ->format('d/m/Y H:i')
                    )
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
                    ->tooltip('Ver plan alimenticio'),

                EditAction::make()
                    ->label('')
                    ->icon('heroicon-m-pencil-square')
                    ->color('warning')
                    ->tooltip('Editar plan alimenticio'),

            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])

            ->emptyStateIcon('heroicon-o-cake')
            ->emptyStateHeading('No hay planes alimenticios registrados')
            ->emptyStateDescription(
                'Cuando registres un plan alimenticio aparecerá aquí.'
            )

            ->paginated([10, 25, 50]);
    }
}