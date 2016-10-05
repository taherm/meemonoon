<?php

namespace App\Src\Order;

use App\Core\PrimaryModel;
use App\Scopes\ScopeOrdersExcludePending;
use App\Src\Country\Country;
use App\Src\Product\Product;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Request;
use App\Src\Coupon\Coupon;

class Order extends PrimaryModel
{
    use SoftDeletes;

    protected $localeStrings = [];
    protected $with = ['order_metas'];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        if (Request::is('backend/*')) {

            static::addGlobalScope(new ScopeOrdersExcludePending());

        }
    }

    /**
     * Order OrderMeta
     * hasMany
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function order_metas()
    {
        return $this->hasMany('App\Src\Order\OrderMeta', 'order_id');
    }


    /**
     * User Order
     * hasMany
     * reverse
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Src\User\User');
    }


    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_metas', 'order_id', 'product_id');
    }


    public function scopeOfStatus($query, $type)
    {
        return $query->where('status', $type);

    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class, 'coupon_id');
    }


}
