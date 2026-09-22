<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('name')
                    ->label('Usuario')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->description(fn ($record) => $record->email)
                    ->icon('heroicon-o-user'),

                TextColumn::make('roles.name')
                    ->label('Rol')
                    ->badge()
                    ->searchable()
                    ->sortable()
                    ->separator(', ')
                    ->color(fn (string $state): string => match ($state) {
                        'super_admin' => 'danger',
                        'admin' => 'warning',
                        'user' => 'success',
                        default => 'gray',
                    }),

                IconColumn::make('email_verified_at')
                    ->label('Correo')
                    ->boolean()
                    ->getStateUsing(
                        fn ($record) => ! is_null($record->email_verified_at)
                    )
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->tooltip(
                        fn ($record) => $record->email_verified_at
                            ? 'Correo verificado'
                            : 'Correo no verificado'
                    ),

                TextColumn::make('created_at')
                    ->label('Registrado')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('updated_at')
                    ->label('Última actualización')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])

            ->filters([

                SelectFilter::make('roles')
                    ->label('Filtrar por rol')
                    ->relationship('roles', 'name')
                    ->multiple()
                    ->preload(),

                SelectFilter::make('email_verified_at')
                    ->label('Estado del correo')
                    ->options([
                        'verified' => 'Verificado',
                        'unverified' => 'No verificado',
                    ])
                    ->query(function ($query, array $data) {
                        if ($data['value'] === 'verified') {
                            $query->whereNotNull('email_verified_at');
                        }

                        if ($data['value'] === 'unverified') {
                            $query->whereNull('email_verified_at');
                        }
                    }),
            ])

            ->recordActions([
                EditAction::make()
                    ->label('Editar')
                    ->icon('heroicon-o-pencil-square'),
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label('Eliminar seleccionados')
                        ->requiresConfirmation(),
                ]),
            ])

            ->defaultSort('created_at', 'desc');
    }
}