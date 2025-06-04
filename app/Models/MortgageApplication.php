<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MortgageApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'loan_amount',
        'term_years',
        'property_type',
        'region',
        'property_value',
        'initial_payment',
        'purpose',
        'interest_rate',
        'comment',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function documents()
    {
        return $this->hasMany(MortgageDocument::class);
    }
}
