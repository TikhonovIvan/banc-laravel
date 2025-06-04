<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoCreditApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'loan_amount',
        'car_make_model',
        'car_year',
        'car_type',
        'car_price',
        'initial_payment',
        'term_months',
        'purpose',
        'interest_rate',
        'comment',
        'status',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function files()
    {
        return $this->hasMany(AutoCreditFile::class);
    }

    public function documents()
    {
        return $this->hasMany(AutoCreditFile::class, 'auto_credit_application_id');
    }
}
