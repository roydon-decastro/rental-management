<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCharge extends Model
{
    use HasFactory;

    protected $fillable = ['rate',];

    // public function bill()
    // {
    //     return $this->belongsTo(Bill::class);
    // }
}
