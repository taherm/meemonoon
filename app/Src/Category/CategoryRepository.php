<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 4/26/16
 * Time: 4:26 PM
 */

namespace App\Src\Category;

use App\Core\PrimaryRepository;
use App\Src\Category\Category;

class CategoryRepository extends PrimaryRepository
{

    public $companyId;
    public $branchId;

    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function getParentCategoriesWithChildren()
    {
        return $this->model->where('parent_id', 0)->with('children')->get();
    }

    public function getParentCategoriesOnly()
    {
        return $this->model->where('parent_id', 0)->get();
    }

    public function getChildrenCategoriesWithParent()
    {
        return $this->model->where('parent_id', '!=', 0)->with('parent')->get();
    }

    /**
     * Add New Category
     *
     * @var array $data
     *
     * @return int
     */
    public function create(array $data)
    {
        $category = new Category;
        $category->name_en          = $data['name'];
        $category->description_en   = $data['description'];

        return($category->save());
    }

    /**
     * Add New Category
     *
     * @var array $data
     *
     * @return int
     */
    public function createSubCategory(array $data)
    {
        $category = new Category;
        $category->parent_id          = $data['parentCategory'];
        $category->name_en            = $data['name'];
        $category->description_en     = $data['description'];

        return($category->save());
    }

}