<?php

namespace App\Filament\Resources\RateResource\Pages;

use App\Filament\Resources\RateResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRates extends ListRecords
{
    protected static string $resource = RateResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
