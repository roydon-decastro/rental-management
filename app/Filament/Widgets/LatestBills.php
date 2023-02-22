<?php

namespace App\Filament\Widgets;

use Closure;
use App\Models\Bill;
use App\Models\Unit;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestBills extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getTableQuery(): Builder
    {
        return Bill::query()->latest();


        // return Unit::query()->latest();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('unit_name')->label('Unit'),
            TextColumn::make('tenant_name')->label('Tenant'),
            TextColumn::make('total_amount_due')->label('Amount'),
            TextColumn::make('bill_date')->label('Date'),
        ];
    }
}
