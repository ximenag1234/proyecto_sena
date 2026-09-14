<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // ==========================================
                // INFORMACIÓN PERSONAL
                // ==========================================

                Section::make('Información del usuario')
                    ->description(
                        'Registra los datos principales de la cuenta del usuario.'
                    )
                    ->icon('heroicon-o-user')
                    ->iconColor('primary')
                    ->columns(2)
                    ->schema([

                        TextInput::make('name')
                            ->label('Nombre completo')
                            ->placeholder('Ej: Juan Pérez')
                            ->prefixIcon('heroicon-o-user')
                            ->required()
                            ->maxLength(150)
                            ->autofocus()
                            ->helperText(
                                'Escribe el nombre completo del usuario.'
                            ),

                        TextInput::make('email')
                            ->label('Correo electrónico')
                            ->placeholder('Ej: usuario@correo.com')
                            ->prefixIcon('heroicon-o-envelope')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->helperText(
                                'Utiliza una dirección de correo válida.'
                            ),

                        // ==========================================
                        // ROLES
                        // ==========================================

                        Select::make('roles')
                            ->label('🛡️ Roles')
                            ->placeholder('Selecciona uno o varios roles')
                            ->prefixIcon('heroicon-o-shield-check')
                            ->relationship(
                                name: 'roles',
                                titleAttribute: 'name',
                            )
                            ->multiple()
                            ->searchable()
                            ->preload()
                            ->native(false)
                            ->required()
                            ->helperText(
                                'Selecciona uno o varios roles para este usuario.'
                            )
                            ->columnSpanFull(),

                    ]),

                // ==========================================
                // SEGURIDAD DE LA CUENTA
                // ==========================================

                Section::make('Seguridad de la cuenta')
                    ->description(
                        'Administra la contraseña y el estado de verificación del correo.'
                    )
                    ->icon('heroicon-o-lock-closed')
                    ->iconColor('warning')
                    ->columns(2)
                    ->schema([

                        TextInput::make('password')
                            ->label('Contraseña')
                            ->placeholder('Ingresa una contraseña segura')
                            ->prefixIcon('heroicon-o-lock-closed')
                            ->password()
                            ->revealable()
                            ->minLength(8)
                            ->required(
                                fn (string $operation): bool =>
                                    $operation === 'create'
                            )
                            ->dehydrated(
                                fn (?string $state): bool =>
                                    filled($state)
                            )
                            ->helperText(
                                'Mínimo 8 caracteres. Déjalo vacío al editar si no deseas cambiarla.'
                            ),

                        DateTimePicker::make('email_verified_at')
                            ->label('Correo verificado el')
                            ->placeholder('Selecciona fecha y hora')
                            ->prefixIcon('heroicon-o-check-badge')
                            ->native(false)
                            ->seconds(false)
                            ->displayFormat('d/m/Y H:i')
                            ->helperText(
                                'Indica cuándo se verificó el correo electrónico.'
                            ),

                    ]),
            ]);
    }
}