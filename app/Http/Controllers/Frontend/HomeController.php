<?php

namespace App\Http\Controllers\Frontend;

use App\Core\PrimaryController;
use App\Src\Company\CompanyRepository;
use App\Http\Requests;
use App\Src\Product\ProductRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class HomeController extends PrimaryController
{
    /**
     * @var ProductRepository
     */
    public $productRepository;


    /**
     * HomeController constructor.
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Description : show all products for specific company and all branches related to the company
     * @param int $companyId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     */
    public function index()
    {
        //@todo : Query From ProductRepo like bstSaleProducts
        $newArrivals = $this->productRepository->model->orderBy('created_at', 'desc')->take(10)->get();

        $onSaleProducts = $this->productRepository->model->onsale()->take(10)->get();

        $bestSalesProducts = $this->productRepository->bestSalesProducts();

        return view('frontend.home', compact(
            'newArrivals',
            'onSaleProducts',
            'bestSalesProducts'
        ));

    }

}
