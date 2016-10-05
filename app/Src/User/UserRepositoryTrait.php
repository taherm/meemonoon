<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 6/2/16
 * Time: 6:12 PM
 */

namespace App\Src\User;


trait UserRepositoryTrait
{

    /**
     * return the company of the authenticated user without any scopes
     * @param $id
     * @return mixed
     */
    public function getCompany($id)
    {
        return $this->getById($id)
            ->company()
            ->first();
    }

    /**
     * return all branches of the authenticated user (Owner Role) without any scopes
     * @param $id
     */
    public function getAllBranchesForLoggedInCompany($id)
    {
        return $this->getById($id)
            ->company()
            ->first()
            ->branches()
            ->with('assistant')
            ->get();
    }

    public function getAllProductsForLoggedInCompany($id)
    {
        return $this->getById($id)
            ->company()
            ->first()
            ->branches()
            ->with('products.categories')
            ->map(function ($branch) {
                return $branch->products;
            });
    }

}