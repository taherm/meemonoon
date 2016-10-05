<?php

namespace App\Policies;

use App\Core\Services\Policy\PrimaryPolicyService;
use App\Core\Traits\UserRolesTrait;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ProductPolicy extends PrimaryPolicyService
{
    use HandlesAuthorization, UserRolesTrait;

    public function show($user, $product)
    {
        return $this->checkOwnerShipForModel($user, $product->company->user_id);

    }

    public function edit($user, $product)
    {
        return $this->checkOwnerShipForModel($user, $product->company->user_id);
    }

    public function update($user, $product)
    {
        return $this->checkOwnerShipForModel($user, $product->company->user_id);

    }

}
