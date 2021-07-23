<?php declare(strict_types=1);


namespace App\Services;

use App\Contracts\FileUploadContract;
use \Illuminate\Support\Str;

class FileUploadService implements FileUploadContract
{
    public function upload($file)
    {
        $originalExt = $file->getClientOriginalExtension(); // расширение
        $fileName = Str::random(10) . '.' . $originalExt;

        return $file->storeAs('news', $fileName, 'public');
    }
}
