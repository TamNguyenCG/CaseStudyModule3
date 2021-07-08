<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|unique:products,name|regex:/^[a-zA-Z0-9 ]*$/',
            'color' => "required|regex:/^[a-zA-Z \/]*$/",
            'price' => 'required|numeric',
            'stocks' => 'required|numeric',
            'image' => 'required|unique:products,image|mimes:jpeg,png,jpg,gif,svg',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Product's name is required",
            'name.unique' => "Name has been taken",
            'name.regex' => 'Special character is forbidden',

            'color.required' => 'Color is required',
            'color.regex' => "Special character is forbidden except '/' ",

            'price.required' => 'Price is required',
            'price.numeric' => 'Price must be numeric',

            'stocks.required' => 'Stocks is required',
            'stocks.numeric' => 'Stocks must be numeric',

            'image.required' => 'Image is required',
            'image.unique' => 'Image already existed',
            'image.mimes' => 'Type of image is not allow',

            'description.required' => 'Description is required'
        ];
    }
}
