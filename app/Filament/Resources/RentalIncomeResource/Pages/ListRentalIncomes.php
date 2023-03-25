<?php

namespace App\Filament\Resources\RentalIncomeResource\Pages;

use App\Filament\Resources\RentalIncomeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRentalIncomes extends ListRecords
{
    protected static string $resource = RentalIncomeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
