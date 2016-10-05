<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 5/25/16
 * Time: 4:14 PM
 */

namespace App\Core\Services\Policy;


Interface PrimaryPolicyServiceInterface
{

    public function module($module);

    public function perm($perm);

    public function checkAdminOnly();

    public function checkOwnerShip($user, $model);

    public function checkOwnerShipForModel($user, $model);

}