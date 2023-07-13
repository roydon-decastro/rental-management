<?php

namespace App\Filament\Resources\IntentResource\Pages;

use App\Filament\Resources\IntentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIntent extends EditRecord
{
    protected static string $resource = IntentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
