<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OverPayment extends Model
{
    use HasFactory;
    const CREATED_AT = null;
    const UPDATED_AT = null;

    protected $fillable = [
        'unit_id',
        'tenant_id',
        'overpayment_amount',
    ];
}
