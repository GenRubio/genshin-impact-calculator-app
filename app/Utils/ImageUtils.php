<?php

namespace App\Utils;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ImageUtils
{
    public static function save($disk, $content, $attribute_name, $destination_path)
    {
        $image = Image::make($content)->encode('jpg', 90);
        $filename = md5($content . time()) . '-' . $attribute_name . '.jpg';
        Storage::disk($disk)->put($destination_path . $filename, $image->stream());
    }
}
