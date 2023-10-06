<?php

namespace App\Filament\Widgets;

use App\Models\Unit;
use App\Models\Tenant;
use App\Models\Expense;
use App\Models\RentalIncome;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $total_rent = DB::table('rental_incomes')->sum('income');
        $total_parking = DB::table('rental_incomes')->sum('parking_fee');
        $total_expenses = DB::table('expenses')->sum('amount');
        $total_expenses_cash = DB::table('expenses')
            ->where('payment_mode', '=', 'cash')
            ->sum('amount');
        $total_expenses_digital = DB::table('expenses')
            ->where('payment_mode', '=', 'digital')
            ->sum('amount');
        $total_expenses_cheque = DB::table('expenses')
            ->where('payment_mode', '=', 'cheque')
            ->sum('amount');
        $total_applicants = DB::table('intents')
            ->whereMonth('intents.created_at', Carbon::now())
            ->where('status', '=', 'submitted')
            ->count();
        $total_parking_occupied = DB::table('tenants')
            ->where('is_current', '=', true)
            ->where('has_parking', '=', true)
            ->count();
        $total_income = $total_rent + $total_parking;
        $formatted_income = number_format($total_income);
        $formatted_expenses = number_format($total_expenses);
        $formatted_expenses_cash = number_format($total_expenses_cash);
        $formatted_expenses_digital = number_format($total_expenses_digital);
        $formatted_expenses_cheque = number_format($total_expenses_cheque);
        $formatted_rent = number_format($total_rent);
        $formatted_parking = number_format($total_parking);
        return [
            // Card::make('Primary Tenants', Tenant::all()->where('is_current', '=', true)->where('is_primary', '=', true)->count())
            //     ->url('admin/tenants/')
            //     ->description('Current: ' . Tenant::where('is_current', '=', true)->count()),

            Card::make('Total Income', '₱ ' . $formatted_income)
                ->url('admin/tenants/')
                ->description('Rent: ₱' . $formatted_rent . ' Parking: ₱' . $formatted_parking)
                ->descriptionIcon('heroicon-s-trending-up')
                ->color('success'),

            // ->chart([7, 2, 10, 3, 15, 4, 17])
            // ->descriptionIcon('heroicon-s-trending-up'),
            Card::make('Total Expenses', '₱ ' . $formatted_expenses)
                ->description('Cash: ₱' . $formatted_expenses_cash . ' | Digital: ₱' . $formatted_expenses_digital . ' | Cheque: ₱' . $formatted_expenses_cheque)
                // ->descriptionIcon('heroicon-s-trending-up')
                ->color('danger'),
            // Card::make('Applicants (this month)', $total_applicants)
            // ->description('Cash: ₱' . $formatted_expenses_cash . ' | Digital: ₱' . $formatted_expenses_digital . ' | Cheque: ₱' . $formatted_expenses_cheque)
            // ->color('success'),
            Card::make('Occupied Units', Unit::all()
                // ->where('is_primary', '=', true)
                ->where('status', '=', 'occupied')
                ->count())
                ->description('Out of ' . Unit::all()->count() . ' units, with ' . $total_parking_occupied . ' parking')
                ->url('admin/units/'),
            // ->description('3% increase')
            // ->descriptionIcon('heroicon-s-trending-up'),

            // ->descriptionIcon('heroicon-s-trending-down'),

        ];
    }
}
