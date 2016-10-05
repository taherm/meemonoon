<?php

namespace App\Core\Traits;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 10/17/15
 * Time: 6:12 PM
 */
trait UserRolesTrait
{

    public function isAdmin()
    {
        $userRoles = Cache::get('role.'.Auth::id());

        if (in_array('admin', [$userRoles], true)) {

            return true;
        }

        return false;
    }

    public function isOwner() {

        $userRoles = Cache::get('role.'.Auth::id());

        if (in_array('owner', [$userRoles], true)) {

            return true;
        }

        return false;
    }

    public function isAssistant() {

        $userRoles = Cache::get('role.'.Auth::id());

        if (in_array('assistant', [$userRoles], true)) {

            return true;
        }

        return false;
    }

}