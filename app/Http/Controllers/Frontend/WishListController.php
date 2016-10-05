<?php

namespace App\Http\Controllers\Frontend;

use App\Core\PrimaryController;
use App\Src\User\UserRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Src\Product\ProductRepository;
use Illuminate\Support\Facades\Auth;


class WishListController extends PrimaryController
{
    public $productRepository;
    public $userRepository;


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
        $wishlistProducts = $this->productRepository->model->with(['product_meta'])->WhereLikedBy()->get();

        $wishlistProductsCount = $wishlistProducts->count();

        return view('frontend.modules.wishlist.index',compact('wishlistProducts','wishlistProductsCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addProduct($id)
    {
        $product = $this->productRepository->getById($id)->like();

        return redirect()->back()->with('success',trans('messages.success.wlist_stored'));
    }

    public function removeProduct($id)
    {
        $product = $this->productRepository->getById($id)->unlike();

        return redirect()->back()->with('success',trans('messages.success.wlist_stored'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->getWhereId($id)->first()->unlike();

        return redirect()->back()->with('success',trans('messages.success.wlist_stored'));
    }
}
