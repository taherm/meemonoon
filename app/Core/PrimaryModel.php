<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 4/16/16
 * Time: 7:31 PM
 */

namespace App\Core;

use App\Core\Traits\LocaleTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;


class PrimaryModel extends Model
{
    use LocaleTrait;
    protected $countriesList = [];
    protected $countryAreasList = [];
    protected $localeStrings = [];
    protected $guarded = ['id'];


}