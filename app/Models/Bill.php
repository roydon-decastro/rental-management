<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = ['unit_id', 'tenant_id', 'reading_id', 'rate_id', 'service_charge_id', 'prev_balance', ];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
