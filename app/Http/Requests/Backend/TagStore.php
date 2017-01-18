<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class TagStore extends FormRequest
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
            'name' => 'required|unique:tagging_tags,name|min:3|max:255|alpha_dash',
            'name_en' => 'required|unique:tagging_tags,name|min:3|max:255|alpha_dash',
        ];
    }
}
