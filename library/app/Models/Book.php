<?php

namespace App\Models;

use App\Enums\BookLanguage;
use App\Enums\BookStatus;
use Illuminate\Database\Eloquent\Model;

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
}
