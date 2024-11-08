<?php

namespace App\Models;

use App\Enums\ReturnBookStatus;
use Illuminate\Database\Eloquent\Model;

class ReturnBook extends Model
{
    protected $fillable = [
        'return_book_code',
        'loan_id',
        'user_id',
        'book_id',
        'return_date',
        'status'
    ];

    public function casts():array{
        return [
            'return_date' => 'date',
            'satatus' => ReturnBookStatus::class,
        ];
    }
}
