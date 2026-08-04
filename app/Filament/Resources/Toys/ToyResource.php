<?php

namespace App\Filament\Resources\Toys;

use App\Filament\Resources\Toys\Pages\CreateToy;
use App\Filament\Resources\Toys\Pages\EditToy;
use App\Filament\Resources\Toys\Pages\ListToys;
use App\Filament\Resources\Toys\Pages\ViewToy;
use App\Filament\Resources\Toys\Schemas\ToyForm;
use App\Filament\Resources\Toys\Schemas\ToyInfolist;
use App\Filament\Resources\Toys\Tables\ToysTable;
use App\Models\Toy;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ToyResource extends Resource
{
    protected static ?string $model = Toy::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedGift;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationLabel = 'Juguete';

    protected static ?string $modelLabel = 'Juguete';

    protected static ?string $pluralModelLabel = 'Juguetes';

    public static function form(Schema $schema): Schema
    {
        return ToyForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ToyInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ToysTable::configure($table);
    }

    /**
     * Campos que se buscarán en la barra superior.
     */
    public static function getGloballySearchableAttributes(): array
    {
        return [
            'name',
            'type',
        ];
    }

    /**
     * Título del resultado de búsqueda.
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
            'Tipo' => $record->type ?? 'Sin tipo',
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
            'index' => ListToys::route('/'),
            'create' => CreateToy::route('/create'),
            'view' => ViewToy::route('/{record}'),
            'edit' => EditToy::route('/{record}/edit'),
        ];
    }
}