<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ProductMetaStore extends FormRequest
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
            'image' => 'required|mimes:jpeg,bmp,png',
            'price' => 'required',
            'weight' => 'required|min:1',
            'description_ar' => 'required',
            'description_en' => 'required',
            'notes_ar' => '',
            'notes_en' => '',
            'start_sale' => 'date|after:today',
            'end_sale' => 'date|after:tomorrow'
        ];
    }
}
