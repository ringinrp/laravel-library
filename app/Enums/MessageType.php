<?php

namespace App\Enums;

enum MessageType: string
{
    case CREATED = 'Berhasil Menambahkan';
    case UPDATED = 'Berhasil Memperbaharui';
    case DELETED = 'Berhasil Menghapus';
    case ERROR = 'Terjadi Kesalahan';

    public function message(string $entity = '', ?string $error = null): string

    {
        if($this === MessageType::ERROR && $error){
            return '{$this->value} {error}';
        }

        return "{$this->value} {$entity}";
    }

}
