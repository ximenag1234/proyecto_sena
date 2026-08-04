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
     * Campos que buscará la barra superior de Filament.
     */
    public static function getGloballySearchableAttributes(): array
    {
        return [
            'name',
            'breed.name',
            'user.name',
            'species',
        ];
    }

    /**
     * Título que aparecerá en el resultado de búsqueda.
     */
    public static function getGlobalSearchResultTitle($record): string
    {
        return $record->name;
    }

    /**
     * Información adicional debajo del resultado.
     */
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
        return [
            //
        ];
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