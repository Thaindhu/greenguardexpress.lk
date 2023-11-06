<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\WishlistModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = DB::table('wishlist as w')->select(
            // 'w.*',
            'p.title',
            'p.id',
            'p.image1_path',
            'p.is_available',
            'p.is_available',
            'p.price',
            'p.discount_price',
            'p.metaname',
        )
            ->leftJoin('products as p', 'p.id', '=', 'w.product_id')
            ->where('w.user_id', '=', Auth::user()->id)
            ->get();
        return view('user.profile.wishlist', compact('wishlist'));
    }
    public function create($product_id)
    {
        try {
            $res =  DB::table('wishlist')
                ->where('user_id', '=', Auth::user()->id)
                ->where('product_id', '=', $product_id)
                ->first();
            // Removing from wishlist
            if ($res) {
                $result = WishlistModel::where('id', $res->id)->delete();
                if ($result) {
                    return response()->json(
                        [
                            'status' => true,
                            'type' => 'removed',
                            'message' => 'Product removed from your wishlist',
                        ],
                        200
                    );
                } else {
                    return response()->json(
                        [
                            'status' => false,
                            'type' => '',
                            'message' => 'Sorry, Cannot remove this product from your wishlist.',
                        ],
                        200
                    );
                }
            }
            // Adding to wishlist if not exist
            $res = WishlistModel::create([
                "user_id" => Auth::user()->id,
                "product_id" => $product_id,
                "created_at" => Carbon::now()->timezone('Asia/Colombo'),
                "updated_at" => Carbon::now()->timezone('Asia/Colombo'),
            ]);
            if ($res) {
                return response()->json(
                    [
                        'status' => true,
                        'type' => 'added',
                        'message' => 'Product added to your wishlist',
                    ],
                    200
                );
            } else {
                return response()->json(
                    [
                        'status' => false,
                        'type' => '',
                        'message' => 'Sorry, Cannot add this product to your wishlist.',
                    ],
                    200
                );
            }
        } catch (\Throwable $th) {

            return response()->json(
                [
                    'status' => false,
                    'type' => '',
                    'message' => $th->getMessage(),
                ],
                200
            );
        }
    }
}
