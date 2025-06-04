<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MortgageDocument extends Model
{

    use HasFactory;

    protected $fillable = [
        'mortgage_application_id',
        'file_path',
        'original_name',
    ];

    public function application()
    {
        return $this->belongsTo(MortgageApplication::class, 'mortgage_application_id');
    }
}
