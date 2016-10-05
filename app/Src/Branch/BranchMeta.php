<?php

namespace App\Src\Branch;

use App\Core\PrimaryModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class BranchMeta extends PrimaryModel
{

    protected $table = 'branch_metas';
    protected $localeStrings = ['name','description','address','notes'];

    use SoftDeletes;


    /**
     * Branch BranchMeta
     * hasOne
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branch() {

        return $this->belongsTo('App\Src\Branch\Branch');

    }

}
