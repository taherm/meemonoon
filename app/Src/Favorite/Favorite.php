<?php

namespace App\Src\Favorite;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Src\Favorite\Favorite
 *
 */
class Favorite extends PrimaryModel
{
    //
    protected $table = "book_user";

    protected $fillable = ['book_id', 'user_id'];

    public $timestamps = false;

}
