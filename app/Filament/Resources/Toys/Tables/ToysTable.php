<?php

namespace App\Filament\Resources\Toys\Tables;

use Carbon\Carbon;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ToysTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->striped()

            ->columns([

                TextColumn::make('name')
                    ->label('🧸 Juguete')
                    ->badge()
                    ->weight(FontWeight::Bold)
                    ->icon('heroicon-m-gift')
                    ->color('primary')
                    ->description('Nombre del juguete')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('type')
                    ->label('🎯 Tipo')
                    ->badge()
                    ->weight(FontWeight::Bold)
                    ->icon(fn ($state) => match (mb_strtolower($state)) {
                        'pelota' => 'heroicon-m-globe-alt',
                        'cuerda' => 'heroicon-m-link',
                        'mordedor' => 'heroicon-m-face-smile',
                        'interactivo' => 'heroicon-m-puzzle-piece',
                        'peluche' => 'heroicon-m-heart',
                        default => 'heroicon-m-gift',
                    })
                    ->color(fn ($state) => match (mb_strtolower($state)) {
                        'pelota' => 'success',
                        'cuerda' => 'warning',
                        'mordedor' => 'danger',
                        'interactivo' => 'info',
                        'peluche' => 'primary',
                        default => 'gray',
                    })
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
                    ->tooltip('Ver juguete'),

                EditAction::make()
                    ->label('')
                    ->icon('heroicon-m-pencil-square')
                    ->color('warning')
                    ->tooltip('Editar juguete'),

            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])

            ->emptyStateIcon('heroicon-o-gift')
            ->emptyStateHeading('No hay juguetes registrados')
            ->emptyStateDescription('Cuando registres un juguete aparecerá aquí.')

            ->paginated([10, 25, 50]);
    }
}