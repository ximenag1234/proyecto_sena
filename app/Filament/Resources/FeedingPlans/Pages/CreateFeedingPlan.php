<?php

namespace App\Filament\Resources\FeedingPlans\Pages;

use App\Filament\Resources\FeedingPlans\FeedingPlanResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFeedingPlan extends CreateRecord
{
    protected static string $resource = FeedingPlanResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }
}