<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intent extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_name',
        'user_email',
        'property_id',
        'unit_id',
        'contact_numbers',
        'current_address',
        'partner',
        'religion',
        'employer',
        'employer_address',
        'employer_contact_number',
        'emergency_contact',
        'emergency_contact_number',
        'other_tenants_name',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
