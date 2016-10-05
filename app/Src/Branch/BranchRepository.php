<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 4/13/16
 * Time: 7:41 PM
 */

namespace App\Src\Branch;

use App\Core\PrimaryRepository;
use App\Src\Company\CompanyRepository;
use App\Src\Helpers\AdminRepoHelpers;
use App\Src\Helpers\AbstractRepoHelpers;
use App\Src\User\UserRepository;


class BranchRepository extends PrimaryRepository
{

    protected $userRepository;
    protected $companyRepository;

    public function __construct(Branch $branch, UserRepository $userRepository, CompanyRepository $companyRepository)
    {
        $this->model = $branch;
        $this->userRepository = $userRepository;
        $this->companyRepository = $companyRepository;
    }

}