<?php

namespace App\Src\Currency;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = 'currencies';
    protected $guarded = [''];
    /**
     * Country Currency
     * hasOne
     * reverse
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo('App\Src\Country\Country','code');
    }
}
