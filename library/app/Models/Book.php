<?php

namespace App\Models;

use App\Enums\BookLanguage;
use App\Enums\BookStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Book extends Model
{
    protected $fillable = [
        'book_code',
        'title',
        'slug',
        'author',
        'publication_year',
        'isbn',
        'language',
        'synopsis',
        'number_of_pages',
        'status',
        'cover',
        'price',
        'publisher_id',
        'category_id'
    ];

    protected function casts(): array
    {
        return [
            'status' => BookStatus::class,
            'language' => BookLanguage::class,
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class); //buku hanya dimiliki 1 kategori
    }

    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class); //buku hanya dimiliki 1 publisher
    }

    public function loans(): HasMany
    {
        return $this->hasMany(Loan::class); //buku dapat dipinjam banyak pengguna
    }

    public function Stock(): HasOne
    {
        return $this->hasOne(Stock::class); // buku hanya memiliki satu stock
    }
}
