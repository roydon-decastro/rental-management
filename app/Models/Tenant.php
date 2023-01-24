<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = ['last_name', 'first_name', 'email', 'id_type', 'id_number', 'cellphone', 'dob', 'sex', 'unit_id', 'is_current', 'is_primary'];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    protected $casts = [
        'is_current' => 'boolean',
        'is_primary' => 'boolean',
    ];

}
