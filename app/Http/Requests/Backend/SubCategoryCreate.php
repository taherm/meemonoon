<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryCreate extends FormRequest
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
//            'name_en'           => 'required|unique:categories,name_en',
            'name_en'           => 'required',
//            'name_ar'           => 'required|unique:categories,name_ar',
            'name_ar'           => 'required',
            'description_en'    => 'string',
            'description_ar'    => 'string',
            'parent_id'    => 'required',
            'order'    => 'required',
            'image' => 'required|image',
        ];
    }
}
