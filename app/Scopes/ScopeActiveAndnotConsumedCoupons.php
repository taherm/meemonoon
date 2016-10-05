<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 8/10/16
 * Time: 6:44 PM
 */

namespace App\Scopes;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ScopeActiveAndnotConsumedCoupons implements Scope
{
    /* Apply the scope to a given Eloquent query builder.
    *
    * @param  \Illuminate\Database\Eloquent\Builder  $builder
    * @param  \Illuminate\Database\Eloquent\Model  $model
    * @return void
    */
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('active', 1)->where('consumed', 0)->where('due_date', '>=', Carbon::now());
    }
}
