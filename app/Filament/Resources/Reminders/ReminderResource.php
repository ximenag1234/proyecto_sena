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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

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
     * Admin y user pueden consultar recordatorios.
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
     * Filtra los recordatorios según el propietario de la mascota.
     *
     * ADMIN:
     * Puede ver todos.
     *
     * USER:
     * Solo puede ver recordatorios de sus propias mascotas.
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
     * Protege la visualización de un recordatorio específico.
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
            'status',
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
            'Estado' => $record->status ?? 'Sin estado',
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
            'index' => ListReminders::route('/'),
            'create' => CreateReminder::route('/create'),
            'view' => ViewReminder::route('/{record}'),
            'edit' => EditReminder::route('/{record}/edit'),
        ];
    }
}