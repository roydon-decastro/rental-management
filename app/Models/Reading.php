<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reading extends Model
{
    use HasFactory;

    protected $fillable = ['reading', 'read_date', 'unit_id'];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    // public function bill()
    // {
    //     return $this->hasOne(Bill::class);
    // }
}
