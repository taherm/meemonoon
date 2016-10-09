<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdate extends FormRequest
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
            'name_ar' => 'required',
            'name_en' => 'required',
            'limited' => 'required',
            'description_ar' => 'string',
            'description_ar' => 'string'
        ];
    }
}
