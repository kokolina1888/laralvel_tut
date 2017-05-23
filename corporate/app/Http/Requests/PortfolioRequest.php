<?php

namespace Corp\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Auth;

class PortfolioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->canDo('add_portfolios');
        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = (isset($this->route()->parameter('portfolios')->id)) ? $this->route()->parameter('portfolios')->id : '';
        
        return [
            //
       'title'      => 'required|max:255',
       'text'       => 'required',
       'alias'      => 'sometimes|max:255|unique:portfolios,id'.$id,      

       ];
    }
}
// 1RSycUaP.jpg