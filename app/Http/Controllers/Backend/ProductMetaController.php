<?php

namespace App\Http\Controllers\Backend;

use App\Core\PrimaryController;
use App\Core\Services\Image\PrimaryImageService;
use App\Src\Product\ProductMeta;
use Illuminate\Http\Request;
use App\Http\Requests;

class ProductMetaController extends PrimaryController
{

    public $productMeta;

    public function __construct(ProductMeta $productMeta)
    {
        $this->productMeta = $productMeta;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_id = request()->product_id;
        return view('backend.modules.product.meta.create', compact('product_id'))
            ->with('warning', trans('general.message.warning.product_meta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            if ($request->hasFile('image')) {
                $image = new PrimaryImageService();
                $image = $image->CreateImage($request->file('image'), ['261', '300'], ['485', '550']);
                $request->request->add(['image' => $image]);
            }

            if ($request->hasFile('size_chart_image')) {
                $image = new PrimaryImageService();
                $image = $image->CreateImage($request->file('size_chart_image'), ['261', '300'], ['485', '550']);
                $request->request->add(['size_chart_image' => $image]);
            }

            if ($this->productMeta->create($request->request->all())) {

                return redirect()
                    ->route('backend.attribute.create', [$request->product_id, 'product_id' => $request->product_id])
                    ->with('success', 'updated');
            }

        } catch (\Exception $e) {
            return redirect()
                ->route('backend.meta.create', [$request->product_id, 'product_id' => $request->product_id])
                ->with('error', $e->getMessage());
        }
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
        $productMeta = $this->productMeta->where('product_id', request()->product_id)->first();

        if ($productMeta) {
            return view('backend.modules.product.meta.create', compact('productMeta'));
        }
        return redirect()->route('backend.meta.create', ['id' => $id])->with('warning', trans('general.messsage.warning.create_new'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\Backend\ProductMetaUpdate $request, $id)
    {

        $productMeta = $this->productMeta->where('product_id', request()->product_id)->first();

        try {
            if ($request->hasFile('image')) {
                $image = new PrimaryImageService();
                $image = $image->CreateImage($request->file('image'), ['261', '300'], ['485', '550']);
                $request->request->add(['image' => $image]);
            }

            if ($request->hasFile('size_chart_image')) {
                $image = new PrimaryImageService();
                $image = $image->CreateImage($request->file('size_chart_image'), ['261', '300'], ['485', '550']);
                $request->request->add(['size_chart_image' => $image]);
            }

            $productMeta->update($request->request->all());

            return redirect()->route('backend.meta.edit', [$id, 'product_id' => request()->product_id])->with('success', 'updated');

        } catch (\Exception $e) {
            return redirect()->route('backend.meta.edit', [$id, 'product_id' => request()->product_id])->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
