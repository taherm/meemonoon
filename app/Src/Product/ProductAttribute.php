<?php

namespace App\Src\Product;

use App\Core\PrimaryModel;
use App\Src\Order\OrderMeta;

class ProductAttribute extends PrimaryModel
{
    protected $table = 'product_attributes';
    protected $localeStrings = ['notes'];
    protected $fillable = ['product_id','qty','notes_en','notes_ar','size_id','color_id'];


    /**
     * Product Attribute
     * hasMany
     * reverse
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Src\Product\Product', 'product_id');
    }

    /**
     * Description : an order meta has one product which has one size and one  color
     * Usage : backend.order.ordermeta.index
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order_meta()
    {
        return $this->hasOne(OrderMeta::class, 'product_attribute_id');
    }

    /**
     * Usage : backend - OrderMeta index
     * Description : returns the size name
     * @param $id
     * @return mixed
     */
    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function getColorNameAttribute()
    {
        return $this->color->color;
    }

    public function getSizeNameAttribute()
    {
        return $this->size->size;
    }

}
