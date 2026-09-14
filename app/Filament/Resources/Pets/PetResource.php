<?php

namespace App\Filament\Resources\Pets;

use App\Filament\Resources\Pets\Pages\CreatePet;
use App\Filament\Resources\Pets\Pages\EditPet;
use App\Filament\Resources\Pets\Pages\ListPets;
use App\Filament\Resources\Pets\Pages\ViewPet;
use App\Filament\Resources\Pets\Schemas\PetForm;
use App\Filament\Resources\Pets\Schemas\PetInfolist;
use App\Filament\Resources\Pets\Tables\PetsTable;
use App\Models\Pet;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class PetResource extends Resource
{
    protected static ?string $model = Pet::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedFaceSmile;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationLabel = 'Mascota';

    protected static ?string $modelLabel = 'Mascota';

    protected static ?string $pluralModelLabel = 'Mascotas';

    public static function form(Schema $schema): Schema
    {
        return PetForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PetInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PetsTable::configure($table);
    }

    /**
     * Permite acceder al recurso únicamente a usuarios autenticados.
     */
    public static function canAccess(): bool
    {
        return auth()->check();
    }

    /**
     * Admin y user pueden consultar mascotas.
     */
    public static function canViewAny(): bool
    {
        return auth()->check();
    }

    /**
     * Limita las mascotas que aparecen en las consultas.
     *
     * ADMIN:
     * Puede ver todas.
     *
     * USER:
     * Solo puede ver sus propias mascotas.
     */
    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        if (! auth()->check()) {
            return $query->whereRaw('1 = 0');
        }

        if (auth()->user()->hasRole('admin')) {
            return $query;
        }

        return $query->where('user_id', auth()->id());
    }

    /**
     * Protege la visualización de una mascota específica.
     */
    public static function canView(Model $record): bool
    {
        if (! auth()->check()) {
            return false;
        }

        if (auth()->user()->hasRole('admin')) {
            return true;
        }

        return (int) $record->user_id === (int) auth()->id();
    }

    /**
     * Solo el admin puede editar cualquier mascota.
     * El user puede editar únicamente sus propias mascotas.
     */
    public static function canEdit(Model $record): bool
    {
        if (! auth()->check()) {
            return false;
        }

        if (auth()->user()->hasRole('admin')) {
            return true;
        }

        return (int) $record->user_id === (int) auth()->id();
    }

    /**
     * Solo el admin puede eliminar cualquier mascota.
     * El user puede eliminar únicamente sus propias mascotas.
     */
    public static function canDelete(Model $record): bool
    {
        if (! auth()->check()) {
            return false;
        }

        if (auth()->user()->hasRole('admin')) {
            return true;
        }

        return (int) $record->user_id === (int) auth()->id();
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [
            'name',
            'breed.name',
            'user.name',
            'species',
        ];
    }

    public static function getGlobalSearchResultTitle($record): string
    {
        return $record->name;
    }

    public static function getGlobalSearchResultDetails($record): array
    {
        return [
            'Dueño' => $record->user?->name ?? 'Sin dueño',
            'Raza' => $record->breed?->name ?? 'Sin raza',
            'Especie' => $record->species ?? 'Sin especie',
            'Peso' => $record->weight . ' kg',
        ];
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPets::route('/'),
            'create' => CreatePet::route('/create'),
            'view' => ViewPet::route('/{record}'),
            'edit' => EditPet::route('/{record}/edit'),
        ];
    }
}