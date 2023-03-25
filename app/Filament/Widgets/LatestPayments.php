<?php

namespace App\Filament\Widgets;

use Closure;
use Carbon\Carbon;
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
        return Payment::query()
        ->whereMonth('payments.pay_date', Carbon::now()->month)
        // ->orderBy('payments->unit->name');
            ->latest('pay_date');
        // return Payment::latest()->get();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('bill.unit_name')->label('Unit'),
            TextColumn::make('bill.tenant_name')->label('Tenant'),
            TextColumn::make('pay_amount')->label('Amount'),
            TextColumn::make('pay_date')->dateTime('F d, Y')->label('Date'),
            TextColumn::make('pay_method'),

        ];
    }
}
