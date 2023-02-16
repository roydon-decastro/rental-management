<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'meralco', 'function', 'layout', 'floor', 'rent', 'type', 'meter_type', 'property_id'];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function tenants()
    {
        return $this->hasMany(Tenant::class);
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function readings()
    {
        return $this->hasMany(Reading::class);
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }
}
