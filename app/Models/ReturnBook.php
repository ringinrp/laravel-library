<?php

namespace App\Models;

use App\Enums\ReturnBookStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function loan(): BelongsTo
    {
        return $this->belongsTo(related: Loan::class);
    }

    public function book(): BelongsTo
    {
        return $this->belongsTo(related: Book::class);
    }

    public function fine():HasOne
    {
        return $this->hasOne(related: Fine::class);
    }

    public function returnBookCheck(): HasOne
    {
        return $this->hasOne(related: ReturnBookCheck::class);
    }
}
