<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tenant extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['name', 'photo', 'email', 'id_type', 'id_number', 'cellphone', 'plate', 'dob', 'sex', 'unit_id', 'is_current', 'is_primary', 'has_parking', 'start_date', 'end_date'];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    protected $casts = [
        'is_current' => 'boolean',
        'is_primary' => 'boolean',
        'has_parking' => 'boolean',
    ];

}
