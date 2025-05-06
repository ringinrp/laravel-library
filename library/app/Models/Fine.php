<?php

namespace App\Models;

use App\Enums\FinePaymentStatus;
use Illuminate\Database\Eloquent\Model;

class Fine extends Model
{
    protected $fillable = [
        'return_book_id',
        'user_id',
        'late_fee',
        'other_fee',
        'total_fee',
        'status',
        'fine_date'
    ];

    protected $casts = [
        'fine_date' => 'date',
        'status' => FinePaymentStatus::class,
    ];
}
