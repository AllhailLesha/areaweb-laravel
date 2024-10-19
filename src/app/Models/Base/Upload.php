<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Upload extends Model
{
    use HasFactory;

    public static function upload(Request $request, ?string $defaultImage = null, string $storePath = 'images', string $imageKey = "image")
    {
        $previewImagePath = $defaultImage;
        if ($request->hasFile($imageKey)) {
            $previewImagePath = "/storage/{$request->file($imageKey)->store($storePath)}";
        }
        return $previewImagePath;
    }
}
