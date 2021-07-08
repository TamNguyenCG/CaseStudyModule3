<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'brand_logo' => 'required|unique:brands,image|regex:[^\s]+(\.(?i)(jpg|png|gif|bmp))$]',
            'brand_name'=>'required|unique:brands,name|regex:/^[a-zA-Z ]*$/'
        ];
    }

    public function messages()
    {
        return [
            'brand_logo.required' => 'Logo is required',
            'brand_logo.unique' => 'Logo has been taken',
            'brand_logo.regex' => 'Wrong type of image',
            'brand_name.required' => "Brand's name is required",
            'brand_name.unique' => "Brand's name has been taken",
            'brand_name.regex' => "Special Character is forbidden",
        ];
    }
}
