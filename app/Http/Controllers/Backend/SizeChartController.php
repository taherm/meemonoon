<?php

namespace App\Http\Controllers\Backend;

use App\Core\Services\Image\PrimaryImageService;
use App\Http\Controllers\Controller;
use App\Src\Gallery\Gallery;
use App\Src\Gallery\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SizeChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizeCharts = Gallery::where(['galleryable_type' => 'size_chart'])->has('images')->get();
        return view('backend.modules.size.size_chart.index', compact('sizeCharts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.modules.size.size_chart.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file('image')) {
            $imageCreate = New PrimaryImageService();
            $image = $imageCreate->CreateImage($request->file('image'));
            $gallery = new Gallery();
            $gallery = $gallery->create(['galleryable_id' => 0, 'galleryable_type' => 'size_chart', 'description_en' => $request->description_en, 'description_ar' => $request->description_en]);
            if ($image) {
                DB::table('images')->insert([
                    'gallery_id' => $gallery->id,
                    'thumb_url' => $image,
                    'medium_url' => $image,
                    'large_url' => $image,
                    'caption_ar' => $request->description_en,
                    'caption_en' => $request->description_en
                ]);

                return redirect()->route('backend.chart.index')->with('success', 'image saved');
            }
            return redirect()->back()->with('error', 'chart not saved');
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
        $sizeChart = Gallery::whereId($id)->first();

        return view('backend.modules.size.size_chart.edit', compact('sizeChart'));
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
        $gallery = Gallery::whereId($id)->first();
        $gallery->update(['description_en' => $request->description_en]);
        if ($request->file('image')) {
            $imageCreate = New PrimaryImageService();
            $image = $imageCreate->CreateImage($request->file('image'));
            if ($image) {
                 DB::table('images')->insert([
                    'gallery_id' => $gallery->id,
                    'thumb_url' => $image,
                    'medium_url' => $image,
                    'large_url' => $image,
                    'caption_ar' => $request->description_en,
                    'caption_en' => $request->description_en
                ]);

                return redirect()->back()->with('success', 'size chart saved');
            }
        }

        return redirect()->back()->with('success', 'size chart saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sizeChart = Gallery::whereId($id)->delete();
        if ($sizeChart) {
            return redirect()->back()->with(['success' => 'deleted']);
        }
        return redirect()->back()->with(['error' => 'not deleted']);
    }
}
