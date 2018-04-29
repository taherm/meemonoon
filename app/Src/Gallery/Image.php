<?php

namespace App\Src\Gallery;

use App\Core\PrimaryModel;

class Image extends PrimaryModel
{
    protected $localeStrings = ['caption'];
    protected $table = 'images';
    protected $fillable = ['gallery_id','order'];
    /**
     * Gallery Image
     * hasMany relation
     * reverse
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gallery()
    {
        return $this->belongsTo('App\Src\Gallery\Gallery');
    }
}
