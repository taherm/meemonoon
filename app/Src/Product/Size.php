<?php

namespace App\Src\Product;

use App\Core\PrimaryModel;
use Illuminate\Database\Eloquent\Model;

class Size extends PrimaryModel
{
    /**
     * ManytoMany relation
     * Product Size
     * reverse
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_attributes','size_id','product_id');
    }

    public function scopeSizesList($query)
    {
        return $query->pluck('color')->unique();
    }

    /**
     * Desription : size belongs to many product_attributes
     * Usage : backend.order.ordermeta.index
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product_attributes()
    {
        return $this->hasOne(ProductAttribute::class,'size_id');
    }
}
