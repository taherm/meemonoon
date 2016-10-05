<?php

namespace App\Http\Controllers\Backend;

use App\Core\PrimaryController;
use Illuminate\Http\Request;

use App\Http\Requests;

class DashBoardController extends PrimaryController
{
    public function index()
    {
        return view('backend.modules.home.main');
    }
}
