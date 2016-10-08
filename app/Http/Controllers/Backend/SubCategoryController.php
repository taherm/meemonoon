<?php

namespace App\Http\Controllers\Backend;

use App\Core\PrimaryController;
use App\Src\Category\CategoryRepository;
use App\Http\Requests\Backend\SubCategoryUpdate;
use App\Http\Requests\Backend\SubCategoryCreate;
use Illuminate\Support\Facades\Cache;

class SubCategoryController extends PrimaryController
{
    protected $category;


    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = $this->category->getChildrenCategoriesWithParent();

        return view('backend.modules.subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentCategoriesOnly   = $this->category->getParentCategoriesOnly();
        $parentCategories       = $parentCategoriesOnly->pluck('name_en', 'id')->prepend("Please Select Parent Category", "");

        return view('backend.modules.subcategory.edit', compact('parentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SubCategoryCreate $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCategoryCreate $request)
    {
        $subCategory = $this->category->model->create($request->all());

        if ($subCategory) {

            return redirect()->route('backend.subcategory.index')->with('success', 'successfully created');

        }

        return redirect()->back()->with('error', 'not created !!');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategory            = $this->category->getById($id);
        $parentCategoriesOnly   = $this->category->getParentCategoriesOnly();

        $parentCategories       = $parentCategoriesOnly->pluck('name_en', 'id')->prepend("Please Select Parent Category", "");

        return view('backend.modules.subcategory.edit', compact('subcategory', 'parentCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SubCategoryUpdate $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubCategoryUpdate $request, $id)
    {
        if ($this->category->getById($id)->update(['name_en' => $request->name, 'description_en' => $request->description, 'parent_id' => $request->parentCategory])) {

            return redirect()->route('backend.subcategory.index')->with('success', 'subcategory updated!!');

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
        //check if category not assigned to any of products
        if($this->category->getById($id)->products->count() > 0)
        {
            return redirect()->back()->with('error', 'SubCategory Assigned to Product!!');
        }

        if ($this->category->getById($id)->delete()) {

            return redirect()->route('backend.subcategory.index')->with('success', 'SubCategory Removed successfully!');

        }
        return redirect()->back()->with('error', 'System Error !!');
    }
}
