<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'category_name' => 'required|unique:categories,name|regex:/[^A-Za-z]*$/'
        ];
    }

    public function messages()
    {
        return [
            'category_name.required' => "Category's name has to fill up",
            'category_name.unique' => "Category's name already existed",
            'category_name.regex' => "Special characters is not allow",
        ];
    }
}
