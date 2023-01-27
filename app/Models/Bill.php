<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_name',
        'tenant_name',
        'unit_id',
        'reading_id',
        'curr_reading',
        'curr_read_date',
        'prev_reading',
        'prev_read_id',
        'prev_read_date',
        'consumption',
        'prev_balance',
        'curr_balance',
        'rate',
        'service_charge',
        'service_charge_rate',
        'vat',
        'total_amount_due',
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }


    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }




    // public function reading()
    // {
    //     return $this->belongsTo(Reading::class);
    // }

    // public function rate()
    // {
    //     return $this->hasOne(Rate::class);
    // }

    // public function servicecharge()
    // {
    //     return $this->hasOne(ServiceCharge::class);
    // }
}
