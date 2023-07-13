<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'email', 'phone'];

    public function units()
    {
        return $this->hasMany(Unit::class);
    }

    public function intents()
    {
        return $this->hasMany(Intent::class);
    }

    public function users()
    {

        return $this->belongsToMany(User::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
