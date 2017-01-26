<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Src\Product\Color;
use Illuminate\Http\Request;
use App\Http\Requests;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::all();

        return view('backend.modules.color.index',compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.modules.color.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\Backend\ColorStore $request)
    {
        Color::create($request->request->all());

        return redirect()->route('backend.color.index')->with('success', 'color created');
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
        $color = Color::find($id);
        return view('backend.modules.color.edit', compact('color'));
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
        $color = Color::find($id)->update($request->request->all());

        return redirect()->route('backend.color.index')->with('success', 'color updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $color = Color::find($id)->delete();

        if ($color) {

            return redirect()->route('backend.color.index')->with('success', 'color deleted');

        }
        return redirect()->route('backend.color.index')->with('error', 'color not deleted');
    }
}
