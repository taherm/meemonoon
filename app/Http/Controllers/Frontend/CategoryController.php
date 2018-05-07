<?php

namespace App\Http\Controllers\Frontend;

use App\Src\Category\CategoryRepository;
use App\Src\Company\CompanyRepository;
use App\Src\Product\Color;
use App\Src\Product\Product;
use App\Src\Product\ProductFilters;
use App\Src\Product\ProductRepository;
use App\Http\Requests;
use App\Core\PrimaryController;
use App\Src\Product\Size;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;


class CategoryController extends PrimaryController
{

    protected $categoryRepository;
    protected $productRepository;
    protected $userRepository;
    protected $companyRepository;
    const limit = 12;


    public function __construct(
        CategoryRepository $categoryRepository,
        CompanyRepository $companyRepository,
        ProductRepository $productRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->companyRepository = $companyRepository;
        $this->productRepository = $productRepository;
    }


    /**
     * Description : will get all products related to the current branch and company under the child Category
     * example : http://meem.app/category/1?child=4&size=small&color=MediumSeaGreen&min=30&max=100
     */
    public function show($parentId, ProductFilters $filters)
    {
        $validator = Validator::make($filters->request->all(), [
            'min' => 'min:1|max:200',
            'max' => 'min:1|max:200',
            'order' => 'in:desc,asc',
            'size' => 'integer'
        ]);

        $queryString = $filters->request->getQueryString();

        if ($validator->fails() || !$parentId) {
            return redirect()->route('category.show', $parentId)->withErrors($validator)->with('error', trans('general.message.error.no_categories'));
        }

        if ($filters->request->has('child')) {
            $category = $this->categoryRepository->getById($filters->request->get('child'));
            // fetch all the products according to the filter entered that belongs to the ParentCategory
            $products = $category->products()->filters($filters)->orderBy('id', 'desc');
        } else {
            $category = $this->categoryRepository->getById($parentId);
            // fetch all the products according to the filter entered that belongs to the ParentCategory
            $products = $category->products()->filters($filters);
        }

//         fetch the number of the sizes according to the products returned
        $sizeCounter = $this->getSizesForProducts(clone $products);

        // get all products' colors for the current category or sub category
        $colorCounter = $this->getColorsForProducts(clone $products);

//        $products = $this->getOrder($products, $filters->request->request->get('order'));

        $products = $products->get();

        $productsCounter = $products->count();

        $perPage = self::limit;

        $products = $this->paginateCollection($products, self::limit);

        $queryString = $filters->request->getQueryString();


        $childrenCategoryFlag = $this->categoryRepository->getOnlyChildrenCategories($parentId);


        return view('frontend.modules.category.index', compact('category', 'products', 'productsCounter',
            'perPage', 'parentId', 'childId', 'sizeCounter', 'colorCounter', 'queryString', 'subcategories', 'childrenCategoryFlag'));
    }


    /**
     * @param $products
     * @return array
     */
    public function getSizesForProducts($products)
    {

        $sizes = Size::all();

        $sizeCounter = [];

        foreach ($sizes as $size) {

            array_push($sizeCounter,
                [
                    'size' => $size->size,
                    'size_id' => $size->id,
                    'size_counter' => count($products->sizecounter($size->id))
                ]
            );

        }
        return $sizeCounter;
    }

    /**
     * @param $products
     * @return array
     */
    public function getColorsForProducts($products)
    {

        $colors = Color::all();

        $colorCounter = [];

        foreach ($colors as $color) {

            array_push($colorCounter,
                [
                    'name' => $color->name,
                    'code' => $color->code,
                    'color_id' => $color->id,
                    'color_counter' => count($products->colorcounter($color->id))
                ]
            );

        }

        return $colorCounter;
    }

    public function getOrder($element, $order)
    {
        if ($order === 'desc') {

            $products = $element->get()->sortByDesc('product_meta.price');

        } elseif ($order === 'asc') {

            $products = $element->get()->sortBy('product_meta.price');

//            $products = new Paginator($products, self::limit);

        } else {

            $products = $element->get();
        }
        return $products;
    }

    public function filterProductsByRange(Request $request)
    {
        $min = $request->min;
        $max = $request->max;
        $parent = $request->parent;
        $currentUrl = route('category.show', $parent);
        $currentUrl = $currentUrl . '?min=' . $min . '&max=' . $max;

        return response()->json(['min' => $min, 'max' => $max, 'parent' => $parent, 'url' => $currentUrl], 200);
    }

}
