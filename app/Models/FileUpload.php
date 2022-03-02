<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    use HasFactory;

    public static function file($request, $filename, $default = '', $path)
    {
        $photo = $request->$filename;
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $name = time() . '.' . $photo->getClientOriginalExtension();
        $photo->move($path, $name);
        return $name;
    }
}
