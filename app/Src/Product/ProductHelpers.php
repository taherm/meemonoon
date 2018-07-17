<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 7/4/16
 * Time: 8:16 PM
 */

namespace App\Src\Product;


trait ProductHelpers
{


    /**
     * @return mixed
     */
    public function getTotalQtyAttribute()
    {
        return is_numeric($this->product_attributes->sum('qty')) ? $this->product_attributes->sum('qty') : 'N/A';
    }

    public function getRatingCounterAttribute()
    {

        return $this->ratings->count();

    }

    public function getTotalRatingValueAttribute()
    {

        return $this->ratings->sum('value');
    }

    public function getRatingPercentageAttribute()
    {

        $totalRatingNumber = $this->ratings->count() * 5;

        if ($totalRatingNumber == 0) {

            return $totalRatingNumber;

        }

        $totalRatingValue = $this->ratings->sum('value');

        return ($totalRatingValue / $totalRatingNumber) * 100;

    }


    /**
     * @return mixed
     * sizes available for this instance of project
     */
    public function getSizesAttribute()
    {
        return $this->product_attributes->map(function ($item) {
            return $item->name;
        });
    }

    /**
     * @return mixed
     * colors available for this instance of project
     */
    public function getColorsAttribute()
    {
        return $this->product_attributes->map(function ($item) {
            return $item->name;
        });
    }
}