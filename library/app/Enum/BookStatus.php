<?php

namespace App\Enums;

enum BookStatus: string

{
    case AVAILABLE = 'Tersedia';
    case UNAVAILABLE = 'Tidak Tersedia';
    case LOAN = 'Dipinjam';
    case LOST = 'Hilang';
    case DAMAGED = 'Rusak';

    public static function options(): array
    {
        return collect(self::cases())->map(fn($item) => [
            'value' => $item->value,
            'label' => $item->name, //label menggunakan name : Ketika value terlalu teknis atau tidak cocok untuk ditampilkan langsung kepada pengguna, sehingga dibutuhkan representasi tambahan yang lebih ramah pembaca.
        ])->values()->toArray();
    }
}
