<?php

namespace App\Src\Newsletter;

use Illuminate\Database\Eloquent\Model;


class Newsletter extends Model
{

    protected $table = 'newsletter';

    protected $fillable = ['name', 'email'];


}