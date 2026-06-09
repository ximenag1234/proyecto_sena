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

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Toy.php';

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
