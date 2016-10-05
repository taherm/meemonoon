<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Src\Company\CompanyRepository;
use App\Src\Category\CategoryRepository;
use App\Src\Product\ProductRepository;
use App\Core\PrimaryController;

class CompanyController extends PrimaryController
{
    protected $companyRepository;
    protected $categoryRepository;
    protected $productRepository;


    /**
     * Create a new controller instance.
     *
     */
    public function __construct(
        CompanyRepository $companyRepository,
        CategoryRepository $categoryRepository,
        ProductRepository $productRepository
    )
    {
        $this->companyRepository = $companyRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }


    /**
     * Description : show all products for specific company and all branches related to the company
     * @param int $companyId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     */
    public function index($companyId = null)
    {
        $company = ($companyId != null) ? $this->companyRepository->getById($companyId) : $this->companyRepository->model->first();

        abort_if(!$company, 501, trans('messages.error.no_company'));

        $newArivals = $this->companyRepository->getActiveNewArivalsForCompanyBranches()->products;

        $onSale = $this->companyRepository->getActiveOnSaleForCompanyBranches()->products;

        $bestSales = $this->productRepository->getBestSalesProductsForCompany();

        return view('frontend.modules.home.index', compact(
            'newArivals',
            'onSale',
            'bestSales'
        ));

    }

    public function show($id)
    {
        $company = $this->companyRepository->getWhereId($id)->with('branches')->get();

        var_dump($company);

    }

}
