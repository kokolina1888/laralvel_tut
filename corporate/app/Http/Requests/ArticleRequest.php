<?php

namespace Corp\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->canDo('add_articles');
    }

    protected function getValidatorInstance()
    {
        $validator = parent::getValidatorInstance();
        
        
        return $validator;
        
        
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
       'title'      => 'required|max:255',
       'text'       => 'required',
       'category_id'=> 'required|integer',
       'alias'      => 'sometimes|unique:articles,alias,9|max:255',
        

       ];
   }
}
