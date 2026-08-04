<?php

namespace App\Filament\Resources\Medications\Tables;

use Carbon\Carbon;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MedicationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->striped()

            ->columns([

                TextColumn::make('name')
                    ->label('💊 Medicamento')
                    ->badge()
                    ->weight(FontWeight::Bold)
                    ->icon(fn ($state) => match (mb_strtolower($state)) {
                        'amoxicilina' => 'heroicon-m-beaker',
                        'ibuprofeno' => 'heroicon-m-heart',
                        'paracetamol' => 'heroicon-m-plus-circle',
                        'vitaminas' => 'heroicon-m-sparkles',
                        default => 'heroicon-m-beaker',
                    })
                    ->color(fn ($state) => match (mb_strtolower($state)) {
                        'amoxicilina' => 'info',
                        'ibuprofeno' => 'danger',
                        'paracetamol' => 'warning',
                        'vitaminas' => 'success',
                        default => 'primary',
                    })
                    ->description('Medicamento veterinario')
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

                ViewAction::make()
                    ->label('')
                    ->icon('heroicon-m-eye')
                    ->color('info')
                    ->tooltip('Ver medicamento'),

                EditAction::make()
                    ->label('')
                    ->icon('heroicon-m-pencil-square')
                    ->color('warning')
                    ->tooltip('Editar medicamento'),

            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])

            ->emptyStateIcon('heroicon-o-beaker')
            ->emptyStateHeading('No hay medicamentos registrados')
            ->emptyStateDescription('Cuando registres un medicamento aparecerá aquí.')

            ->paginated([10, 25, 50]);
    }
}