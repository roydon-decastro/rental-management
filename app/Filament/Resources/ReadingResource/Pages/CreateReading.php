<?php

namespace App\Filament\Resources\ReadingResource\Pages;

use App\Models\Unit;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\ReadingResource;

class CreateReading extends CreateRecord
{
    protected static string $resource = ReadingResource::class;

    // protected static string $view = 'filament.pages.readings';

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $unit = $data['unit_id'];
        // dd($unit);
        $tenant = Unit::find($unit)->tenants()->where('is_current', '=', true)
            ->where('is_primary', '=', true)->first();

        $data['tenant_id'] = $tenant['id'];
        // dd($data);

        return $data;
    }
}
