<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'expense_category_id',
        'payment_date',
        'amount',
        'payment_mode',
        'vendor',
        'or_num',
        'notes',
        'created_at'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function expense_category()
    {
        return $this->belongsTo(ExpenseCategory::class);
    }
}
