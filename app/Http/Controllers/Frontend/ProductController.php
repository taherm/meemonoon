<?php

namespace App\Http\Controllers\Frontend;

use App\Src\Product\ProductFilters;
use App\Src\Product\ProductRepository;
use Illuminate\Http\Request;
use App\Core\PrimaryController;
use Illuminate\Support\Facades\Auth;

class ProductController extends PrimaryController
{
    public $productRepository;


    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }


    public function index(ProductFilters $filters)
    {

        $products = $this->productRepository->model->filters($filters)->paginate(12);

        return view('frontend.modules.product.index', compact('products'));

    }

    public function show($productId)
    {
        $product = $this->productRepository->model->whereId($productId)->with('gallery', 'tagged')->first();

        // return array of ['size_id', 'color', 'att_id','qty' ] for one product
        $data = $product->data;

        $products = $this->productRepository->getRelatedProducts($productId);

        /*
         * Rating Percentage for each product loaded.
         * */
//        var_dump($product->ratingPercentage);
        // wishingList Count = if a user has favorited a product means that he added to the WList
        //var_dump($product->likeCount);

        return view('frontend.modules.product.show', compact('products', 'product', 'data'));
    }

    /**
     * @param $productId
     * @param $sizeId
     * @return mixed
     * Usage : Product Details Page
     * Description : get all data (attribute_id + color + qty ) json response according to the sizeId
     */
    public function getDataFromSize($productId, $sizeId)
    {
        return $this->productRepository->model->whereId($productId)->with('product_attributes')->first()->getDataFromSize($sizeId);
    }

    /**
     * @param $productId
     * @param $colorId
     * @return mixed
     * Usage : Product Details Page
     * Description : get all data (attribute_id + size + qty ) json response according to the colorId
     */
    public function getDataFromColor($productId, $colorId)
    {
        return $this->productRepository->model->whereId($productId)->with('product_attributes')->first()->getDataFromColor($colorId);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Usage : Search Input in the Homepage
     * Description : Search
     */
    public function searchItem(Request $request)
    {

        $products = $this->productRepository->model->searchItem(trim($request->term));

        return view('frontend.modules.product.index', compact('products'));
    }

    public function getTaggedProducts($tagName)
    {

        $products = $this->productRepository->model->whereHas('tagged', function ($q) use ($tagName) {
            $q->where('tag_name', '=', $tagName);
        })->paginate(9);

        return view('frontend.modules.product.index', compact('products'));
    }


    public function getRecommendedProducts()
    {
        $product = Auth::user()->orders()->first()->order_metas()->first();

        $products = $this->productRepository->getWhereId($product->product_id)->first()->categories()->first()->products()->take(6)->get();

        return view('frontend.modules.recommendations.index', compact('products'));

    }

    public function getColorsFromSize($id, $sizeId)
    {
        // attribute_id, colorId, Qty
        $colorList = $this->productRepository->model->colorsFromSize($id, $sizeId);
        dd($colorList);
    }

}
