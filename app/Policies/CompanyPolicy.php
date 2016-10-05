<?php

namespace App\Policies;

use App\Core\Services\Policy\PrimaryPolicyService;
use App\Core\Traits\UserRolesTrait;
use Illuminate\Auth\Access\HandlesAuthorization;


class CompanyPolicy extends PrimaryPolicyService
{
    use HandlesAuthorization, UserRolesTrait;


    public function show($user, $company)
    {
        return $this->checkOwnerShipForModel($user, $company->owner->id);

    }

    public function edit($user, $company)
    {
        return $this->checkOwnerShipForModel($user, $company->owner->id);
    }

    public function update($user, $company)
    {
        return $this->checkOwnerShipForModel($user, $company->owner->id);

    }
}
