<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'bill_id',
        'pay_date',
        'pay_amount',
        'pay_method',
    ];

    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }

    protected $casts = [
        'is_paid' => 'boolean',
    ];
}


