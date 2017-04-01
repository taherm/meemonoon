<?php

namespace App\Http\Controllers\Backend;

use App\Core\PrimaryController;
use App\Src\Order\OrderMeta;
use App\Src\Product\Color;
use App\Src\Product\ProductAttribute;
use App\Src\Product\Size;
use Illuminate\Http\Request;
use App\Src\Product\ProductRepository;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ProductAttributeController extends PrimaryController
{
    public $productAttribute;
    public $productRepository;

    public function __construct(ProductAttribute $productAttribute, ProductRepository $productRepository)
    {
        $this->productAttribute = $productAttribute;
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = $this->productRepository->model->whereId(request()->product_id)->with('product_attributes.color', 'product_attributes.size')->first();

        return view('backend.modules.product.attribute.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $productAttributes = $this->productAttribute->where('product_id', request()->product_id)->get();

        $product = $this->productRepository->model->whereId(request()->product_id)->first();

        return view('backend.modules.product.attribute.create', compact('product', 'productAttributes', 'sizes', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProductAttribute::create($request->except(['_token', '_method']));

        return redirect()->back()->with(['success' => 'product completely saved']);
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
    public function edit($id, Request $request)
    {
        $productAttribute = ProductAttribute::whereId($id)->first();

        return view('backend.modules.product.attribute.edit', compact('productAttribute'));
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
        $productAttribute = ProductAttribute::whereId($id)->update($request->except(['_token', '_method']));

        $productAttributes = $this->productAttribute->where('product_id', request()->product_id)->get();

//        $product = $this->productRepository->model->whereId(request()->product_id)->first();

//        return view('backend.modules.product.attribute.create', compact('product', 'productAttributes', 'sizes', 'colors'));

        return redirect()->route('backend.attribute.index',['product_id' => request()->product_id])->with('success' , 'attribute saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productAttribute = $this->productAttribute->where('id', $id)->first();

        $orderMeta = OrderMeta::where('product_attribute_id', $productAttribute->id)->first();

        if (!$orderMeta) {

            $productAttribute->delete();

            return redirect()->back()->with('success', 'deleted');
        }
        return redirect()->back()->with('error', 'not deleted - some orders are relying on such attributes - cant be deleted');
    }
}
