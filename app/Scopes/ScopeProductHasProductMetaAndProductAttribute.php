<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 5/8/16
 * Time: 8:14 PM
 */

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\App;

class ScopeProductHasProductMetaAndProductAttribute implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $builder
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $builder->has('categories')->has('product_meta')->has('product_attributes')->has('gallery');

    }

}