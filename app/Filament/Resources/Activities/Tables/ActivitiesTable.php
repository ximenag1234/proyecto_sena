<?php

namespace App\Filament\Resources\Activities\Tables;

use Carbon\Carbon;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ActivitiesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('date_time', 'desc')
            ->striped()
            ->columns([

                TextColumn::make('type')
                    ->label('Actividad')
                    ->badge()
                    ->weight(FontWeight::Bold)
                    ->icon(fn ($state) => match (mb_strtolower($state)) {
                        'vacunación', 'vacunacion' => 'heroicon-m-shield-check',
                        'consulta' => 'heroicon-m-heart',
                        'desparasitación', 'desparasitacion' => 'heroicon-m-beaker',
                        'cirugía', 'cirugia' => 'heroicon-m-scissors',
                        'baño', 'bano' => 'heroicon-m-sparkles',
                        default => 'heroicon-m-calendar-days',
                    })
                    ->color(fn ($state) => match (mb_strtolower($state)) {
                        'vacunación', 'vacunacion' => 'success',
                        'consulta' => 'info',
                        'desparasitación', 'desparasitacion' => 'warning',
                        'cirugía', 'cirugia' => 'danger',
                        'baño', 'bano' => 'primary',
                        default => 'gray',
                    })
                    ->searchable(),

                TextColumn::make('pet.name')
                    ->label('🐾 Mascota')
                    ->icon('heroicon-m-heart')
                    ->iconColor('danger')
                    ->weight(FontWeight::Bold)
                    ->color('primary')
                    ->description('Paciente')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('date_time')
                    ->label('📅 Fecha programada')
                    ->badge()
                    ->icon('heroicon-m-calendar-days')
                    ->color(fn ($record) => Carbon::parse($record->date_time)->isPast() ? 'danger' : 'success')
                    ->dateTime('d/m/Y H:i')
                    ->description(fn ($record) => Carbon::parse($record->date_time)->diffForHumans())
                    ->tooltip(fn ($record) => Carbon::parse($record->date_time)->translatedFormat('l d \\d\\e F \\d\\e Y - H:i'))
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Creado')
                    ->icon('heroicon-m-plus-circle')
                    ->badge()
                    ->color('success')
                    ->formatStateUsing(fn ($state) => Carbon::parse($state)->diffForHumans())
                    ->tooltip(fn ($record) => Carbon::parse($record->created_at)->format('d/m/Y H:i'))
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Actualizado')
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
                    ->tooltip('Ver actividad'),

                EditAction::make()
                    ->label('')
                    ->icon('heroicon-m-pencil-square')
                    ->color('warning')
                    ->tooltip('Editar actividad'),

            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])

            ->emptyStateIcon('heroicon-o-calendar-days')
            ->emptyStateHeading('No hay actividades registradas')
            ->emptyStateDescription('Cuando registres una actividad aparecerá aquí.')

            ->paginated([10, 25, 50]);
    }
}