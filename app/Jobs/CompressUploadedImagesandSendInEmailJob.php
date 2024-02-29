<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewEnquiry;
use App\Helpers\Helper;

class CompressUploadedImagesandSendInEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $newEnquiryData;

    /**
     * Create a new job instance.
     * 
     * @return void
     */
    public function __construct($newEnquiryData)
    {
        $this->newEnquiryData = $newEnquiryData;
    }

    /**
     * Execute the job.
     * 
     * @return void
     */
    public function handle()
    {

        // if($this->newEnquiryData->image1){
        //     Helper::imageUpdate($this->newEnquiryData->image1);
        // }

        // if($this->newEnquiryData->image2){
        //     Helper::imageUpdate($this->newEnquiryData->image2);
        // }

        // if($this->newEnquiryData->image3){
        //     Helper::imageUpdate($this->newEnquiryData->image3);
        // }

        // if($this->newEnquiryData->image4){
        //     Helper::imageUpdate($this->newEnquiryData->image4);
        // }


        Mail::to("new-enquiry@renewal-project.paulrobsondev.co.uk")->send(new NewEnquiry($this->newEnquiryData));
    }
}
