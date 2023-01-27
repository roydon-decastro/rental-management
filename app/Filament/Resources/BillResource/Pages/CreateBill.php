<?php

namespace App\Filament\Resources\BillResource\Pages;

use App\Filament\Resources\BillResource;
use App\Models\Reading;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBill extends CreateRecord
{
    protected static string $resource = BillResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    // protected function mutateFormDataBeforeCreate(array $data): array
    // {
        // $data['user_id'] = auth()->id();

        // $prev_read = Reading::where('id', $data['prev_read_id'])->get();

        // $data['prev_read_date'] =  $prev_read->read_date;
        // dd($data);
        // dd($prev_read);
        // dd($prev_read['read_date']);

    //     return $data;
    // }
}
