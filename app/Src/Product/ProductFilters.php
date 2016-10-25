<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 5/31/16
 * Time: 11:50 AM
 */

namespace App\Src\Product;


use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class ProductFilters extends QueryFilter
{

    public function between($range)
    {
        $between = explode('-',$range);
        $min = $between[0];
        $max = $between[1];
        if (!$this->request->has('price')) {
            return $this->builder->whereHas('product_meta', function ($q) use ($min,$max) {
                $q->where('product_metas.price','>=', number_format($min))->where('product_metas.price','<=',$max);
            });
        }
    }

    public function max($max)
    {
        if (!$this->request->has('price') && $this->request->has('max')) {
            return $this->builder->whereHas('product_meta', function ($q) use ($max) {
                $q->where('price', '<=', $max);
            });
        }
    }

    public function min($min)
    {
        if (!$this->request->has('price') && $this->request->has('min')) {
            return $this->builder->whereHas('product_meta', function ($q) use ($min) {
                $q->where('price', '>=', $min);
            });
        }
    }

    public function price($price)
    {
        if (!$this->request->has('min') || $this->request->has('max')) {
            return $this->builder->whereHas('product_meta', function ($q) use ($price) {
                $q->where('price', $price);
            });
        }
    }

    public function color($colorId)
    {
        return $this->builder->whereHas('product_attributes', function ($q) use ($colorId) {
            $q->where('color_id', $colorId);
        });
    }

    public function size($sizeId)
    {
        return $this->builder->whereHas('product_attributes', function ($q) use ($sizeId) {
            $q->where('size_id', $sizeId);
        });
    }

    public function parent($parent)
    {
        return $this->builder->whereHas('categories', function ($q) use ($parent) {
            $q->where('category_id', $parent);
        });
    }

    public function child($child)
    {

        return $this->builder->whereHas('categories', function ($q) use ($child) {
            $q->where('category_id', $child);
        });
    }

}