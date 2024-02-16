<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Storage;

class Helper
{

    public static function imageStore($image, $fileLocation, $name){
        
        $storagePath  = Storage::path('public');
        
        $uploadedImage = imagecreatefromstring(file_get_contents($image));

        $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);

        if($name) {
            $filename = $name.$filename;
        }

        $finalImagefileLocation = $storagePath . $fileLocation . $filename . '.webp';

        imagewebp($uploadedImage,$finalImagefileLocation,100);

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