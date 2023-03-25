<?php

namespace App\Filament\Resources\BillResource\Pages;

use Closure;
use Filament\Forms;
use App\Models\Bill;
// use Forms\Components\TextInput;
use Filament\Tables;
use App\Models\Payment;
use PharIo\Manifest\Url;
use Filament\Pages\Actions;
use Filament\Forms\Components\Select;
use App\Filament\Resources\BillResource;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Redirect;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Filters\SelectFilter;

class ListBills extends ListRecords
{
    protected static string $resource = BillResource::class;

    protected function getActions(): array
    {
        return [

            // Actions\Action::make('Print Report')
            //     ->action(function (array $data): string  {
            //         $month = $data['month']; // get the value of the month field
            //         $url = 'billpermonth/' . $month;
            //         return Redirect::to('billpermonth/' . $month)->getUrlGenerator()
            //             ->to('billpermonth/'  . $month);
            //     })
            //     ->requiresConfirmation()
            //     ->modalButton('Print Report')
            //     ->form([
            //         Select::make('month')
            //             ->options([
            //                 '1' => 'January',
            //                 '2' => 'February',
            //                 '3' => 'March',
            //                 '4' => 'April',
            //                 '5' => 'May',
            //                 '6' => 'June',
            //                 '7' => 'July',
            //                 '8' => 'August',
            //                 '9' => 'September',
            //                 '10' => 'October',
            //                 '11' => 'November',
            //                 '12' => 'December',
            //             ])
            //             ->required(),
            //     ]),
            Actions\CreateAction::make(),
        ];
    }
}
