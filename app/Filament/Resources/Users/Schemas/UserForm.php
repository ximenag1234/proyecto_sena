<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Información del usuario')
                    ->description('Datos básicos de la cuenta del usuario.')
                    ->icon('heroicon-o-user')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nombre completo')
                                    ->placeholder('Ej. Juan Pérez')
                                    ->required()
                                    ->maxLength(255)
                                    ->autocomplete('name'),

                                TextInput::make('email')
                                    ->label('Correo electrónico')
                                    ->placeholder('usuario@ejemplo.com')
                                    ->email()
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(ignoreRecord: true)
                                    ->autocomplete('email'),
                            ]),
                    ]),

                Section::make('Acceso y permisos')
                    ->description('Configura el rol y las credenciales de acceso.')
                    ->icon('heroicon-o-shield-check')
                    ->schema([
                        Grid::make(2)
                            ->schema([

                                Select::make('roles')
                                    ->label('Rol')
                                    ->relationship('roles', 'name')
                                    ->multiple()
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->placeholder('Selecciona un rol')
                                    ->helperText('Puedes asignar uno o varios roles al usuario.'),

                                DateTimePicker::make('email_verified_at')
                                    ->label('Correo verificado')
                                    ->placeholder('Selecciona una fecha')
                                    ->native(false)
                                    ->seconds(false),
                            ]),

                        Grid::make(2)
                            ->schema([
                                TextInput::make('password')
                                    ->label('Contraseña')
                                    ->password()
                                    ->revealable()
                                    ->autocomplete('new-password')
                                    ->minLength(8)
                                    ->dehydrated(fn ($state) => filled($state))
                                    ->required(fn (string $operation): bool => $operation === 'create')
                                    ->helperText(
                                        fn (string $operation): ?string =>
                                            $operation === 'edit'
                                                ? 'Déjalo vacío si no deseas cambiar la contraseña.'
                                                : 'La contraseña debe tener al menos 8 caracteres.'
                                    ),

                                TextInput::make('password_confirmation')
                                    ->label('Confirmar contraseña')
                                    ->password()
                                    ->revealable()
                                    ->same('password')
                                    ->dehydrated(false)
                                    ->required(fn (string $operation): bool => $operation === 'create')
                                    ->placeholder('Repite la contraseña'),
                            ]),
                    ]),
            ]);
    }
}