<?php

namespace App\Http\Controllers\Backend;

use App\Src\User\UserRepository;
use App\Http\Requests;
use App\Core\PrimaryController;
use App\Src\Product\ProductRepository;

class ProductController extends PrimaryController
{

    protected $productRepository;
    protected $userRepository;

    public function __construct(ProductRepository $productRepository, UserRepository $userRepository)
    {
        $this->productRepository = $productRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (request()->get('trashed') == 1) {

            $products = Product::withoutGlobalScopes()->orderBy('created_at', 'desc')->onlyTrashed()->get();

        } else {

            $products = $this->productRepository->model->orderBy('created_at', 'desc')->has('product_meta')->get();

        }
        return view('backend.modules.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriesList = [];
        $productTagsNameList = [];
        return view('backend.modules.product.create', compact('categoriesList', 'productTagsNameList'));
    }


    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\Backend\ProductStore $request)
    {
        $productId = $request->persist($this->productRepository);

        return redirect()->route('backend.meta.create', ['product_id' => $productId])
            ->with('success', 'product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->productRepository->getById($id);

//        var_dump($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->productRepository->getById($id);

        $categoriesList = $product->categories()->pluck('id')->toArray();

        $productTagsNameList = $product->tagged()->pluck('tag_slug')->toArray();

        //dd($productTagsNameList);
        return view('backend.modules.product.create', compact('product', 'categoriesList', 'tagsList', 'productId', 'productTagsNameList'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\Backend\ProductUpdate $request, $id)
    {
        $product = $this->productRepository->getById($id);

        $request->persist($product);

        session()->put('productId', $product->id);

        return redirect()->back()->with('success', trans('general.message.success.product_update'));
    }

    /**
     * Remove the specified resource from storage.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->getById($id)->delete();

        return redirect()->back()->with('success', 'product deleted');
    }

}
