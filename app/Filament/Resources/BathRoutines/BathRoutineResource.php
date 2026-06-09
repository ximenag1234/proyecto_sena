<?php

namespace App\Filament\Resources\BathRoutines;

use App\Filament\Resources\BathRoutines\Pages\CreateBathRoutine;
use App\Filament\Resources\BathRoutines\Pages\EditBathRoutine;
use App\Filament\Resources\BathRoutines\Pages\ListBathRoutines;
use App\Filament\Resources\BathRoutines\Pages\ViewBathRoutine;
use App\Filament\Resources\BathRoutines\Schemas\BathRoutineForm;
use App\Filament\Resources\BathRoutines\Schemas\BathRoutineInfolist;
use App\Filament\Resources\BathRoutines\Tables\BathRoutinesTable;
use App\Models\BathRoutine;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BathRoutineResource extends Resource
{
    protected static ?string $model = BathRoutine::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Bathroutine';

    public static function form(Schema $schema): Schema
    {
        return BathRoutineForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return BathRoutineInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BathRoutinesTable::configure($table);
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
            'index' => ListBathRoutines::route('/'),
            'create' => CreateBathRoutine::route('/create'),
            'view' => ViewBathRoutine::route('/{record}'),
            'edit' => EditBathRoutine::route('/{record}/edit'),
        ];
    }
}
