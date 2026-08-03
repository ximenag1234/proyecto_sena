<?php

namespace App\Filament\Widgets;

use App\Models\Activity;
use App\Models\Breed;
use App\Models\Pet;
use App\Models\Reminder;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [

            Stat::make('Total Pets', Pet::count())
                ->description('Mascotas registradas')
                ->descriptionIcon('heroicon-m-face-smile')
                ->color('primary'),

            Stat::make(' Usuarios', User::count())
                ->description('Usuarios registrados')
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),

            Stat::make(' Razas', Breed::count())
                ->description('Razas disponibles')
                ->descriptionIcon('heroicon-m-tag')
                ->color('warning'),

            Stat::make('Recordatorios', Reminder::count())
                ->description('Recordatorios activos')
                ->descriptionIcon('heroicon-m-bell-alert')
                ->color('danger'),

            Stat::make(' Actividades', Activity::count())
                ->description('Actividades registradas')
                ->descriptionIcon('heroicon-m-bolt')
                ->color('info'),

        ];
    }
}