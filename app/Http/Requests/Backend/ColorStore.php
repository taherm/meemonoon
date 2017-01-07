<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class ColorStore extends FormRequest
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
            'name_ar' => 'required|min:2|unique:colors,name_ar',
            'name_en' => 'required|min:2|unique:colors,name_en',
//            'code' => 'required|string|unique:colors,code'
        ];
    }
}
