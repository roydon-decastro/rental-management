<?php

namespace App\Filament\Resources\RentalIncomeResource\Pages;

use App\Filament\Resources\RentalIncomeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRentalIncome extends CreateRecord
{
    protected static string $resource = RentalIncomeResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}


