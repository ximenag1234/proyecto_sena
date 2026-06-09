<?php

namespace App\Filament\Resources\FeedingPlans\Pages;

use App\Filament\Resources\FeedingPlans\FeedingPlanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFeedingPlans extends ListRecords
{
    protected static string $resource = FeedingPlanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
