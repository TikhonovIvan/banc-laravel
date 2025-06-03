<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'loan_application_id',
        'file_path',
        'original_name',
    ];

    // Документ принадлежит одной заявке
    public function application()
    {
        return $this->belongsTo(LoanApplication::class, 'loan_application_id');
    }
}
