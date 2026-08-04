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
     * CAMPOS QUE SE BUSCARÁN EN LA BARRA SUPERIOR
     */
    public static function getGloballySearchableAttributes(): array
    {
        return [
            'type',
            'pet.name',
        ];
    }

    /**
     * TÍTULO DEL RESULTADO
     */
    public static function getGlobalSearchResultTitle($record): string
    {
        return $record->type;
    }

    /**
     * INFORMACIÓN ADICIONAL DEL RESULTADO
     */
    public static function getGlobalSearchResultDetails($record): array
    {
        return [
            'Mascota' => $record->pet?->name ?? 'Sin mascota',
            'Fecha' => optional($record->date_time)?->format('d/m/Y H:i'),
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
            'index' => ListActivities::route('/'),
            'create' => CreateActivity::route('/create'),
            'view' => ViewActivity::route('/{record}'),
            'edit' => EditActivity::route('/{record}/edit'),
        ];
    }
}