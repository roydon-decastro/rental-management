<?php

namespace App\Filament\Widgets;

use Closure;
use Carbon\Carbon;
use App\Models\Bill;
use App\Models\Unit;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestBills extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getTableQuery(): Builder
    {
        return Bill::query()
                    // ->where('is_paid', '=', null)
                    ->whereMonth('bills.created_at', Carbon::now()->month)
                    ->orderBy('bills.unit_name');
                    // ->oldest();


        // return Unit::query()->latest();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('unit_name')->label('Unit'),
            TextColumn::make('tenant_name')->label('Tenant'),
            TextColumn::make('total_amount_due')->label('Amount'),
            IconColumn::make('is_paid')->boolean()->label('Paid'),
            TextColumn::make('created_at')
                ->dateTime('F d, Y')
                ->label('Date'),
        ];
    }
}
