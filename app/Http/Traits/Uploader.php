<?php

namespace App\Http\Traits;

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;

trait Uploader
{
    private function Upload($file, $base_folder, $folder, $stick_watermark = false)
    {
        $year = Carbon::now()->year;
        $mouth = Carbon::now()->month;
        $day = Carbon::now()->day;

        $base_folder = str_replace('.', '-', str_replace(' ', '-', $base_folder));
        $folder = str_replace('.', '-', str_replace(' ', '-', $folder));
        $original_name = str_replace('+', '-', $file->getClientOriginalName());
        $original_name = str_replace(' ', '-', $original_name);

        $imagePath = "/uploads/{$base_folder}/{$year}-{$mouth}/{$folder}/";
        $filename = Str::random(20) . '-' . time() . '.' . $original_name;
        $extension = $file->getClientOriginalExtension();

        if (!file_exists(public_path($imagePath))) {
            mkdir(public_path($imagePath), 0777, true);
            chmod(public_path($imagePath), 0777);
        }

        $file->move(public_path($imagePath), $filename);

//        if (in_array($extension, ['svg', 'txt'])) {
//            $file->move(public_path($imagePath), $filename);
//        } else {
//            // insert a watermark
//            $watermark = ImageManager::imagick()->read(public_path('logo.png'));
//            //$watermark_height = ($image->height() * 25) / 100;
//            $watermark_size = ($watermark->width() * 20) / 100;
//            $watermark->resize($watermark_size, $watermark_size);
//
//            $x = -35;
//            $y = $watermark->height() - $watermark->height() - 10;
//            $watermark->place($watermark, 'top-right', $x, $y);
//            $watermark->save(str_replace('//', '/', str_replace('\\', '/', public_path($imagePath . $filename))));
//        }

        return $imagePath . $filename;
    }

    public function UploadFile($request, $name, $base_folder, $folder, $default = null, $stick_watermark = false)
    {
        $file = $request->hasFile($name) ? $this->Upload($request->file($name), $base_folder, $folder, $stick_watermark) : $default;
        return $file;
    }
}
