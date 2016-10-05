<?php

namespace App\Src\Like;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Src\Favorite\Favorite
 *
 */
class Like extends Model
{
    //
    protected $table = "book_likes";

    protected $fillable = ['book_id', 'user_id'];


}
