<?php

namespace App\Filament\Resources\VatResource\Pages;

use App\Filament\Resources\VatResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVat extends EditRecord
{
    protected static string $resource = VatResource::class;

    protected static ?string $title = 'Edit VAT';

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
