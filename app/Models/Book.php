<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\BookLanguage;
use App\Enums\BookStatus;
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
        'category_id',
        'publisher_id',
        'category_id',
        'price'
    ];

    public function casts():array{
        return [
            'language' => BookLanguage::class,
            'status' => BookStatus::class
        ];
    }


    //buku memiliki banyak category
    public function category(): BelongsTo
    {
        return $this->belongsTo(related: Category::class);
    }

    //buku hanya memiliki 1 stok
    public function stock(): HasOne
    {
        return $this->hasOne(related: Stock::class);
    }

    //buku memiliki banyak peminjam
    public function loan(): HasMany{
        return $this->hasMany(related: Loan::class);
    }

    //buku memiliki banyak publisher
    public function publisher(): BelongsTo
    {
        return $this->belongsTo(related: Publisher::class);
    }
}
