<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Core\PrimaryController;
use App\Src\Product\ProductRepository;
use App\Src\Gallery\Gallery;
use App\Core\Services\Image\PrimaryImageService;

use App\Http\Requests;

class GalleryController extends PrimaryController
{
    public $productRepository;
    public $gallery;
    public $image;

    public function __construct(ProductRepository $productRepository, Gallery $gallery, PrimaryImageService $image)
    {
        $this->productRepository = $productRepository;
        $this->gallery = $gallery;
        $this->image = $image;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = $this->productRepository->getById(request()->get('product_id'));
        $gallery = $product->gallery()->with('images')->first();
        return view('backend.modules.gallery.index', compact('product', 'gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = $this->productRepository->getById($request->product_id);

        $image = $this->image->CreateImage($request->file('image'));

        if ($image) {
            \DB::table('images')->insert([
                'gallery_id' => $request->gallery_id,
                'thumb_url' => $image,
                'medium_url' => $image,
                'large_url' => $image,
                'caption_ar' => $request->caption_ar,
                'order' => $request->order,
                'caption_en' => $request->caption_en
            ]);
            return redirect()->back()->with('success','image saved');
        }
        return redirect()->back()->with('error','image not saved')->withInputs();
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
        $product = $this->productRepository->getById($request->product_id);

        $image = $this->image->CreateImage($request->file('image'));

        if ($image) {
            \DB::table('images')->insert([
                'gallery_id' => $request->gallery_id,
                'thumb_url' => $image,
                'medium_url' => $image,
                'large_url' => $image,
                'order' => $request->order,
                'caption_ar' => $request->caption_ar,
                'caption_en' => $request->caption_en
            ]);
            return redirect()->back()->with('success','image saved');
        }
        return redirect()->back()->with('error','image not saved')->withInputs();
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

    public function deleteImage()
    {
        \DB::table('images')->where('id', '=', request()->image_id)->delete();
        return redirect()->back()->with('success', 'image deleted');
    }
}
