<?php

namespace App\Filament\Resources\Medications;

use App\Filament\Resources\Medications\Pages\CreateMedication;
use App\Filament\Resources\Medications\Pages\EditMedication;
use App\Filament\Resources\Medications\Pages\ListMedications;
use App\Filament\Resources\Medications\Pages\ViewMedication;
use App\Filament\Resources\Medications\Schemas\MedicationForm;
use App\Filament\Resources\Medications\Schemas\MedicationInfolist;
use App\Filament\Resources\Medications\Tables\MedicationsTable;
use App\Models\Medication;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MedicationResource extends Resource
{
    protected static ?string $model = Medication::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBeaker;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationLabel = 'Medicamento';

    protected static ?string $modelLabel = 'Medicamento';

    protected static ?string $pluralModelLabel = 'Medicamentos';

    public static function form(Schema $schema): Schema
    {
        return MedicationForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return MedicationInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MedicationsTable::configure($table);
    }

    /**
     * Campos que buscará la barra superior.
     */
    public static function getGloballySearchableAttributes(): array
    {
        return [
            'name',
        ];
    }

    /**
     * Título del resultado.
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
            'Medicamento' => $record->name,
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
            'index' => ListMedications::route('/'),
            'create' => CreateMedication::route('/create'),
            'view' => ViewMedication::route('/{record}'),
            'edit' => EditMedication::route('/{record}/edit'),
        ];
    }
}