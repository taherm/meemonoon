<?php

namespace App\Src\PagesQuestions;

use App\Core\PrimaryModel;
use app\Src\Product\QueryFilter;

class StaticPagesQuestion extends PrimaryModel
{
    protected $table = 'static_pages_questions';
    public $localeStrings = ['question', 'answer'];
}
