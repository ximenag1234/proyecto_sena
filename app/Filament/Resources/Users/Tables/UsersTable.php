<?php

namespace App\Filament\Resources\Users\Tables;

use Carbon\Carbon;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->striped()

            ->columns([

                /*
                |--------------------------------------------------------------------------
                | Usuario
                |--------------------------------------------------------------------------
                */
                TextColumn::make('name')
                    ->label('👤 Usuario')
                    ->weight(FontWeight::Bold)
                    ->icon('heroicon-m-user')
                    ->iconColor('primary')
                    ->color('primary')
                    ->description('Nombre del usuario')
                    ->searchable()
                    ->sortable(),

                /*
                |--------------------------------------------------------------------------
                | Correo electrónico
                |--------------------------------------------------------------------------
                */
                TextColumn::make('email')
                    ->label('📧 Correo electrónico')
                    ->badge()
                    ->icon('heroicon-m-envelope')
                    ->color('info')
                    ->copyable()
                    ->copyMessage('Correo copiado')
                    ->copyMessageDuration(1500)
                    ->searchable()
                    ->sortable(),

                /*
                |--------------------------------------------------------------------------
                | Roles - Filament Shield / Spatie Permission
                |--------------------------------------------------------------------------
                */
                TextColumn::make('roles.name')
                    ->label('🛡️ Roles')
                    ->badge()
                    ->icon('heroicon-m-shield-check')
                    ->separator(',')
                    ->color(fn (string $state): string => match ($state) {
                        'Super Admin' => 'danger',
                        'Admin' => 'warning',
                        'Administrador' => 'warning',
                        'Usuario' => 'info',
                        default => 'gray',
                    })
                    ->searchable()
                    ->sortable(),

                /*
                |--------------------------------------------------------------------------
                | Estado del correo
                |--------------------------------------------------------------------------
                */
                TextColumn::make('email_verified_at')
                    ->label('✅ Estado del correo')
                    ->badge()
                    ->icon(fn ($state) => $state
                        ? 'heroicon-m-check-circle'
                        : 'heroicon-m-x-circle')
                    ->color(fn ($state) => $state
                        ? 'success'
                        : 'danger')
                    ->formatStateUsing(fn ($state) => $state
                        ? 'Verificado'
                        : 'Sin verificar')
                    ->tooltip(fn ($record) => $record->email_verified_at
                        ? Carbon::parse($record->email_verified_at)->format('d/m/Y H:i')
                        : 'Este usuario aún no ha verificado su correo')
                    ->sortable(),

                /*
                |--------------------------------------------------------------------------
                | Fecha de creación
                |--------------------------------------------------------------------------
                */
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

                /*
                |--------------------------------------------------------------------------
                | Fecha de actualización
                |--------------------------------------------------------------------------
                */
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

            /*
            |--------------------------------------------------------------------------
            | Filtros
            |--------------------------------------------------------------------------
            */
            ->filters([
                //
            ])

            /*
            |--------------------------------------------------------------------------
            | Acciones por registro
            |--------------------------------------------------------------------------
            */
            ->recordActions([

                ViewAction::make()
                    ->label('')
                    ->icon('heroicon-m-eye')
                    ->color('info')
                    ->tooltip('Ver usuario'),

                EditAction::make()
                    ->label('')
                    ->icon('heroicon-m-pencil-square')
                    ->color('warning')
                    ->tooltip('Editar usuario'),

            ])

            /*
            |--------------------------------------------------------------------------
            | Acciones masivas
            |--------------------------------------------------------------------------
            */
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])

            /*
            |--------------------------------------------------------------------------
            | Estado vacío
            |--------------------------------------------------------------------------
            */
            ->emptyStateIcon('heroicon-o-users')
            ->emptyStateHeading('No hay usuarios registrados')
            ->emptyStateDescription(
                'Cuando registres un usuario aparecerá aquí.'
            )

            /*
            |--------------------------------------------------------------------------
            | Paginación
            |--------------------------------------------------------------------------
            */
            ->paginated([10, 25, 50]);
    }
}
