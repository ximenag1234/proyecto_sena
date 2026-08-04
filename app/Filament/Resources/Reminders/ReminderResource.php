<?php

namespace App\Filament\Resources\Reminders;

use App\Filament\Resources\Reminders\Pages\CreateReminder;
use App\Filament\Resources\Reminders\Pages\EditReminder;
use App\Filament\Resources\Reminders\Pages\ListReminders;
use App\Filament\Resources\Reminders\Pages\ViewReminder;
use App\Filament\Resources\Reminders\Schemas\ReminderForm;
use App\Filament\Resources\Reminders\Schemas\ReminderInfolist;
use App\Filament\Resources\Reminders\Tables\RemindersTable;
use App\Models\Reminder;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ReminderResource extends Resource
{
    protected static ?string $model = Reminder::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBellAlert;

    protected static ?string $recordTitleAttribute = 'type';

    protected static ?string $navigationLabel = 'Recordatorio';

    protected static ?string $modelLabel = 'Recordatorio';

    protected static ?string $pluralModelLabel = 'Recordatorios';

    public static function form(Schema $schema): Schema
    {
        return ReminderForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ReminderInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RemindersTable::configure($table);
    }

    /**
     * Campos que se buscarán desde la barra superior.
     */
    public static function getGloballySearchableAttributes(): array
    {
        return [
            'type',
            'status',
            'pet.name',
        ];
    }

    /**
     * Título del resultado.
     */
    public static function getGlobalSearchResultTitle($record): string
    {
        return $record->type;
    }

    /**
     * Información adicional debajo del resultado.
     */
    public static function getGlobalSearchResultDetails($record): array
    {
        return [
            'Mascota' => $record->pet?->name ?? 'Sin mascota',
            'Estado' => $record->status ?? 'Sin estado',
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
            'index' => ListReminders::route('/'),
            'create' => CreateReminder::route('/create'),
            'view' => ViewReminder::route('/{record}'),
            'edit' => EditReminder::route('/{record}/edit'),
        ];
    }
}