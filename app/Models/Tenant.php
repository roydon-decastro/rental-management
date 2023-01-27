<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'id_type', 'id_number', 'cellphone', 'plate', 'dob', 'sex', 'unit_id', 'is_current', 'is_primary', 'has_parking'];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }

    protected $casts = [
        'is_current' => 'boolean',
        'is_primary' => 'boolean',
        'has_parking' => 'boolean',
    ];

}
