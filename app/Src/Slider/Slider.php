<?php

namespace App\Src\Slider;

use App\Core\PrimaryModel;
use App\Scopes\ScopeActive;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Request;

class Slider extends PrimaryModel
{
    use SoftDeletes;
    protected $localeStrings = ['caption'];
    protected $table = 'sliders';

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

}
