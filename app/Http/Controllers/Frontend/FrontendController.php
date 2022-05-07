<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
class FrontendController extends Controller
{
    public function home () {
        $home = Page::where(['is_front_page' => 1])->get();
        print_r($home); die;
        return view('');
    }
}
