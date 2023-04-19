<?php

namespace App\Filament\Resources\TenantResource\Pages;

use App\Filament\Resources\TenantResource;
use App\Models\Contract;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTenant extends CreateRecord
{
    protected static string $resource = TenantResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function afterCreate(): void
    {
        // Runs after the form fields are saved to the database.
        //step Get the ID of the newly created user record
        $tenantId = $this->record->id;
        $unitId = $this->record->unit_id;

        //step Create a new Contract record and associate it with the user
        $contract = new Contract();
        $contract->tenant_id = $tenantId;
        $contract->unit_id = $unitId;
        $contract->is_active = true;
        $contract->save();
    }
}
