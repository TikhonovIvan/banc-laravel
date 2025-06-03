<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'term_months',
        'income_proof',
        'credit_purpose',
        'comment',
        'status',
    ];

    // Заявка принадлежит пользователю
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Заявка имеет много документов
    public function documents()
    {
        return $this->hasMany(LoanDocument::class);
    }

}
