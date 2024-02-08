<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Storage;

class Helper
{
    public static function imageUpdate($image, $fileLocation, $name, $frontPageImage){
        \Tinify\setKey("gpYyPbcWHr93Cjtx9rm87xV2pMDrpch6");

        $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        if($name) {
            $filename = $name.$filename;
        }
        $img = imagecreatefromjpeg($image);
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
                    $img = imagerotate($img, $deg, 0);        
                    }
                }
            }
        }
        $newFileName = $filename.'.webp';
        $storagePath  = Storage::disk('public')->getDriver()->getAdapter()->getPathPrefix();
        $output = $storagePath.$fileLocation.$newFileName;
        imagewebp($img,$output,100);
        $portrait = true;
        $width = imagesx($img);
        $height = imagesy($img);
        if($width > $height){
            $portrait = false;
        }
        $source = \Tinify\fromFile($output);
        $resized = $source->resize(array(
            "method" => "fit",
            "width" => 500,
            "height" => 500
        ));
        $resized->toFile($storagePath.$fileLocation.'small-'.$newFileName);
        $source->toFile($storagePath.$fileLocation.$newFileName);
        if($frontPageImage){
            return ["filename" => $newFileName, "portrait" => $portrait];
        } else {
            return $newFileName;
        }
    }

    public static function imageDelete($location, $name){
        Storage::delete($location.$name);
        Storage::delete($location.'small-'.$name);
    }
}