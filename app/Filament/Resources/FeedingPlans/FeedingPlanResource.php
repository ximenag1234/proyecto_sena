<?php

namespace App\Filament\Resources\FeedingPlans;

use App\Filament\Resources\FeedingPlans\Pages\CreateFeedingPlan;
use App\Filament\Resources\FeedingPlans\Pages\EditFeedingPlan;
use App\Filament\Resources\FeedingPlans\Pages\ListFeedingPlans;
use App\Filament\Resources\FeedingPlans\Pages\ViewFeedingPlan;
use App\Filament\Resources\FeedingPlans\Schemas\FeedingPlanForm;
use App\Filament\Resources\FeedingPlans\Schemas\FeedingPlanInfolist;
use App\Filament\Resources\FeedingPlans\Tables\FeedingPlansTable;
use App\Models\FeedingPlan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class FeedingPlanResource extends Resource
{
    protected static ?string $model = FeedingPlan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCake;

    protected static ?string $recordTitleAttribute = 'food_type';

    protected static ?string $navigationLabel = 'Plan de alimentación';

    protected static ?string $modelLabel = 'Plan de alimentación';

    protected static ?string $pluralModelLabel = 'Planes de alimentación';

    public static function form(Schema $schema): Schema
    {
        return FeedingPlanForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return FeedingPlanInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FeedingPlansTable::configure($table);
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
            'food_type',
            'amount',
            'frequency',
            'breed.name',
        ];
    }

    public static function getGlobalSearchResultTitle($record): string
    {
        return $record->food_type;
    }

    public static function getGlobalSearchResultDetails($record): array
    {
        return [
            'Raza' => $record->breed?->name ?? 'Sin raza',
            'Cantidad' => $record->amount,
            'Frecuencia' => $record->frequency,
        ];
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFeedingPlans::route('/'),
            'create' => CreateFeedingPlan::route('/create'),
            'view' => ViewFeedingPlan::route('/{record}'),
            'edit' => EditFeedingPlan::route('/{record}/edit'),
        ];
    }
}