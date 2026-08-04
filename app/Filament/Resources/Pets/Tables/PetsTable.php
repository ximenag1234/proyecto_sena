<?php

namespace App\Filament\Resources\Pets\Tables;

use Carbon\Carbon;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PetsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->striped()

            ->columns([

                TextColumn::make('name')
                    ->label('🐾 Mascota')
                    ->weight(FontWeight::Bold)
                    ->icon('heroicon-m-heart')
                    ->iconColor('danger')
                    ->color('primary')
                    ->description(fn ($record) =>
                        $record->breed?->name ?? 'Sin raza registrada'
                    )
                    ->searchable()
                    ->sortable(),

                TextColumn::make('species')
                    ->label('🦴 Especie')
                    ->badge()
                    ->weight(FontWeight::Bold)
                    ->icon(fn ($state) => match ($state) {
                        'Perro' => 'heroicon-m-shield-check',
                        'Gato' => 'heroicon-m-heart',
                        'Ave' => 'heroicon-m-cloud',
                        default => 'heroicon-m-paw-print',
                    })
                    ->color(fn ($state) => match ($state) {
                        'Perro' => 'success',
                        'Gato' => 'warning',
                        'Ave' => 'info',
                        default => 'gray',
                    }),

                TextColumn::make('birth_date')
                    ->label('🎂 Fecha de nacimiento')
                    ->badge()
                    ->icon('heroicon-m-calendar-days')
                    ->color('success')
                    ->date('d/m/Y')
                    ->description(fn ($record) =>
                        $record->birth_date
                            ? Carbon::parse($record->birth_date)->age . ' años'
                            : 'Sin registro'
                    )
                    ->tooltip(fn ($record) =>
                        $record->birth_date
                            ? Carbon::parse($record->birth_date)
                                ->translatedFormat('l d \\d\\e F \\d\\e Y')
                            : null
                    )
                    ->sortable(),

                TextColumn::make('weight')
                    ->label('⚖ Peso')
                    ->badge()
                    ->icon('heroicon-m-scale')
                    ->suffix(' kg')
                    ->numeric(decimalPlaces: 1)
                    ->color(fn ($state) => match (true) {
                        $state < 5 => 'success',
                        $state < 20 => 'warning',
                        default => 'danger',
                    })
                    ->sortable(),

                TextColumn::make('user.name')
                    ->label('👤 Dueño')
                    ->icon('heroicon-m-user')
                    ->iconColor('primary')
                    ->weight(FontWeight::Bold)
                    ->color('primary')
                    ->description(fn ($record) =>
                        $record->user?->email ?? 'Sin correo registrado'
                    )
                    ->searchable()
                    ->sortable(),

                TextColumn::make('breed.name')
                    ->label('❤️ Raza')
                    ->badge()
                    ->icon('heroicon-m-tag')
                    ->color('gray')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('➕ Creado')
                    ->icon('heroicon-m-plus-circle')
                    ->badge()
                    ->color('success')
                    ->formatStateUsing(fn ($state) =>
                        Carbon::parse($state)->diffForHumans()
                    )
                    ->tooltip(fn ($record) =>
                        Carbon::parse($record->created_at)->format('d/m/Y H:i')
                    )
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('🔄 Actualizado')
                    ->icon('heroicon-m-arrow-path')
                    ->badge()
                    ->color('warning')
                    ->formatStateUsing(fn ($state) =>
                        Carbon::parse($state)->diffForHumans()
                    )
                    ->tooltip(fn ($record) =>
                        Carbon::parse($record->updated_at)->format('d/m/Y H:i')
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
                    ->tooltip('Ver mascota'),

                EditAction::make()
                    ->label('')
                    ->icon('heroicon-m-pencil-square')
                    ->color('warning')
                    ->tooltip('Editar mascota'),

            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])

            ->emptyStateIcon('heroicon-o-heart')
            ->emptyStateHeading('No hay mascotas registradas')
            ->emptyStateDescription('Cuando registres una mascota aparecerá aquí.')

            ->paginated([10, 25, 50]);
    }
}