<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Storage;

class Helper
{
    public static function imageUpdate($image, $fileLocation, $name){
        \Tinify\setKey("gpYyPbcWHr93Cjtx9rm87xV2pMDrpch6");

        $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);

        if($name) {
            $filename = $name.$filename;
        }
        $storagePath  = Storage::path('public');
        $sourceData = file_get_contents($image);
        $converted = \Tinify\fromBuffer($sourceData)->convert(array("type" => ["image/webp","image/png"]));
        $extension = $converted->result()->extension();
        $converted->toFile($storagePath . $fileLocation . 'size-original-' . $filename . "." . $extension);
        $finalImagefile = $storagePath . $fileLocation . 'size-original-' . $filename . "." . $extension;
        return $finalImagefile;
    }

    public static function imageDelete($location, $name){
        Storage::delete($location.$name);
        Storage::delete($location.'small-'.$name);
    }
}