<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'tier' ,'rate', 'notes'];

    // public function bill()
    // {
    //     return $this->belongsTo(Bill::class);
    // }
}
