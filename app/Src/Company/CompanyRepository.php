<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 4/13/16
 * Time: 6:50 PM
 */

namespace App\Src\Company;

use App\Core\PrimaryRepository;
use App\Src\User\UserRepository;
use App\Src\Helpers\AdminRepoHelpers;
use App\Src\Helpers\AbstractRepoHelpers;
use App\Src\Helpers\FrontendRepoHelpers;
use Illuminate\Support\Facades\Config;

class CompanyRepository extends PrimaryRepository
{

    public $productRepository;
    public $userRepository;


    public function __construct(Company $company)
    {
        $this->model = $company;

    }


    /**
     * Description : will get all new arvials for specific company with all the branches
     * used : Homepage
     * @param int $companyId
     * @param int $limit
     * @param int $paginate
     * @return mixed
     */
    public function getActiveNewArivalsForCompanyBranches($companyId = 1)
    {
        return $this->getById($companyId)
//            ->branches()
            ->with(['products' => function ($q) {
                $q->whereHas('product_meta', function ($q) {
                    $q->onhomepage();
                })->orderBy('created_at')->take(parent::productsLIMIT);
            }])
            ->first();// only for meem and noon = the first branch only;
    }


    /**
     * Description : will fetch all onSale products for specific company
     * used : homepage
     * @param string $companyId
     * @param int $limit
     * @param int $paginate
     * @return mixed
     */
    public function getActiveOnSaleForCompanyBranches($companyId = 1)
    {
        return $this->getById($companyId)
//            ->branches()
            ->with(['products' => function ($q) {
                $q->whereHas('product_meta', function ($q) {
                    $q->onsale()->onhomepage();
                })->orderBy('created_at')->take(parent::productsLIMIT);
            }])
            ->first(); // only for meem and noon -- the first branch only
    }


    /**
     * Description : get all products for specific category for specific company
     * used : category Page
     * @param $companyId
     * @param $categoryParentId
     * @param $categoryChildId
     * @return mixed
     */
    public function getAllProductsForCategoriesAndCompany($categoryParentId = '1', $categoryChildId)
    {
        return $this->getById(1)
            ->with(['products' => function ($q) use ($categoryParentId, $categoryChildId) {
                $q->whereHas('categories', function ($q) use ($categoryParentId, $categoryChildId) {
                    $q->with('categories')->where('categories.parent_id', $categoryParentId)->orWhere('categories.id', $categoryChildId);
                })->orderBy('created_at');
            }])
            ->first();

    }
}