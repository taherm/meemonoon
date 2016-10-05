<?php
namespace App\Src\Country;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{


    /**
     * Country Area
     * hasMany
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo('App\Src\Country\Country');
    }

    /**
     * hasMany
     * Area Branch
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function branches()
    {
        return $this->hasMany('App\Src\Branch\Branch');
    }
}
