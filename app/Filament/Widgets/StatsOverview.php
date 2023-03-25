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
            Card::make('Primary Tenants', Tenant::all()->where('is_current', '=', true)->where('is_primary', '=', true)->count())
            ->url('admin/tenants/')
            ->description('Current: ' . Tenant::where('is_current', '=', true)->count()),

            // ->chart([7, 2, 10, 3, 15, 4, 17])
            // ->descriptionIcon('heroicon-s-trending-up'),
            Card::make('Occupied Units', Tenant::all()
            ->where('is_primary', '=', true)
            ->count())
            ->description('Out of ' . Unit::all()->count() . ' units')
            ->url('admin/units/'),
            // ->description('3% increase')
            // ->descriptionIcon('heroicon-s-trending-up'),
            Card::make('With Parking', Tenant::all()->where('has_parking', '=', true)->count())
            ->url('admin/tenants?tableFilters[is_current][isActive]=0&tableFilters[is_primary][isActive]=0&tableFilters[has_parking][isActive]=1&tableSortColumn=created_at&tableSortDirection=desc'),
            // ->descriptionIcon('heroicon-s-trending-down'),

        ];
    }
}
