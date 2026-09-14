<?php

namespace App\Filament\Resources\Activities;

use App\Filament\Resources\Activities\Pages\CreateActivity;
use App\Filament\Resources\Activities\Pages\EditActivity;
use App\Filament\Resources\Activities\Pages\ListActivities;
use App\Filament\Resources\Activities\Pages\ViewActivity;
use App\Filament\Resources\Activities\Schemas\ActivityForm;
use App\Filament\Resources\Activities\Schemas\ActivityInfolist;
use App\Filament\Resources\Activities\Tables\ActivitiesTable;
use App\Models\Activity;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ActivityResource extends Resource
{
    protected static ?string $model = Activity::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBolt;

    protected static ?string $recordTitleAttribute = 'type';

    protected static ?string $navigationLabel = 'Actividad';

    protected static ?string $modelLabel = 'Actividad';

    protected static ?string $pluralModelLabel = 'Actividades';

    public static function form(Schema $schema): Schema
    {
        return ActivityForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ActivityInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ActivitiesTable::configure($table);
    }

    /**
     * Admin y user pueden consultar actividades.
     */
    public static function canAccess(): bool
    {
        return auth()->check();
    }

    public static function canViewAny(): bool
    {
        return auth()->check();
    }

    /**
     * Filtra las actividades según el propietario de la mascota.
     *
     * ADMIN:
     * Puede ver todas.
     *
     * USER:
     * Solo puede ver actividades de sus propias mascotas.
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

        return $query->whereHas('pet', function (Builder $petQuery) {
            $petQuery->where('user_id', auth()->id());
        });
    }

    /**
     * Protege la visualización de una actividad específica.
     */
    public static function canView(Model $record): bool
    {
        if (! auth()->check()) {
            return false;
        }

        if (auth()->user()->hasRole('admin')) {
            return true;
        }

        return (int) $record->pet?->user_id === (int) auth()->id();
    }

    /**
     * Protege la edición.
     */
    public static function canEdit(Model $record): bool
    {
        if (! auth()->check()) {
            return false;
        }

        if (auth()->user()->hasRole('admin')) {
            return true;
        }

        return (int) $record->pet?->user_id === (int) auth()->id();
    }

    /**
     * Protege la eliminación.
     */
    public static function canDelete(Model $record): bool
    {
        if (! auth()->check()) {
            return false;
        }

        if (auth()->user()->hasRole('admin')) {
            return true;
        }

        return (int) $record->pet?->user_id === (int) auth()->id();
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [
            'type',
            'pet.name',
        ];
    }

    public static function getGlobalSearchResultTitle($record): string
    {
        return $record->type;
    }

    public static function getGlobalSearchResultDetails($record): array
    {
        return [
            'Mascota' => $record->pet?->name ?? 'Sin mascota',
            'Fecha' => optional($record->date_time)?->format('d/m/Y H:i'),
        ];
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListActivities::route('/'),
            'create' => CreateActivity::route('/create'),
            'view' => ViewActivity::route('/{record}'),
            'edit' => EditActivity::route('/{record}/edit'),
        ];
    }
}