<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Loan extends Model
{
    protected $fillable = [
        'loan_code',
        'user_id',
        'book_id',
        'loan_date',
        'due_date'
    ];

    public function casts():array{
        return [
            'loan_date' => 'date',
            'due_date' => 'date',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(related: User::class);
    }

    public function book(): BelongsTo
    {
        return $this->belongsTo(related: Book::class);
    }

    public function returnBook(): HasOne
    {
        return $this->hasOne(related: ReturnBook::class);
    }
}
