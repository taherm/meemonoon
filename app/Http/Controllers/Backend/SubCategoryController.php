<?php

namespace App\Http\Controllers\Backend;

use App\Core\PrimaryController;
use App\Core\Services\Image\PrimaryImageService;
use App\Src\Category\Category;
use App\Src\Category\CategoryRepository;
use App\Http\Requests\Backend\SubCategoryUpdate;
use App\Http\Requests\Backend\SubCategoryCreate;
use Illuminate\Support\Facades\Cache;

class SubCategoryController extends PrimaryController
{
    protected $category;
    protected $imageService;

    public function __construct(CategoryRepository $category, PrimaryImageService $imageService)
    {
        $this->category = $category;
        $this->imageService = $imageService;
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
        $subId = request()->has('sub_id') ? request()->sub_id : null;
        if(!request()->has('sub_id')) {
            $parentCategoriesOnly = $this->category->getParentCategoriesOnly();
            $parentCategories = $parentCategoriesOnly->pluck('name_en', 'id')->prepend("Please Select Parent Category", "");
            return view('backend.modules.subcategory.create', compact('parentCategories'));
        }
        // children case
        return view('backend.modules.subcategory.children.create', compact('subId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SubCategoryCreate $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCategoryCreate $request)
    {
        try {
            $image = $this->imageService->CreateImage($request->file('image'), ['1', '1'], ['1', '1'], ['1150', '290']);

            $request->request->add(['image' => $image]);

            $subCategory = $this->category->model->create($request->request->all());

            if ($subCategory) {

                return redirect()->route('backend.subcategory.index')->with('success', 'successfully created');

            }
            return redirect()->back()->with('error', 'not created !!');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategory = $this->category->getById($id);
        $subId = request()->has('sub_id') ? request()->sub_id : null;
        if(!request()->has('sub_id')) {
            $parentCategoriesOnly = $this->category->getParentCategoriesOnly();
            $parentCategories = $parentCategoriesOnly->pluck('name_en', 'id')->prepend("Please Select Parent Category", "");
            return view('backend.modules.subcategory.edit', compact('subcategory', 'parentCategories'));
        }
        // children case also
        return view('backend.modules.subcategory.children.edit', compact('subId','subcategory'));
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
        $subcategory = $this->category->model->whereId($id)->first();

        try {

            if ($request->hasFile('image')) {

                $image = $this->imageService->CreateImage($request->file('image'), ['1', '1'], ['1', '1'], ['1150', '290']);

                $subcategory->update(['image' => $image]);

            }


            $subcategory->update($request->except('_method', '_token', 'image'));


            if ($subcategory) {

                return redirect()->route('backend.subcategory.index')->with('success', 'subcategory updated!!');

            }
            return redirect()->back()->with('error', 'sub category not saved');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
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
        //check if category not assigned to any of products
        if ($this->category->getById($id)->products->count() > 0) {
            return redirect()->back()->with('error', 'SubCategory Assigned to Product!!');
        }

        if ($this->category->getById($id)->delete()) {

            return redirect()->route('backend.subcategory.index')->with('success', 'SubCategory Removed successfully!');

        }
        return redirect()->back()->with('error', 'System Error !!');
    }
}
