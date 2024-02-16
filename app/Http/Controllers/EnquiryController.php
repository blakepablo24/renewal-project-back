<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewEnquiry;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEnquiry;
use App\Helpers\Helper;

class EnquiryController extends Controller
{
    public function newEnquiry(StoreEnquiry $Request)
    {

        $image1 = "";
        $image2 = "";
        $image3 = "";
        $image4 = "";
        $image5 = "";
        $image6 = "";

        if($Request->newImage1){
            $image1 = Helper::imageUpdate($Request->newImage1, '/images/renewal-hub-enquires/', ucwords($Request->enquiryEmail.'-'));
        }

        if($Request->newImage2){
            $image2 = Helper::imageUpdate($Request->newImage2, '/images/renewal-hub-enquires/', ucwords($Request->enquiryEmail.'-'));
        }

        if($Request->newImage3){
            $image3 = Helper::imageUpdate($Request->newImage3, '/images/renewal-hub-enquires/', ucwords($Request->enquiryEmail.'-'));
        }

        if($Request->newImage4){
            $image4 = Helper::imageUpdate($Request->newImage4, '/images/renewal-hub-enquires/', ucwords($Request->enquiryEmail.'-'));
        }

        if($Request->newImage5){
            $image5 = Helper::imageUpdate($Request->newImage5, '/images/renewal-hub-enquires/', ucwords($Request->enquiryEmail.'-'));
        }

        if($Request->newImage6){
            $image6 = Helper::imageUpdate($Request->newImage6, '/images/renewal-hub-enquires/', ucwords($Request->enquiryEmail.'-'));
        }

        $newEnquiryData = (object) [
            'name' => $Request->enquiryName,
            'email' => $Request->enquiryEmail,
            'data' => $Request->enquiryData,
            'subject' => $Request->subject,
            'image1' => $image1,
            'image2' => $image2,
            'image3' => $image3,
            'image4' => $image4,
            'image5' => $image5,
            'image6' => $image6
          ];

        Mail::to("new-enquiry@renewal-project.paulrobsondev.co.uk")->send(new NewEnquiry($newEnquiryData));

        return response()->json($Request);
    }
}
