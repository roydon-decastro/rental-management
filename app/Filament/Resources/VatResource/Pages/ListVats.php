<?php

namespace App\Filament\Resources\VatResource\Pages;

use App\Filament\Resources\VatResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVats extends ListRecords
{
    protected static string $resource = VatResource::class;

    protected static ?string $title = 'Value Added Tax (VAT)';

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
