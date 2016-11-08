<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 8/31/15
 * Time: 10:40 AM
 */

namespace App\Core;


use App\Core\Traits\UserRolesTrait;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;


class PrimaryController extends Controller
{

    function paginateCollection($collection, $perPage)
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentPageItems = $collection->slice(($currentPage - 1) * $perPage, $perPage);
        $paginator = new LengthAwarePaginator($currentPageItems, $collection->count(), $perPage);
        $paginator->setPath(LengthAwarePaginator::resolveCurrentPath() . (request()->getQueryString() ? ('?' . request()->getQueryString()) : ''));

        return $paginator;
    }


}