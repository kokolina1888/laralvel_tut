<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PagesAddRequest extends FormRequest
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
        'name' => 'required|max:255',
        'alias' => 'required|unique:pages|max:255',
        'text' => 'required'
        ];
    }

    public function messages()
    {
        return [
        'name.required' => 'Er, you forgot your email address!',       
        ];
    }
}
