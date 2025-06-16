<?php

namespace App\Observers;

use App\Models\Book;

class BookObserver
{
    public function created(Book $book): void
    {
        $book->stock()->create([
            'total' => $total = request()->total,
            'available' => $total,
        ]);
    }

    //custome sendiri
    // public function updated(Book $book): void
    // {
    //     // Menghapus stok sebelumnya sebelum menambah data baru
    //     $book->stock()->delete();

    //     // Menambahkan stok baru setelah dihapus
    //     $total = request()->total;

    //     $book->stock()->create([
    //         'total' => $total,
    //         'available' => $total,
    //     ]);
    // }
}
