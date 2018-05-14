<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Core\PrimaryController;
use App\Src\Slider\Slider;
use App\Core\Services\Image\PrimaryImageService;

use App\Http\Requests;

class SliderController extends PrimaryController
{
    public $slider;
    public $image;

    public function __construct(Slider $slider, PrimaryImageService $image)
    {
        $this->slider = $slider;
        $this->image = $image;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = $this->slider->all();
        return view('backend.modules.slider.index', compact('slides'));
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
        $image = $this->image->CreateImage($request->file('image'), ['1','1'],['578', '231'], ['1905', '753']);

        if ($image) {
            \DB::table('sliders')->insert([
                'image_path' => $image,
                'url' => $request->url,
                'order' => $request->order,
                'caption_en' => $request->caption_en,
                'caption_ar' => $request->caption_ar,
                'active'    => 1
            ]);
            return redirect()->back()->with('success','Slide saved');
        }
        return redirect()->back()->with('error','Slide not saved')->withInputs();
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
        if ($this->slider->find($id)->delete()) {

            return redirect()->route('backend.slider.index')->with('success', 'Slide Deleted Successfully!');

        }
        return redirect()->back()->with('error', 'System Error!!');

//        \DB::table('sliders')->where('id', '=', request()->id)->delete();
//        return redirect()->back()->with('success', 'Slide deleted');
    }
}
