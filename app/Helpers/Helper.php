<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Storage;

class Helper
{

    public static function imageStore($image, $fileLocation, $name){
        
        $storagePath  = Storage::path('public');
        
        $uploadedImage = imagecreatefromstring(file_get_contents($image));

        // orientate the image
        if (function_exists('exif_read_data')) {
            $exif = exif_read_data($image);
            if($exif && isset($exif['Orientation'])) {
                $orientation = $exif['Orientation'];
                if($orientation != 1){
                    $deg = 0;
                    switch ($orientation) {
                    case 3:
                        $deg = 180;
                        break;
                    case 6:
                        $deg = 270;
                        break;
                    case 8:
                        $deg = 90;
                        break;
                    }
                    if ($deg) {
                        $uploadedImage = imagerotate($uploadedImage, $deg, 0);        
                    }
                }
            }
        }

        $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);

        if($name) {
            $filename = $name.$filename;
        }

        $finalImagefileLocation = $storagePath . $fileLocation . $filename . '.webp';

        imagewebp($uploadedImage,$finalImagefileLocation,30);

        return $finalImagefileLocation;
    }

    public static function imageUpdate($image){
        \Tinify\setKey("gpYyPbcWHr93Cjtx9rm87xV2pMDrpch6");

        $source = \Tinify\fromFile($image);
        $source->toFile($image);
    }

    public static function imageDelete($location, $name){
        Storage::delete($location.$name);
        Storage::delete($location.'small-'.$name);
    }
}