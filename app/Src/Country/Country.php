<?php
namespace App\Src\Country;

use App\Core\PrimaryModel;
use App\Core\Traits\LocaleTrait;
use App\Src\Order\Order;

class Country extends PrimaryModel
{


    protected $table = 'countries';
    protected $guarded = ['id'];
    protected $localeStrings = ['name'];
    public $timestamps = false;

    use LocaleTrait;

    /**
     * Country Area
     * hasMany
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function areas()
    {
        return $this->hasMany('App\Src\Country\Area');
    }


    /**
     * Country Currency
     * hasOne
     * @return mixed
     */
    public function currency()
    {
        return $this->hasOne('App\Src\Currency\Currency','code','currency_code');
    }

    public function getAllList($key, $value)
    {

        $this->all()->each(function ($element) use ($key, $value) {

            $this->countriesList[$element->$key] = $element->$value;


        });

        return $this->countriesList;
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }


}
