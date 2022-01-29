<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required|max:100',
            'photo' => 'required|file|mimes:png,jpg,jpeg|max:1000',
            'category_id' => 'required',
            'description' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Please Fill Title Blank!',
            'photo.required' => 'Please Select Photo!',
            'category_id.required' => 'Please Choice Tag Blank!',
            'description.required' => 'Please Fill Description Blank!',
        ];
    }
}
