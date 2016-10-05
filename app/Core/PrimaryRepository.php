<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 8/29/15
 * Time: 5:56 PM
 */

namespace App\Core;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


/**
 * App\Core\PrimaryRepository
 *
 */
abstract class PrimaryRepository
{

    const productsLIMIT = 10;
    public $model;

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function getWhereId($id, $element = 'id')
    {
        return $this->model->where($element, '=', $id);
    }


    public function getEnumValues($table, $column)
    {
        $type = DB::select(DB::raw("SHOW COLUMNS FROM $table WHERE Field = '$column'"))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $enum = array();
        foreach (explode(',', $matches[1]) as $value) {
            $v = trim($value, "'");
            $enum = array_add($enum, $v, $v);
        }
        return $enum;
    }

}