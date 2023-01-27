<?php

namespace App\Filament\Resources\VatResource\Pages;

use App\Filament\Resources\VatResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateVat extends CreateRecord
{
    protected static string $resource = VatResource::class;

    protected static ?string $title = 'Create New VAT';

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

}
