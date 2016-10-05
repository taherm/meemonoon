<?php

namespace App\Src\Company;

use App\Core\PrimaryModel;
use Illuminate\Database\Eloquent\SoftDeletes;


class CompanyMeta extends PrimaryModel
{
    protected $localeStrings = ['name', 'description', 'address', 'notes'];
    use SoftDeletes;

    /**
     * Company CompanyMeta
     * hasOne
     * reverse
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo('App\Src\Company\Company');
    }
}
