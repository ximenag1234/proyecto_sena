<?php

namespace App\Filament\Resources\HealthConditions\Tables;

use Carbon\Carbon;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class HealthConditionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->striped()

            ->columns([

                TextColumn::make('name')
                    ->label('🩺 Condición de salud')
                    ->badge()
                    ->weight(FontWeight::Bold)
                    ->icon(fn ($state) => match (mb_strtolower($state)) {
                        'diabetes' => 'heroicon-m-beaker',
                        'obesidad' => 'heroicon-m-scale',
                        'alergia' => 'heroicon-m-shield-exclamation',
                        'fractura' => 'heroicon-m-bandage',
                        'anemia' => 'heroicon-m-heart',
                        default => 'heroicon-m-heart',
                    })
                    ->color(fn ($state) => match (mb_strtolower($state)) {
                        'diabetes' => 'warning',
                        'obesidad' => 'danger',
                        'alergia' => 'info',
                        'fractura' => 'success',
                        'anemia' => 'primary',
                        default => 'gray',
                    })
                    ->description('Diagnóstico veterinario')
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
                    ->tooltip('Ver condición'),

                EditAction::make()
                    ->label('')
                    ->icon('heroicon-m-pencil-square')
                    ->color('warning')
                    ->tooltip('Editar condición'),

            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])

            ->emptyStateIcon('heroicon-o-heart')
            ->emptyStateHeading('No hay condiciones de salud registradas')
            ->emptyStateDescription('Cuando registres una condición aparecerá aquí.')

            ->paginated([10, 25, 50]);
    }
}