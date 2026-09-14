<?php

namespace App\Filament\Resources\FeedingPlans\Pages;

use App\Filament\Resources\FeedingPlans\FeedingPlanResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditFeedingPlan extends EditRecord
{
    protected static string $resource = FeedingPlanResource::class;

    public function mount(int|string $record): void
    {
        abort_unless(
            auth()->check() && auth()->user()->hasRole('admin'),
            403
        );

        parent::mount($record);
    }

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}