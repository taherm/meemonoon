<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;
use App\Src\Product\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProductUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name_ar" => "required|max:255|min:2",
            "name_en" => "required|max:255|min:2",
            "categories" => 'required|array',
            "tags" => 'required|array',
            "sku" => "required",
            "active" => "required|boolean"
        ];
    }

    public function persist(Product $product)
    {
        try {
            $product->update($this->except('categories', 'tags'));
            $product->categories()->sync($this->input('categories'));
            $product->retag($this->tags);
            return true;

        } catch (\Exception $e) {
            throw $e;
        }
    }
}
