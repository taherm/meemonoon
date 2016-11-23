<?php

namespace App\Src\Product;

use App\Core\PrimaryModel;
use Illuminate\Database\Eloquent\Model;

class Color extends PrimaryModel
{
    protected $localeStrings = ['name'];

    /**
     * ManyToMay Relation
     * Product color
     * reverse
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_attributes', 'color_id', 'product_id');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeColorsList($query)
    {
        return $query->pluck('name')->unique();
    }

    /**
     * Desription : color belongs to many product_attributes
     * Usage : backend.order.ordermeta.index
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product_attributes()
    {
        return $this->hasOne(ProductAttribute::class,'color_id');
    }

}
