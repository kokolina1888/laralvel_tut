<?php

namespace Corp\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Auth;


class MenuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->canDo('add_menus');
        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         return [
            //
            'title'=>'required|max:255'
        ];
    }
}
