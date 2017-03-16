<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 5/31/16
 * Time: 11:49 AM
 */

namespace app\Src\Product;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;

abstract class QueryFilter
{

    public $request;
    protected $builder;

    public function __construct(\Illuminate\Http\Request $request)
    {
        $this->request = $request;

    }

    public function apply(Builder $builder)
    {

        $this->builder = $builder;

        foreach ($this->filters() as $name => $value) {

            if (method_exists($this, $name)) {

                call_user_func_array([$this, $name], array_filter([$value]));

            }
        }
        return $this->builder;
    }

    public function filters()
    {
        return array_collapse($this->request->all());
    }

    public function filterRequest()
    {
        return $this->request();
    }


    public static function isJoined($query, $table)
    {
        $joins = $query->getQuery()->joins;
        if ($joins == null) {
            return false;
        }
        foreach ($joins as $join) {
            if ($join->table == $table) {
                return true;
            }
        }
        return false;
    }


}