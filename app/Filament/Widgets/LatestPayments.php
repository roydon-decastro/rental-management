<?php

namespace App\Filament\Widgets;

use Closure;
use Filament\Tables;
use App\Models\Payment;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestPayments extends BaseWidget
{
    protected static ?int $sort = 2;
    protected function getTableQuery(): Builder
    {
        return Payment::query()->latest();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('bill.unit_name')->label('Unit'),
            TextColumn::make('bill.tenant_name')->label('Tenant'),
            TextColumn::make('pay_amount')->label('Amount'),
            TextColumn::make('pay_date')->dateTime('F d, Y')->label('Date'),

        ];
    }
}
