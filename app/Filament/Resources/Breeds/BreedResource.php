<?php

namespace App\Filament\Resources\Breeds;

use App\Filament\Resources\Breeds\Pages\CreateBreed;
use App\Filament\Resources\Breeds\Pages\EditBreed;
use App\Filament\Resources\Breeds\Pages\ListBreeds;
use App\Filament\Resources\Breeds\Pages\ViewBreed;
use App\Filament\Resources\Breeds\Schemas\BreedForm;
use App\Filament\Resources\Breeds\Schemas\BreedInfolist;
use App\Filament\Resources\Breeds\Tables\BreedsTable;
use App\Models\Breed;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BreedResource extends Resource
{
    protected static ?string $model = Breed::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTag;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationLabel = 'Raza';

    protected static ?string $modelLabel = 'Raza';

    protected static ?string $pluralModelLabel = 'Razas';

    public static function form(Schema $schema): Schema
    {
        return BreedForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return BreedInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BreedsTable::configure($table);
    }

    /**
     * Campos que buscará la barra superior.
     */
    public static function getGloballySearchableAttributes(): array
    {
        return [
            'name',
            'species.name',
            'size',
        ];
    }

    /**
     * Título del resultado.
     */
    public static function getGlobalSearchResultTitle($record): string
    {
        return $record->name;
    }

    /**
     * Información que aparece debajo del resultado.
     */
    public static function getGlobalSearchResultDetails($record): array
    {
        return [
            'Especie' => $record->species?->name ?? 'Sin especie',
            'Tamaño' => $record->size ?? 'Sin tamaño',
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
            'index' => ListBreeds::route('/'),
            'create' => CreateBreed::route('/create'),
            'view' => ViewBreed::route('/{record}'),
            'edit' => EditBreed::route('/{record}/edit'),
        ];
    }
}