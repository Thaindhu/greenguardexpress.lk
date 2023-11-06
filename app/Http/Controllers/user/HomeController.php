<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\BannerModel;
use App\Models\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $refferal = app('request')->input('ref');
        if ($refferal) {
            Session::push('ref', $refferal);
        }
        $banners = BannerModel::where('id', 1)->first();
        $featured = DB::table('products as p')->select(
            'p.id',
            'p.metaname',
            'p.id as small_description',
            'p.image1_path',
            'p.image2_path',
            'p.title',
            'p.price',
            'p.discount_price',
            'p.discount_pre',
            'p.is_new',
            // 'w.*'
        )
            ->where('is_featured', 1)
            // ->leftJoin('wishlist as w', 'w.product_id', '=', 'p.id')
            ->limit(6)
            ->inRandomOrder()
            ->get();
        // dd($featured);
        $new = DB::table('products as p')->select(
            'p.id',
            'p.metaname',
            'p.id as small_description',
            'p.image1_path',
            'p.image2_path',
            'p.title',
            'p.price',
            'p.discount_price',
            'p.discount_pre',
            'p.is_new',
        )
            ->where('is_new', 1)
            ->limit(6)
            ->inRandomOrder()
            ->get();
        $hot_cats = CategoryModel::where('is_hot', 1)->limit(8)->get();

        // dd(Session::get('LoggedUser')->id);
        return view('user.index', compact('banners', 'featured', 'new', 'hot_cats'));
    }
}
