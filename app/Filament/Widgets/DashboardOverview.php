<?php

namespace App\Filament\Widgets;

use App\Models\Activity;
use App\Models\Pet;
use App\Models\Reminder;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $user = auth()->user();

        // ==========================================
        // ADMINISTRADOR
        // ==========================================
        if ($user?->hasRole('admin')) {
            return [

                Stat::make('Total Pets', Pet::count())
                    ->description('Todas las mascotas registradas')
                    ->descriptionIcon('heroicon-m-face-smile')
                    ->color('primary'),

                Stat::make('Usuarios', User::count())
                    ->description('Todos los usuarios registrados')
                    ->descriptionIcon('heroicon-m-users')
                    ->color('success'),

                Stat::make('Razas', Pet::whereNotNull('breed_id')
                    ->distinct('breed_id')
                    ->count('breed_id'))
                    ->description('Razas utilizadas')
                    ->descriptionIcon('heroicon-m-tag')
                    ->color('warning'),

                Stat::make('Recordatorios', Reminder::count())
                    ->description('Todos los recordatorios')
                    ->descriptionIcon('heroicon-m-bell-alert')
                    ->color('danger'),

                Stat::make('Actividades', Activity::count())
                    ->description('Todas las actividades')
                    ->descriptionIcon('heroicon-m-bolt')
                    ->color('info'),

            ];
        }

        // ==========================================
        // USUARIO NORMAL
        // ==========================================

        $petQuery = Pet::query()
            ->where('user_id', $user?->id);

        $petCount = (clone $petQuery)->count();

        $breedCount = (clone $petQuery)
            ->whereNotNull('breed_id')
            ->distinct('breed_id')
            ->count('breed_id');

        $reminderCount = Reminder::whereHas('pet', function ($query) use ($user) {
            $query->where('user_id', $user?->id);
        })->count();

        $activityCount = Activity::whereHas('pet', function ($query) use ($user) {
            $query->where('user_id', $user?->id);
        })->count();

        return [

            Stat::make('Mis mascotas', $petCount)
                ->description('Mascotas que has registrado')
                ->descriptionIcon('heroicon-m-face-smile')
                ->color('primary'),

            Stat::make('Mi cuenta', '1')
                ->description('Usuario actual')
                ->descriptionIcon('heroicon-m-user')
                ->color('success'),

            Stat::make('Mis razas', $breedCount)
                ->description('Razas de tus mascotas')
                ->descriptionIcon('heroicon-m-tag')
                ->color('warning'),

            Stat::make('Mis recordatorios', $reminderCount)
                ->description('Recordatorios de tus mascotas')
                ->descriptionIcon('heroicon-m-bell-alert')
                ->color('danger'),

            Stat::make('Mis actividades', $activityCount)
                ->description('Actividades de tus mascotas')
                ->descriptionIcon('heroicon-m-bolt')
                ->color('info'),

        ];
    }
}