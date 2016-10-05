<?php

namespace App\Src\User;

use Illuminate\Support\Facades\Cache;
use App\Core\PrimaryModel;

class Contactus extends PrimaryModel
{
    protected $table = 'contactus';
    protected $fillable = ['id' , 'company', 'country', 'address_ar', 'address_en', 'phone', 'email'];
    public $localeStrings = ['company','address','country'];
}

