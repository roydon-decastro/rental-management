<?php

namespace App\Filament\Resources\TenantResource\Pages;

use App\Models\Tenant;
use Filament\Pages\Actions;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\Facades\Redirect;
use App\Filament\Resources\TenantResource;

class ViewTenant extends ViewRecord
{
    protected static string $resource = TenantResource::class;


    // public function mount($tenant)

    // {
    //     dd($tenant);
    // }

    protected function getActions(): array
    {
        return [
            Actions\Action::make('Remove Tenant')->button()
                ->color('danger')
                ->action(function (): string {
                    // dd($this->record->unit_id);
                    $tenant = DB::table('tenants')
                        ->where('id', '=', $this->record->id)
                        ->update(array('is_primary' => 0, 'is_current' => 0));
                    $unit = DB::table('units')
                        ->where('id', '=', $this->record->unit_id)
                        ->update(array('status' => 'available'));

                    // dd($data);
                    // $payment = new Payment;
                    // $payment->bill_id = $record->id;
                    // $payment->pay_amount = $data['pay_amount'];
                    // $payment->pay_date = $data['pay_date'];
                    // $payment->pay_method = $data['pay_method'];
                    // $payment->save();
                    // $record->is_paid = 1;
                    // $record->save();

                    // return redirect()->to('admin/tenants');
                    return Redirect::to('admin/tenants')->getUrlGenerator()->to('admin/tenants');
                })
                // ->url(fn () => route('/'))
                // ->url(fn (): string => route("/admin/tenants"))

                ->requiresConfirmation(),

            Actions\EditAction::make(),

        ];
    }
}
