<?php

namespace App\Src\Rating;

use App\Core\PrimaryModel;

class Rating extends PrimaryModel
{
    protected $table = 'ratings';
    protected $localeStrings = [];


    public function Ratingable() {

        return $this->morphTo();

    }
//    /**
//     * Company Rating
//     * many polymorph
//     * many manytomany
//     * reverse
//     * @return mixed
//     */
//    public function companies()
//    {
//        return $this->morphByMany('App\Src\Company\Company', 'ratingable');
//    }
//
//    /**
//     * Branch Rating
//     * many polymorph
//     * many manytomany
//     * reverse
//     * @return mixed
//     */
//    public function branches()
//    {
//        return $this->morphByMany('App\Src\Company\Company', 'ratingable');
//    }
//
//    /**
//     * Product Rating
//     * many polymorph
//     * many manytomany
//     * reverse
//     * @return mixed
//     */
//    public function products()
//    {
//        return $this->morphByMany('App\Src\Company\Company', 'ratingable');
//    }

//    public function getRatingPercentageAttribute()
//    {
//
//        var_dump($this->products()->count());
//
//    }
}
