<?php

namespace App\Models;

use App\Enums\ReturnBookStatus;
use Illuminate\Database\Eloquent\Model;

class ReturnBook extends Model
{
    protected $fillablr = [
        'return_book_code',
        'return_date',
        'loan_id',
        'book_id',
        'user_id',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'return_date' => 'date',
            'status' => ReturnBookStatus::class
        ];
    }
}
