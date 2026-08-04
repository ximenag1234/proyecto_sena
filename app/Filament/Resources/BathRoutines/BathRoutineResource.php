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

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedStar;

    protected static ?string $recordTitleAttribute = 'bath_type';

    protected static ?string $navigationLabel = 'Rutina de Baño';

    protected static ?string $modelLabel = 'Rutina de Baño';

    protected static ?string $pluralModelLabel = 'Rutinas de Baño';

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

    /**
     * Campos que buscará la barra superior.
     */
    public static function getGloballySearchableAttributes(): array
    {
        return [
            'bath_type',
            'frequency',
            'pet.name',
        ];
    }

    /**
     * Título del resultado.
     */
    public static function getGlobalSearchResultTitle($record): string
    {
        return $record->bath_type ?? 'Rutina de Baño';
    }

    /**
     * Información adicional del resultado.
     */
    public static function getGlobalSearchResultDetails($record): array
    {
        return [
            'Mascota' => $record->pet?->name ?? 'Sin mascota',
            'Frecuencia' => $record->frequency ?? 'No registrada',
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
            'index' => ListBathRoutines::route('/'),
            'create' => CreateBathRoutine::route('/create'),
            'view' => ViewBathRoutine::route('/{record}'),
            'edit' => EditBathRoutine::route('/{record}/edit'),
        ];
    }
}