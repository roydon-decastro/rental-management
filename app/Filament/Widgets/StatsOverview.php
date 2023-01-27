<?php

namespace App\Filament\Widgets;

use App\Models\Tenant;
use App\Models\Unit;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Current Tenants', Tenant::all()->where('is_current', '=', true)->count()),
            // ->description('32k increase')
            // ->chart([7, 2, 10, 3, 15, 4, 17])
            // ->descriptionIcon('heroicon-s-trending-up'),
            Card::make('Occupied Units', Tenant::all()
                ->where('is_primary', '=', true)
                ->count())
                ->description('Out of ' . Unit::all()->count() . ' units'),
            // ->description('3% increase')
            // ->descriptionIcon('heroicon-s-trending-up'),
            Card::make('With Parking', Tenant::all()->where('has_parking', '=', true)->count())
            // ->descriptionIcon('heroicon-s-trending-down'),

        ];
    }
}
