<?php

namespace App\Http\Controllers\Backend;

use App\Core\PrimaryController;
use Conner\Tagging\Model\Tag;
use App\Http\Requests;
use Illuminate\Support\Facades\Cache;

class TagController extends PrimaryController
{
    public $tag;

    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = $this->tag->orderBy('id', 'desc')->get();

        return view('backend.modules.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.modules.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\Backend\TagStore $request)
    {
        Cache::forget('tags');

        $tag = $this->tag->create([
            'name' => $request->name,
        ]);

        if ($request->has('name_en')) {
            $tag = $this->tag->create([
                'name' => $request->name_en,
            ]);
        }

        if ($tag) {

            Cache::forever('tags', $this->tag->all());

            return redirect()->route('backend.tag.index')->with('success', 'successfully created');

        }

        return redirect()->back()->with('error', 'not created !!');

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
        $tag = $this->tag->whereId($id)->first();

        return view('backend.modules.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\Backend\TagUpdate $request, $id)
    {
        if ($this->tag->find($id)->update(['name' => $request->name, 'slug' => $request->slug])) {

            return redirect()->route('backend.tag.index')->with('success', 'tag saved');

        }
        return redirect()->back()->with('error', 'not saved !!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->tag->whereId($id)->delete()) {

            return redirect()->route('backend.tag.index')->with('success', 'successful');

        }
        return redirect()->back()->with('error', 'not successful !!');
    }
}
