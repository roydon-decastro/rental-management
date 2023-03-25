<?php

namespace App\Filament\Resources\ReadingResource\Pages;

use App\Filament\Resources\ReadingResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateReading extends CreateRecord
{
    protected static string $resource = ReadingResource::class;

    // protected static string $view = 'filament.pages.readings';

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }


}
