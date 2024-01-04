<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewEnquiry;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEnquiry;

class EnquiryController extends Controller
{
    public function newEnquiry(StoreEnquiry $Request)
    {
       
        Mail::to("new-enquiry@renewal-project.paulrobsondev.co.uk")->send(new NewEnquiry($Request));

        return response()->json($Request);
    }
}
