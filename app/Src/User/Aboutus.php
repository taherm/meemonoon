<?php

namespace App\Src\User;

use App\Core\PrimaryModel;

class Aboutus extends PrimaryModel
{
    protected $table = 'aboutus';
    protected $fillable = ['id' , 'title_en', 'title_ar', 'body_en', 'body_ar'];
    public $localeStrings = ['title','body'];
}
