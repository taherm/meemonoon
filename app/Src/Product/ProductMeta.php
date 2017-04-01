<?php

namespace App\Src\Product;

use App\Core\PrimaryModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductMeta extends PrimaryModel
{

    protected $table = 'product_metas';
    protected $localeStrings = ['description', 'notes'];
    protected $guarded = [''];
    protected $dates = ['created_at','updated_at','deleted_at','start_sale','end_sale'];
    use SoftDeletes;
    
    /**
     * Product ProductMeta
     * hasOne
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Src\Product\Product');
    }


    public function scopeOnhomepage($query)
    {
        return $query->where('on_homepage', 1);
    }

    public function scopeOnsale($query)
    {
        return $query->where('on_sale', 1);
    }

    public function getFinalPriceAttribute()
    {
        return $this->on_sale ? $this->sale_price : $this->price;
    }

    public function getProductAttributeCount($id)
    {

    }


}
