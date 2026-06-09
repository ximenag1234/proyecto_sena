<?php

namespace App\Filament\Resources\FeedingPlans\Pages;

use App\Filament\Resources\FeedingPlans\FeedingPlanResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewFeedingPlan extends ViewRecord
{
    protected static string $resource = FeedingPlanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
