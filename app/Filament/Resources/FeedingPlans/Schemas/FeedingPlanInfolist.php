<?php

namespace App\Filament\Resources\FeedingPlans\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class FeedingPlanInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('food_type'),
                TextEntry::make('amount'),
                TextEntry::make('frequency'),
                TextEntry::make('age_min')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('age_max')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('weight_min')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('weight_max')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('breed_id')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
