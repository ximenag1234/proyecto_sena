<?php

namespace App\Filament\Resources\HealthConditions;

use App\Filament\Resources\HealthConditions\Pages\CreateHealthCondition;
use App\Filament\Resources\HealthConditions\Pages\EditHealthCondition;
use App\Filament\Resources\HealthConditions\Pages\ListHealthConditions;
use App\Filament\Resources\HealthConditions\Pages\ViewHealthCondition;
use App\Filament\Resources\HealthConditions\Schemas\HealthConditionForm;
use App\Filament\Resources\HealthConditions\Schemas\HealthConditionInfolist;
use App\Filament\Resources\HealthConditions\Tables\HealthConditionsTable;
use App\Models\HealthCondition;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class HealthConditionResource extends Resource
{
    protected static ?string $model = HealthCondition::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedHeart;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationLabel = 'Condición de salud';

    protected static ?string $modelLabel = 'Condición de salud';

    protected static ?string $pluralModelLabel = 'Condiciones de salud';

    public static function form(Schema $schema): Schema
    {
        return HealthConditionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return HealthConditionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HealthConditionsTable::configure($table);
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
            'name',
            'description',
        ];
    }

    public static function getGlobalSearchResultTitle($record): string
    {
        return $record->name;
    }

    public static function getGlobalSearchResultDetails($record): array
    {
        return [
            'Condición' => $record->name,
        ];
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHealthConditions::route('/'),
            'create' => CreateHealthCondition::route('/create'),
            'view' => ViewHealthCondition::route('/{record}'),
            'edit' => EditHealthCondition::route('/{record}/edit'),
        ];
    }
}