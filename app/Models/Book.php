<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\BookLanguage;
use App\Enums\BookStatus;

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
}
