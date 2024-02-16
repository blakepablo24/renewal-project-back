<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEnquiry extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'enquiryName' => 'required|string',
            'enquiryEmail' => 'required|email',
            'enquiryData' => 'required|string',
            'subject' => 'required|string',
            'newImage1' => 'image|mimes:jpeg,jpg,png,webp|max:3000',
            'newImage2' => 'image|mimes:jpeg,jpg,png,webp|max:3000',
            'newImage3' => 'image|mimes:jpeg,jpg,png,webp|max:3000',
            'newImage4' => 'image|mimes:jpeg,jpg,png,webp|max:3000',
            'newImage5' => 'image|mimes:jpeg,jpg,png,webp|max:3000',
            'newImage6' => 'image|mimes:jpeg,jpg,png,webp|max:3000',
        ];
    }

    public function messages() {
        return [
            'newImage1.image' => 'Your uploaded file can only be of image type ',
            'newImage1.mimes' => 'Image must be of jpeg, jpg or png format ',
            'newImage1.max' => 'The image maximum size is 3MB! Please choose a smaller sized image.',
            'newImage2.image' => 'Your uploaded file can only be of image type ',
            'newImage2.mimes' => 'Image must be of jpeg, jpg or png format ',
            'newImage2.max' => 'The image maximum size is 3MB! Please choose a smaller sized image.',
            'newImage3.image' => 'Your uploaded file can only be of image type ',
            'newImage3.mimes' => 'Image must be of jpeg, jpg or png format ',
            'newImage3.max' => 'The image maximum size is 3MB! Please choose a smaller sized image.',
            'newImage4.image' => 'Your uploaded file can only be of image type ',
            'newImage4.mimes' => 'Image must be of jpeg, jpg or png format ',
            'newImage4.max' => 'The image maximum size is 3MB! Please choose a smaller sized image.',
            'newImage5.image' => 'Your uploaded file can only be of image type ',
            'newImage5.mimes' => 'Image must be of jpeg, jpg or png format ',
            'newImage5.max' => 'The image maximum size is 3MB! Please choose a smaller sized image.',
            'newImage6.image' => 'Your uploaded file can only be of image type ',
            'newImage6.mimes' => 'Image must be of jpeg, jpg or png format ',
            'newImage6.max' => 'The image maximum size is 3MB! Please choose a smaller sized image.'
        ];
    }
}
