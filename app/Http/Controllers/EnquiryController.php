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


        // if($Request->newImage){
        //     $newSalonTreatment->image = Helper::imageUpdate($Request->newImage, '/images/renewal-hub-enquires/', ucwords($Request->title), false);
        // } else {
        //     $newSalonTreatment->image = "";
        // }
        Mail::to("new-enquiry@renewal-project.paulrobsondev.co.uk")->send(new NewEnquiry($Request));

        return response()->json($Request);
    }
}
