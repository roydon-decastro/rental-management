<?php

namespace App\Filament\Resources\ServiceChargeResource\Pages;

use App\Filament\Resources\ServiceChargeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListServiceCharges extends ListRecords
{
    protected static string $resource = ServiceChargeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
