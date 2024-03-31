<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEnquiry;
use App\Helpers\Helper;
use App\Jobs\CompressUploadedImagesandSendInEmailJob;

class EnquiryController extends Controller
{
    public function newEnquiry(StoreEnquiry $Request)
    {

        $image1 = "";
        $image2 = "";
        $image3 = "";
        $image4 = "";

        if($Request->newImage1){
            $image1 = Helper::imageStore($Request->newImage1, '/images/renewal-hub-enquires/', ucwords($Request->enquiryEmail.'-'));
        }

        if($Request->newImage2){
            $image2 = Helper::imageStore($Request->newImage2, '/images/renewal-hub-enquires/', ucwords($Request->enquiryEmail.'-'));
        }

        if($Request->newImage3){
            $image3 = Helper::imageStore($Request->newImage3, '/images/renewal-hub-enquires/', ucwords($Request->enquiryEmail.'-'));
        }

        if($Request->newImage4){
            $image4 = Helper::imageStore($Request->newImage4, '/images/renewal-hub-enquires/', ucwords($Request->enquiryEmail.'-'));
        }

        $newEnquiryData = (object) [
            'enquiryName' => $Request->enquiryName,
            'enquiryEmail' => $Request->enquiryEmail,
            'enquiryPhone' => $Request->enquiryPhone,
            'enquiryData' => $Request->enquiryData,
            'subject' => $Request->subject,
            'transportService' => $Request->transportService,
            'enquiryCollectionAddress' => $Request->enquiryCollectionAddress,
            'enquiryDeliveryAddress' => $Request->enquiryDeliveryAddress,
            'enquiryDate' => $Request->enquiryDate,
            'image1' => $image1,
            'image2' => $image2,
            'image3' => $image3,
            'image4' => $image4
          ];
        
        dispatch(new CompressUploadedImagesandSendInEmailJob($newEnquiryData));

        return response()->json($Request);
    }
}
