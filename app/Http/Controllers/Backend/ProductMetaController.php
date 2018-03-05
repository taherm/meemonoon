<?php

namespace App\Http\Controllers\Backend;

use App\Core\PrimaryController;
use App\Core\Services\Image\PrimaryImageService;
use App\Src\Gallery\Gallery;
use App\Src\Product\ProductMeta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\Backend\ProductMetaUpdate;
use App\Http\Requests\Backend\ProductMetaStore;

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
        $sizeCharts = Gallery::where(['galleryable_type' => 'size_chart'])->has('images')->get();

        return view('backend.modules.product.meta.create', compact('sizeCharts'))
            ->with('warning', trans('general.message.warning.product_meta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductMetaStore $request)
    {
        $request->request->add(['start_sale' => Carbon::parse($request->input('start_sale'))]);
        $request->request->add(['end_sale' => Carbon::parse($request->input('end_sale'))]);
        try {
            if ($request->hasFile('image')) {
                $image = new PrimaryImageService();
                $image = $image->CreateImage($request->file('image'));
                $request->request->add(['image' => $image]);
            }

            if ($request->hasFile('size_chart_image')) {
                $image = new PrimaryImageService();
                $image = $image->CreateImage($request->file('size_chart_image'));
                $request->request->add(['size_chart_image' => $image]);
            } elseif ($request->has('size_chart')) {
                $request->request->add(['size_chart_image' => $request->size_chart]);
            }
            $request->request->remove('size_chart');

            $product = $this->productMeta->create($request->request->all());

            if ($product) {
                return redirect()
                    ->route('backend.attribute.create', ['product_id' => $request->product_id])
                    ->with('success', 'updated');
            }

        } catch (\Exception $e) {
            return redirect()
                ->route('backend.meta.create', ['product_id' => $request->product_id])
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

        $sizeCharts = Gallery::where(['galleryable_type' => 'size_chart'])->has('images')->get();

        if ($productMeta) {
            return view('backend.modules.product.meta.create', compact('productMeta', 'sizeCharts'));
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
    public function update(ProductMetaUpdate $request, $id)
    {

        $productMeta = $this->productMeta->where('product_id', request()->product_id)->first();
        $request->request->add(['start_sale' => Carbon::parse($request->input('start_sale'))]);
        $request->request->add(['end_sale' => Carbon::parse($request->input('end_sale'))]);
        try {
            if ($request->hasFile('image')) {
                $image = new PrimaryImageService();
                $image = $image->CreateImage($request->file('image'));
                $request->request->add(['image' => $image]);
            }

            if ($request->hasFile('size_chart_image')) {
                $image = new PrimaryImageService();
                $image = $image->CreateImage($request->file('size_chart_image'));
                $request->request->add(['size_chart_image' => $image]);
            } else  {
                $request->request->add(['size_chart_image' => $request->size_chart]);
            }

            $request->request->remove('size_chart');

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
