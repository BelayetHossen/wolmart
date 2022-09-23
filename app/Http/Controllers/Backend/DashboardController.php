<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

/*
|--------------------------------------------------------------------------
| View Admin Dashboard
|--------------------------------------------------------------------------
*/

public function adminDashboardView(){
    return view('backend.pages.index');
}












}
