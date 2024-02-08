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
            'newImage' => 'image|mimes:jpeg,jpg,png,webp|max:3000',
        ];
    }

    public function messages() {
        return [
            'newImage.image' => 'Your uploaded file can only be of image type ',
            'newImage.mimes' => 'Image must be of jpeg, jpg or png format ',
            'newImage.max' => 'The image maximum size is 3MB! Please choose a smaller sized image.'
        ];
    }
}
