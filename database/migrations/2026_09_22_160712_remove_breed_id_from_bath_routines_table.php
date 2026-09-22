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
            ->defaultSort('created_at', 'desc')
            ->striped()

            ->columns([

                // ==========================================
                // MASCOTA
                // ==========================================

                TextColumn::make('pet.name')
                    ->label('🐶 Mascota')
                    ->badge()
                    ->icon('heroicon-m-face-smile')
                    ->iconColor('primary')
                    ->color('primary')
                    ->weight(FontWeight::Bold)
                    ->description('Mascota de la rutina')
                    ->searchable()
                    ->sortable(),

                // ==========================================
                // FRECUENCIA
                // ==========================================

                TextColumn::make('frequency')
                    ->label('🛁 Frecuencia')
                    ->badge()
                    ->weight(FontWeight::Bold)
                    ->icon('heroicon-m-arrow-path')
                    ->color(fn ($state) => match (mb_strtolower($state)) {
                        'diario', 'cada día' => 'danger',
                        'semanal', 'cada semana' => 'success',
                        'quincenal', 'cada 15 días' => 'warning',
                        'mensual', 'cada mes' => 'info',
                        default => 'gray',
                    })
                    ->searchable(),

                // ==========================================
                // TIPO DE BAÑO
                // ==========================================

                TextColumn::make('bath_type')
                    ->label('🧼 Tipo de baño')
                    ->badge()
                    ->icon('heroicon-m-sparkles')
                    ->color('info')
                    ->weight(FontWeight::Bold)
                    ->searchable(),

                // ==========================================
                // OBSERVACIONES
                // ==========================================

                TextColumn::make('description')
                    ->label('📝 Observaciones')
                    ->placeholder('Sin observaciones')
                    ->limit(40)
                    ->wrap()
                    ->searchable(),

                // ==========================================
                // FECHA DE CREACIÓN
                // ==========================================

                TextColumn::make('created_at')
                    ->label('Creado')
                    ->badge()
                    ->icon('heroicon-m-plus-circle')
                    ->color('success')
                    ->formatStateUsing(
                        fn ($state) => Carbon::parse($state)->diffForHumans()
                    )
                    ->tooltip(
                        fn ($record) => Carbon::parse(
                            $record->created_at
                        )->format('d/m/Y H:i')
                    )
                    ->toggleable(isToggledHiddenByDefault: true),

                // ==========================================
                // FECHA DE ACTUALIZACIÓN
                // ==========================================

                TextColumn::make('updated_at')
                    ->label('Actualizado')
                    ->badge()
                    ->icon('heroicon-m-arrow-path')
                    ->color('warning')
                    ->formatStateUsing(
                        fn ($state) => Carbon::parse($state)->diffForHumans()
                    )
                    ->tooltip(
                        fn ($record) => Carbon::parse(
                            $record->updated_at
                        )->format('d/m/Y H:i')
                    )
                    ->toggleable(isToggledHiddenByDefault: true),

            ])

            ->filters([
                //
            ])

            // ==========================================
            // ACCIONES
            // ==========================================

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

            // ==========================================
            // ACCIONES MASIVAS
            // ==========================================

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])

            // ==========================================
            // ESTADO VACÍO
            // ==========================================

            ->emptyStateIcon('heroicon-o-sparkles')
            ->emptyStateHeading('No hay rutinas de baño')
            ->emptyStateDescription(
                'Las rutinas de baño que registres aparecerán aquí.'
            )

            ->paginated([10, 25, 50]);
    }
}