<?php

namespace App\Src\Order;

use App\Core\PrimaryModel;
use App\Scopes\ScopeCompletedOrdersOnly;
use App\Src\Product\Product;
use App\Src\Product\ProductAttribute;
use Illuminate\Support\Facades\Request;

class OrderMeta extends PrimaryModel
{

    public function order()
    {
        return $this->belongsTo('App\Src\Order\Order');
    }

    /**
     * Usage : backend - backend.order.ordermeta.index
     * Description : returns specific product related to orderMeta
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }


    /**
     * Description : each orderMeta for a product has Only One array of (size , color and quantity)
     * Usage : backend.order.ordermeta.index
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product_attribute()
    {
        return $this->belongsTo(ProductAttribute::class);
    }



}
