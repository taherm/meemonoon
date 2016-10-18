<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;
use App\Src\Product\ProductRepository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ProductStore extends FormRequest
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
            "name_ar" => "required|max:255|min:2",
            "name_en" => "required|max:255|min:2",
            'parent_id' => 'required',
            "categories" => 'required|array',
            "tags" => 'required|array',
            "sku" => "required",
            "active" => "required|boolean"
        ];
    }

    public function persist(ProductRepository $productRepository)
    {
        try {
            $product = $productRepository->model->create($this->except('product_id','parent_id','categories', 'tags'));
            $product->gallery()->create(['description_ar' => $this->input('name_ar'), 'description_en' => $this->input('name_en')]);
            $product->categories()->sync($this->input('parent_id'));
            $product->categories()->sync($this->input('categories'));
            foreach ($this->tags as $key => $value) {
                $product->tag($value);
            }
            return $product->id;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
