<?php

namespace App\Src\Coupon;

use App\Core\PrimaryModel;
use App\Src\User\User;
use App\Src\Order\Order;
use App\Scopes\ScopeActiveAndnotConsumedCoupons;
use Illuminate\Support\Facades\Request;

class Coupon extends PrimaryModel
{
    protected $table = 'coupons';
    protected $dates = ['created_at', 'updated_at', 'due_date', 'deleted_at'];
    protected $guarded = [];

    /**
     * The "booting" method of the model.
     * applying the scope only in the backend routes.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        if (!Request::is('backend/*')) {

            static::addGlobalScope(new ScopeActiveAndnotConsumedCoupons());

        }

    }

    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
