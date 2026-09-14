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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class BathRoutineResource extends Resource
{
    protected static ?string $model = BathRoutine::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedStar;

    protected static ?string $recordTitleAttribute = 'frequency';

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

    public static function canAccess(): bool
    {
        return auth()->check();
    }

    public static function canViewAny(): bool
    {
        return auth()->check();
    }

    public static function canCreate(): bool
    {
        return auth()->check();
    }

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

    public static function getGloballySearchableAttributes(): array
    {
        return [
            'frequency',
            'age_min',
            'age_max',
            'breed.name',
        ];
    }

    public static function getGlobalSearchResultTitle($record): string
    {
        return 'Rutina: ' . ($record->frequency ?? 'Sin frecuencia');
    }

    public static function getGlobalSearchResultDetails($record): array
    {
        return [
            'Raza' => $record->breed?->name ?? 'Sin raza',
            'Frecuencia' => $record->frequency ?? 'No registrada',
            'Edad mínima' => $record->age_min ?? 'No registrada',
            'Edad máxima' => $record->age_max ?? 'No registrada',
        ];
    }

    public static function getRelations(): array
    {
        return [];
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