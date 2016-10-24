<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class CouponStore extends FormRequest
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
            'value' => 'required|integer',
            'customer_id' => 'required|integer',
            'code' => 'required',
            'active' => 'required|boolean',
            'consumed' => 'required|boolean',
            'due_date' => 'required|date|after:today'
        ];
    }
}
