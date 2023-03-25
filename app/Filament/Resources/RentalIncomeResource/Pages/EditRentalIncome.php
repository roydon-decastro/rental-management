<?php

namespace App\Filament\Resources\RentalIncomeResource\Pages;

use App\Filament\Resources\RentalIncomeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRentalIncome extends EditRecord
{
    protected static string $resource = RentalIncomeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
