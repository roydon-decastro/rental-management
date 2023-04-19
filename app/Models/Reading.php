<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reading extends Model
{
    use HasFactory;

    protected $fillable = ['reading', 'read_date', 'unit_id', 'tenant_id', 'bill_created'];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    protected $casts = [
        'bill_created' => 'boolean',

    ];

    // public function bill()
    // {
    //     return $this->hasOne(Bill::class);
    // }
}
