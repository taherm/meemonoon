<?php

namespace App\Src\User;

use App\Core\PrimaryModel;

class Privacy extends PrimaryModel
{
    protected $table = 'privacy';
    protected $fillable = ['id' , 'title_en', 'title_ar', 'body_en', 'body_ar'];
    public $localeStrings = ['title','body'];
}
