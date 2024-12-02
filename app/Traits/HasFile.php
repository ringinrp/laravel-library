<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

trait HasFile
{
    public function upload_file(Request $request, string $column, string $folder): ?string{
        return $request->hasFile($column) ? $request->file($column)->store($folder) : null;
    }
    //dilakukan pengecekkan jika ada file yang di unggah maka akan di masukkan ke folder jika tidak ada maka null

    public function update_file(Request $request, Model $model, string $column, string $folder): ?string{
        if ($request->hasFile(key: $column)){
            if($model->$column){
                Storage::delete($model->$column);
            }
            $thumbnail = $request->file(key: $column)->store(path: $folder);
        }else {
            $thumbnail = $model->$column;
        }
        return $thumbnail;
    }

    public function delete_file(Model $model,string $column): void {
        if($model->$column){
            Storage::delete($model->$column);
        }
    }
}

//request berasal dari data permintaan pengguna, column adalah file yang akan di unggah, folder tempat file akan disimpan
