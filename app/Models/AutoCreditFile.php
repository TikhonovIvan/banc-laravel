<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoCreditFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'auto_credit_application_id',
        'file_path',
        'original_name',  // добавьте сюда
    ];

    public function application()
    {
        return $this->belongsTo(AutoCreditApplication::class, 'auto_credit_application_id');
    }
}
