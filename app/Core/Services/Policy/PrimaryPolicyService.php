<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 9/20/15
 * Time: 2:51 PM
 */

namespace App\Core\Services\Policy;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Core\Traits\UserRolesTrait;

class PrimaryPolicyService implements PrimaryPolicyServiceInterface
{

    use UserRolesTrait;

    public function before()
    {

        if ($this->isAdmin()) {

            return true;

        }
    }

    public function module($module)
    {
        if (in_array($module, Cache::get('modules.' . Auth::user()->id)->toArray(), true)) {

            return true;

        }

        return false;

    }

    public function perm($perm)
    {

        if (in_array($perm, Cache::get('perms.' . Auth::user()->id)->toArray(), true)) {

            return true;

        }

        return false;
    }


    public function checkAdminOnly()
    {
        if ($this->isAdmin()) {

            return true;

        }

        return false;
    }


    public function checkOwnerShip($user, $model)
    {

        return ($user->id === $model->id) ? true : false;

    }

    public function checkOwnerShipForModel($user, $modelOwnerId)
    {

        if ($this->isOwner() || $this->isAssistant()) {

            return ($user->id === $modelOwnerId) ? true : false;

        }

        return false;

    }

}