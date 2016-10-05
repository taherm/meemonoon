<?php

namespace App\Src\Category;

use App\Core\PrimaryModel;
use app\Src\Product\QueryFilter;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends PrimaryModel
{


    protected $table = 'categories';
    public $localeStrings = ['name', 'description'];
    use SoftDeletes;

    /**
     * * ParentCategory
     * reverse
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo('App\Src\Category\Category', 'parent_id');
    }

    /**
     * * ChildCategory
     * hasMany
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {

        return $this->hasMany('App\Src\Category\Category', 'parent_id');
    }

    /**
     * Category Product hasManyThrough ProductCategory
     * ManyToMany
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->belongsToMany('App\Src\Product\Product', 'category_product');
    }

    public function scopeTotalColorQty($q, $colorId)
    {
        return $q->products()->map(function ($item) use ($colorId) {

            $item->TotalColorQty($colorId);

        });
    }

    /**
     * @param $query
     * @param QueryFilter $filters
     * @return \Illuminate\Database\Eloquent\Builder
     * Usage : Category Page - Filtering all products according to parameters
     * Description : chaining filters within the Query String
     */
    public function scopeFilters($query, QueryFilter $filters)
    {
        return $filters->apply($query);
    }
}
