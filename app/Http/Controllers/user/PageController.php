<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('user.pages.about');
    }
    public function contact()
    {
        return view('user.pages.contact');
    }
    public function faq()
    {
        return view('user.pages.faq');
    }
    public function terms()
    {
        return view('user.pages.terms');
    }
    public function return()
    {
        return view('user.pages.return');
    }
    public function privacy()
    {
        return view('user.pages.privacy');
    }
    public function categories()
    {
        // dd('came');
        // CategoryModel::where('is_active', 1)->get();
        return view('user.pages.categories');
    }
}
