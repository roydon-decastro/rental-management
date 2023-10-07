<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalIncome extends Model
{
    use HasFactory;

    protected $fillable = ['unit_id', 'tenant_id', 'amount', 'pay_date', 'payment_mode', 'category', 'notes'];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
