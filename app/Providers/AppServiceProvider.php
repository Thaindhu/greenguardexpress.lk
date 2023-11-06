<?php

namespace App\Providers;

use App\Models\CategoryModel;
use App\Models\SubCatModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $cats = CategoryModel::select('title as cat_name', 'id as cat_id', 'image1_path', 'icon_path', 'is_hot', 'is_collection', 'metaname')
            ->where('is_active', 1)
            ->orderBy('cat_order', 'asc')
            ->get();
        $subcats = SubCatModel::select('title as subcat_name', 'id as subcat_id',  'category_id', 'image1_path', 'metaname')
            ->where('is_active', 1)
            ->get();
        // $cart = Session::get('cart', []);
        View::share([
            'cats' => $cats,
            'subcats' => $subcats,
        ]);
        // dd($cart);
    }
}
