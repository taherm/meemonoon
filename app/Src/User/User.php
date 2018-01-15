<?php

namespace App\Src\User;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Core\PrimaryModel;
use App\Core\Traits\UserRolesTrait;
use App\Scopes\ScopeActive;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Request;
use Conner\Likeable\LikeableTrait;

/**
 * App\Src\User\User
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Config::get('entrust.role')[] $roles
 */
class User extends Authenticatable
{
    use CanResetPassword, LikeableTrait, UserRolesTrait, Notifiable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    protected $with = ['likes'];
    public $localeStrings = ['name'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [''];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    protected $casts = [
        'active' => 'boolean',
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        if (!Request::is('backend/*')) {

            static::addGlobalScope(new ScopeActive());
        }
    }

    /**
     * hasOne Relation
     * Ownership relation
     * a user hasOne Company
     * a company belongstoOne User
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function company()
    {
        return $this->hasOne('App\Src\Company\Company');
    }

    /**
     * User Branch
     * hasOne Relation
     * The Assistant Role Relation
     * a user can manage only one branch as an assistant
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function branch()
    {
        return $this->hasOne('App\Src\Branch\Branch');
    }


    /**
     * User Order
     * hasMany
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany('App\Src\Order\Order');
    }

    public function coupons()
    {
        return $this->hasMany('App\Src\Coupon\Coupon');
    }


    public function welcomeMessage()
    {
        return $this->fullName . $this->created_at->diffForHumans();
    }

    public function getFullNameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname . ' ';
    }


}
