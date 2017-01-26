<?php

namespace App\Http\Controllers\Backend;

use App\Src\Ad\Ad;
use Illuminate\Http\Request;
use App\Core\PrimaryController;
use App\Core\Services\Image\PrimaryImageService;

use App\Http\Requests;

class AdController extends PrimaryController
{
    public $ad;
    public $image;

    public function __construct(Ad $ad, PrimaryImageService $image)
    {
        $this->ad = $ad;
        $this->image = $image;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = $this->ad->all();
        return view('backend.modules.ad.index', compact('ads'));
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
        if ($request->file('image')) {

            $image = $this->image->CreateImage($request->file('image'), ['100','140'], ['370', '550'], ['370', '550']);

        }


        if ($image) {
            \DB::table('side_ads')->insert([
                'image_path' => $image,
                'url' => $request->url,
                'caption_en' => $request->caption_en,
                'caption_ar' => $request->caption_ar,
                'order' => $request->order,
            ]);
            return redirect()->back()->with('success', 'Ad saved');
        }
        return redirect()->back()->with('error', 'Ad not saved')->withInputs();
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->ad->find($id)->delete()) {

            return redirect()->route('backend.ad.index')->with('success', 'ad Deleted Successfully!');

        }
        return redirect()->back()->with('error', 'System Error!!');

//        \DB::table('ads')->where('id', '=', request()->id)->delete();
//        return redirect()->back()->with('success', 'Slide deleted');
    }
}
