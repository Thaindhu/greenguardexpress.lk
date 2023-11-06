<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use App\Models\SubCatModel;
use App\Models\WishlistModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index($cat, $subcat)
    {
        $conditions = array();
        $orderby = null;
        $orderby_type = null;
        $cat_name = 'all';
        $subcat_name = 'all';
        $keyword = app('request')->input('query');
        $cat_id = app('request')->input('cat_id');
        $sortby = app('request')->input('sortby');

        if (!empty($keyword)) {
            array_push($conditions, array('p.title', 'like', '%' . $keyword . '%'));
        }
        if (!empty($cat_id)) {
            array_push($conditions, array('p.category_id', '=',  $cat_id));
        }
        if ($cat != 'all' && empty($cat_id)) {
            $cat = CategoryModel::select('id as cat_id', 'title')->where('metaname', $cat)->first();
            if ($cat) {
                $cat_name = $cat->title;
                array_push($conditions, array('p.category_id', '=', $cat->cat_id));
            }
        }
        if ($subcat != 'all') {
            $subcat = SubCatModel::select('id as subcat_id', 'title')->where('metaname', $subcat)->first();
            if ($subcat) {
                $subcat_name = $subcat->title;
                array_push($conditions, array('p.sub_category_id', '=', $subcat->subcat_id));
            }
            // dd($subcat->subcat_id);
        }
        // dd($sortby);
        if ($sortby == "asc") {
            $orderby = "p.title";
            $orderby_type = "asc";
        }
        if ($sortby == "desc") {
            $orderby = "p.title";
            $orderby_type = "desc";
        }
        if ($sortby == "price-low") {
            $orderby = "p.price";
            $orderby_type = "asc";
        }
        if ($sortby == "price-high") {
            $orderby = "p.price";
            $orderby_type = "desc";
        }
        // array_push($conditions, array('p.is_active', '=', 1));
        if($orderby || $orderby_type){
            $products = DB::table('products as p')->select(
                'p.*',
                'p.id as pro_id',
                'c.title as cat_name',
                'c.metaname as cat_meta',
                'sc.title as subcat_name',
                'sc.metaname as subcat_meta',
                'b.title as brand',
            )
                ->leftJoin('categories as c', 'c.id', '=', 'p.category_id')
                ->leftJoin('sub_categories as sc', 'sc.id', '=', 'p.sub_category_id')
                ->leftJoin('brands as b', 'b.id', '=', 'p.brand_id')
                ->where($conditions)
                ->where('p.is_active', 1)
                ->orderBy($orderby, $orderby_type)->paginate(24);
        }else{
            $products = DB::table('products as p')->select(
                'p.*',
                'p.id as pro_id',
                'c.title as cat_name',
                'c.metaname as cat_meta',
                'sc.title as subcat_name',
                'sc.metaname as subcat_meta',
                'b.title as brand',
            )
                ->leftJoin('categories as c', 'c.id', '=', 'p.category_id')
                ->leftJoin('sub_categories as sc', 'sc.id', '=', 'p.sub_category_id')
                ->leftJoin('brands as b', 'b.id', '=', 'p.brand_id')
                ->where($conditions)
                ->where('p.is_active', 1)
                ->inRandomOrder()
                ->paginate(24);
        }
        //    dd($products);
        $new_products = DB::table('products as p')->select(
            'p.id as pro_id',
            'p.id as metaname',
            'p.image1_path',
            'p.title',
            'p.price',
            'p.discount_price',
        )
            // ->where('is_new', 1)
            ->limit(4)
            ->inRandomOrder()
            ->get();
        // dd($products);
        return view('user.products.index', compact('products', 'new_products', 'cat_name', 'subcat_name'));
    }
    public function hot_deals()
    {
        $conditions = array();
        $keyword = app('request')->input('query');
        $cat_id = app('request')->input('cat_id');
        $sortby = app('request')->input('sortby');
        $orderby = "p.created_at";
        $orderby_type = "desc";
        if ($sortby == "asc") {
            $orderby = "p.title";
            $orderby_type = "asc";
        }
        if ($sortby == "desc") {
            $orderby = "p.title";
            $orderby_type = "desc";
        }
        if ($sortby == "price-low") {
            $orderby = "p.price";
            $orderby_type = "asc";
        }
        if ($sortby == "price-high") {
            $orderby = "p.price";
            $orderby_type = "desc";
        }
        if (!empty($keyword)) {
            array_push($conditions, array('p.title', 'like', '%' . $keyword . '%'));
        }
        if (!empty($cat_id)) {
            array_push($conditions, array('p.category_id', '=',  $cat_id));
        }
        // dd($sortby);
        if ($sortby == "asc") {
            $orderby = "p.title";
            $orderby_type = "asc";
        }
        if ($sortby == "desc") {
            $orderby = "p.title";
            $orderby_type = "desc";
        }
        if ($sortby == "price-low") {
            $orderby = "p.price";
            $orderby_type = "asc";
        }
        if ($sortby == "price-high") {
            $orderby = "p.price";
            $orderby_type = "desc";
        }
        // array_push($conditions, array('p.is_active', '=', 1));
        $products = DB::table('products as p')->select(
            'p.*',
            'p.id as pro_id',
            'c.title as cat_name',
            'c.metaname as cat_meta',
            'sc.title as subcat_name',
            'sc.metaname as subcat_meta',
            'b.title as brand',
        )
            ->leftJoin('categories as c', 'c.id', '=', 'p.category_id')
            ->leftJoin('sub_categories as sc', 'sc.id', '=', 'p.sub_category_id')
            ->leftJoin('brands as b', 'b.id', '=', 'p.brand_id')
            ->where('is_featured', 1)
            ->where('p.is_active', 0)
            ->where($conditions)
            ->orderBy($orderby, $orderby_type)
            ->paginate(24);

        $new_products = DB::table('products as p')->select(
            'p.id as pro_id',
            'p.id as metaname',
            'p.image1_path',
            'p.title',
            'p.price',
            'p.discount_price',
        )
            // ->where('is_new', 1)
            ->limit(4)
            ->inRandomOrder()
            ->get();
        // dd($products);
        return view('user.products.hot_deals', compact('products', 'new_products'));
    }

    public function view($id, $metaname)
    {
        $is_wished = false;
        $product = DB::table('products as p')->select(
            'p.*',
            // 'p.id as pro_id',
            'c.title as cat_name',
            'c.id as cat_id',
            'c.metaname as cat_meta',
            'sc.title as subcat_name',
            'sc.metaname as subcat_meta',
            'b.title as brand',
        )
            ->leftJoin('categories as c', 'c.id', '=', 'p.category_id')
            ->leftJoin('sub_categories as sc', 'sc.id', '=', 'p.sub_category_id')
            ->leftJoin('brands as b', 'b.id', '=', 'p.brand_id')
            ->where('p.id', $id)
            ->first();
        // dd($product);
        if (Auth::user()) {
            $result = WishlistModel::where('product_id', $product->id)->where('user_id', Auth::user()->id)->first();
            $result ? $is_wished = true : null;
        }

        $related_products = DB::table('products as p')->select(
            'p.id',
            'p.id as metaname',
            'p.id as small_description',
            'p.image1_path',
            'p.image2_path',
            'p.title',
            'p.price',
            'p.discount_price',
            'p.discount_pre',
            'p.is_new',
        )
            // ->where('is_new', 1)
            ->whereNot('p.id', $id)
            ->where('p.sub_category_id', $product->sub_category_id)
            ->limit(8)
            ->inRandomOrder()
            ->get();
        // dd($related_products);
        return view('user.products.view', compact('product', 'related_products', 'is_wished'));
    }
}
