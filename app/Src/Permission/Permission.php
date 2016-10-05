<?php

namespace App\Src\Permission;

use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\EntrustPermission;

/**
 * App\Src\Permission\Permission
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Config::get('entrust.role')[] $roles
 */
class Permission extends EntrustPermission
{
    use SoftDeletes;

    protected $fillable = ['name','level','display_name','description'];

    public function getNameAttribute($value)
    {
        return strtolower($value);
    }
}
