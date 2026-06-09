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

class HealthConditionResource extends Resource
{
    protected static ?string $model = HealthCondition::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Healthcondition.php';

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

    public static function getRelations(): array
    {
        return [
            //
        ];
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
