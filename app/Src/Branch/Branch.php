<?php

namespace App\Src\Branch;

use App\Core\PrimaryModel;
use App\Scopes\ScopeActive;
use App\Src\Company\Company;
use App\Src\Product\Product;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Request;

class Branch extends PrimaryModel
{

    protected $localeStrings = ['name', 'description', 'address'];
    use SoftDeletes;

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        if (!Request::is('backend/*')) {

            static::addGlobalScope(new ScopeActive());
        }
    }


    /**
     * Company Branch
     * Ownership Relation
     * hasMany
     * reverse
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class,'company_id');
    }

    /**
     * User Branch
     * hasOne relation
     * Assistant Role Relation
     * a user can manage only One Branch
     * reverse
     */
    public function assistant()
    {
        return $this->belongsTo('App\Src\User\User', 'user_id');
    }


    /**
     * Branch Order
     * hasMany
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany('App\Src\Order\Order');
    }

    /**
     * MorphRelation
     * MorphOne = many hasONe relation
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function gallery()
    {
        return $this->morphOne('App\Src\Branch\Branch', 'galleryable', 'galleries');
    }

    /**
     * hasMany
     * Area Country
     * reverse
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function area()
    {
        return $this->belongsTo('App\Src\Area\Area');
    }

    /**
     * Branch BranchMeta
     * hasOne
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function branch_meta()
    {
        return $this->hasOne('App\Src\Branch\BranchMeta');
    }



    /**
     * Branch Product
     *
     * Get all of the tags for the post.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }


    /**
     * Branch Rating
     * ManyToMany Polymorph
     * many manyTomany
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function ratings()
    {
        return $this->morphToMany('App\Src\Rating\Rating', 'ratingable');
    }

}
