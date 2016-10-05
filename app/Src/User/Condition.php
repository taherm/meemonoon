<?php

namespace App\Src\User;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    public $localStrings = ['title','body'];
    protected $guarded = [''];
}
