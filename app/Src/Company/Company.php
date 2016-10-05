<?php

namespace App\Src\Company;


use App\Core\PrimaryModel;
use App\Scopes\ScopeActive;
use App\Src\Product\Product;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Request;


class Company extends PrimaryModel
{


    protected $localeStrings = ['name'];
    protected $fillable = ['user_id'];

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
     * User Company
     * hasOne
     * reverse
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo('App\Src\User\User','user_id');
    }

    /**
     * Company CompanyMeta
     * hasOne
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function company_meta()
    {
        return $this->hasOne('App\Src\Company\CompanyMeta');
    }


    /**
     * Company Branch
     * hasMany
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function branches()
    {
        return $this->hasMany('App\Src\Branch\Branch');
    }

    /**
     * Company Product
     * MoreToMany
     * Get all of products for the company.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }


    /**
     * Company Order
     * hasManyThrough = hasMany (Branch + Order) + hasManyThrough
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function orders()
    {
        return $this->hasManyThrough('App\Src\Order\Order', 'App\Src\Branch\Branch');
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
     * Company Rating
     * ManyToMany Polymorph
     * many manyTomany
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function ratings()
    {
        return $this->morphToMany('App\Src\Rating\Rating', 'ratingable');
    }


}
