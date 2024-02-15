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

        $image = "";

        if($Request->newImage){
            $image = Helper::imageUpdate($Request->newImage, '/images/renewal-hub-enquires/', ucwords($Request->enquiryEmail.'-'), false);
        }

        $newEnquiryData = (object) [
            'name' => $Request->enquiryName,
            'email' => $Request->enquiryEmail,
            'data' => $Request->enquiryData,
            'subject' => $Request->subject,
            'image' => $image
          ];

        Mail::to("new-enquiry@renewal-project.paulrobsondev.co.uk")->send(new NewEnquiry($newEnquiryData));

        return response()->json($Request);
    }
}
