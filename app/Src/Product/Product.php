<?php

namespace App\Src\Product;

use App\Core\PrimaryModel;
use App\Scopes\ScopeActive;
use App\Scopes\ScopeProductHasProductMetaAndProductAttribute;
use App\Src\Branch\Branch;
use App\Src\Company\Company;
use App\Src\Order\Order;
use App\Src\Order\OrderMeta;
use \Conner\Tagging\Taggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Request;
use Conner\Likeable\LikeableTrait;

class Product extends PrimaryModel
{
    protected $table = 'products';
    protected $dates = ['created_at','updated_at','deleted_at'];
    protected $localeStrings = ['name'];
    /**
     * @var array
     */
    protected $with = ['product_meta', 'product_attributes'];
    use Taggable, LikeableTrait, SoftDeletes, ProductHelpers;

    /**
     * The "booting" method of the model.
     * applying the scope only in the backend routes.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        if (!Request::is('backend/*')) {

            static::addGlobalScope(new ScopeActive());
            static::addGlobalScope(new ScopeProductHasProductMetaAndProductAttribute());

        }

    }

    /**
     * Product ProductMeta
     * hasOne
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product_meta()
    {
        return $this->hasOne('App\Src\Product\ProductMeta');
    }

    public function scopeOnSale()
    {
        return $this->whereHas('product_meta', function ($q) {
            $q->where(['on_sale' => 1, 'on_homepage' => 1, 'on_sale_on_homepage' => 1]);
        });
    }


    /**
     * Category Product
     * ManyToMany
     * reverse
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany('App\Src\Category\Category', 'category_product');
    }


    public function parent()
    {
        return $this->categories()->where('parent_id', 0);
    }


    /**
     * @return mixed
     * Usage : Product Page - Add To Cart => to filter only parents from all categories
     * Description : filter only parents from all categories for one product
     */
    public function scopeParents()
    {
        return $this->categories()->where('parent_id', 0);
    }

    /**
     * @return mixed
     * Usage : within the boot Scope function
     * Description : make sure a product has at least one parent category
     */
    public function scopeParent($q)
    {
        return $this->categories()->where('parent_id', 0);
    }

    public function productParentCount($parentId)
    {
        return $this->parents->where('id', $parentId)->count();
    }

    public function scopeParentsCount($q, $parentId)
    {
        return $q->get()->map(function ($product) use ($parentId) {
            return $product->productParentCount($parentId);
        })->sum();
    }


    /**
     * MorphRelation
     * MorphOne = many hasONe relation
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function gallery()
    {
        return $this->morphOne('App\Src\Gallery\Gallery', 'galleryable');
    }


    /**
     * Company Product
     * hasMany
     * reverse
     * Get all of the companies that are assigned this product.
     */
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }


    /**
     * Branch Product
     * hasMany
     * reverse
     * Get all of the branches that are assigned this product.
     */
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }


    /**
     * Product Attribute
     * hasMany Relation
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product_attributes()
    {
        return $this->hasMany('App\Src\Product\ProductAttribute');
    }

    /**
     * Usage : product belongs to one order_meta
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order_meta()
    {
        return $this->belongsTo(OrderMeta::class);
    }

    /**
     * ManyToMany Relation
     * Product Color
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function colors()
    {
        return $this->belongsToMany(Color::class, 'product_attributes', 'product_id', 'color_id');
    }


    /**
     * ManytoMany Relation
     * Product Size
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_attributes', 'product_id', 'size_id');
    }


    /**
     * Product Rating
     * One Polymorph
     * many hasMany
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function ratings()
    {
        return $this->morphMany('App\Src\Rating\Rating', 'ratingable');
    }

    /**
     * Order Product
     * ManyToMany
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_metas', 'order_id', 'product_id');
    }


    /**
     * @param $query
     * @param QueryFilter $filters
     * @return \Illuminate\Database\Eloquent\Builder
     * Usage : Category Page - Filtering all products according to parameters
     * Description : chaining filters within the Query String
     */
    public function scopeFilters($query, QueryFilter $filters)
    {
        return $filters->apply($query);
    }

    /**
     * @param $searchTerm
     * @return mixed
     * Usage : Search Input in the Homepage
     * Description : Search
     */
    public function searchItem($searchTerm)
    {
        return $this->where(
            'name_ar', 'LIKE', "%$searchTerm%"
        )->orWhere('name_en', 'LIKE', "%$searchTerm%")
            ->whereHas('product_meta', function ($q) use ($searchTerm) {
                $q->orWhere('description_en', 'LIKE', "%$searchTerm%")
                    ->orWhere('description_ar', 'LIKE', "%$searchTerm%")
                    ->orWhere('notes_en', 'LIKE', "%$searchTerm%")
                    ->orWhere('notes_ar', 'LIKE', "%$searchTerm%");
            })->paginate(9);
    }


    /**
     * @param $sizeId
     * @return mixed
     * Usage : CategoryPage@show
     * Description : it fetches the total number of products from collection according to the sizeId
     */
    public function getSizeCounterAttribute($sizeId)
    {
        return $this->product_attributes->where('size_id', $sizeId)->count();
    }

    /**
     * @param $colorId
     * @return mixed
     * Usage : CategoryPage@show
     * Description : it fetches the total number of products from collection according to the colorId
     */
    public function getColorCounterAttribute($colorId)
    {
        return $this->product_attributes->where('color_id', $colorId)->count();
    }

    public function scopeSizeCounter($q, $sizeId)
    {
        return $q->whereHas('product_attributes', function ($q) use ($sizeId) {
            $q->where('size_id', $sizeId);
        })->get();
    }

    public function scopeColorCounter($q, $colorId)
    {
        return $q->whereHas('product_attributes', function ($q) use ($colorId) {
            $q->where('color_id', $colorId);
        })->get();
    }

    /**
     * @param $sizeId
     * @return mixed
     * collection of the colors & quantaties according to the sizeIdn for One Project Object
     * Usage : Product Details Page
     */
    public function getDataAttribute()
    {
        return $this->product_attributes->map(function ($item) {

            return ['product_id' => $this->id, 'size_id' => $item->size_id, 'color' => $item->color_id, 'attr_id' => $item->id, 'qty' => $item->qty];

        });
    }

    /**
     * @param $sizeId
     * @return mixed
     * Usage : Product Details Page
     * Description : get all data (attribute_id + color + qty ) json response according to the sizeId
     */
    public function getDataFromSize($sizeId)
    {
        return $this->product_attributes()->where('size_id', $sizeId)->get(['product_id', 'size_id', 'color_id', 'id', 'qty']);
    }

    /**
     * @param $colorId
     * @return mixed
     * Usage : Product Details Page
     * Description : get all data (attribute_id + size + qty ) json response according to the colorId
     */
    public function getDataFromColor($colorId)
    {
        return $this->product_attributes()->where('color_id', $colorId)->get(['product_id', 'size_id', 'color_id', 'id', 'qty']);
    }

    public function getTotalQty()
    {
        return $this->product_attributes()->sum('qty');
    }

}
