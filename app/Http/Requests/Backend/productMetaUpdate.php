<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class ProductMetaUpdate extends FormRequest
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
            'product_id' => 'required',
            'price' => 'required',
            'weight' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'notes_ar' => '',
            'notes_en' => '',
        ];
    }
}
