<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Core\Services\Policy\PrimaryPolicyService;

class UserPolicy extends PrimaryPolicyService
{
    use HandlesAuthorization;

    public function show($user, $model)
    {
        return $this->checkOwnerShipForModel($user, $model->id);
    }

    public function edit($user, $model)
    {
        return $this->checkOwnerShipForModel($user, $model->id);
    }

    public function update($user, $model)
    {
        return $this->checkOwnerShipForModel($user, $model->id);
    }
}
