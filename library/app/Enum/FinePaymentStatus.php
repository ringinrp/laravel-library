<?php

namespace App\Enums;

enum FinePaymentStatus: string
{
    case SUCCESS = 'Sukses';
    case FAILED = 'Gagal';
    case PENDING = 'Tertunda';

    public static function options(): array
    {
        return collect(self::cases())->map(fn($item) => [
            'value' => $item->value,
            'label' => $item->value, //label menggunakan value : Ketika value sudah cukup deskriptif dan tidak ada kebutuhan untuk memisahkan nilai teknis dengan teks tampilan.
        ])->values()->toArray();
    }
}
