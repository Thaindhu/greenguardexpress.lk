<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\CityModel;
use App\Models\ProductModel;
use App\Models\SettingsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart');
        $cities = CityModel::orderBy('loc_name', 'ASC')->get();
        $user_city_id = null;
        // dd($cart);
        if (Auth::user()) {
            $user_city_id = Auth::user()->city_id;
        } else {
            session(['url.intended' => url()->previous()]);
        }
        return view('user.cart.index', compact('cart', 'cities', 'user_city_id'));
    }
    public function checkout()
    {
        $cart = Session::get('cart');
        $user = null;
        // dd($cart);
        if (Auth::user()) {
            $user = Auth::user();
        }
        $cities = CityModel::orderBy('loc_name', 'ASC')->get();
        return view('user.cart.checkout', compact('cart', 'cities', 'user'));
    }

    public function addtocart(Request $request)
    {
        $cart = array();
        $this->validate($request, [
            'product_id' => 'required',
            'qty' => 'required',
            'price' => 'required',
        ]);
        $product = ProductModel::where('id', $request->product_id)->first();
        if (!$product) {
            return response()->json(
                [
                    'status' => false,
                    'type' => '',
                    'message' => 'Sorry, Product cannot be found.',
                ],
                200
            );
        }
        try {
            $data = [
                'product_id' => $request->product_id,
                'product_name' => $product->title,
                'qty' => $request->qty,
                'price' => $request->price,
                'varies' => $request->varies,
                'metaname' => $product->metaname,
                'weight' => $product->weight * $request->qty,
                'image1_path' => $product->image1_path,
                'discount' => $product->total_discount,
                'created_at' => $product->created_at,
            ];

            $cart = Session::get('cart', []);
            if (!$cart) {
                Session::push('cart', $data);
                return response()->json(
                    [
                        'status' => true,
                        'added_product' => $data,
                        'cart' => Session::get('cart'),
                        'message' => 'Item added to the cart',
                    ],
                    200
                );
            } else {
                foreach ($cart as &$el) {
                    if ($el['product_id'] == $request->product_id && json_encode($el['varies']) == json_encode($request->varies)) {
                        $el['qty'] += $request->qty;
                        Session::put('cart', $cart);

                        return response()->json(
                            [
                                'status' => true,
                                'added_product' => $data,
                                'cart' => Session::get('cart'),
                                'message' => 'Item added to the cart',
                            ],
                            200
                        );
                    }
                }
                Session::push('cart', $data);
                return response()->json(
                    [
                        'status' => true,
                        'added_product' => $data,
                        'cart' => Session::get('cart'),
                        'message' => 'Item added to the cart',
                    ],
                    200
                );
            }
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'status' => true,
                    'message' => $th->getMessage(),
                ],
                200
            );
        }
    }



    public function remove($arrayIndex)
    {
        try {
            $cart = Session::get('cart', []);
            // unset($cart[$arrayIndex]);
            array_splice($cart, $arrayIndex, 1);
            Session::put('cart', $cart);
            return response()->json(
                [
                    'status' => true,
                    'cart' => Session::get('cart'),
                    'message' => 'Item removed from the cart',
                ],
                200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'status' => true,
                    'message' => $th->getMessage(),
                ],
                200
            );
        }
    }
    public function updatecart($arrayIndex, $type)
    {
        try {
            $cart = Session::get('cart', []);
            if ($cart) {
                if ($type == 'increase') {
                    $cart[$arrayIndex]['qty'] += 1;
                } else if ($type == 'decrease') {
                    $cart[$arrayIndex]['qty'] -= 1;
                }
            }

            Session::put('cart', $cart);
            return response()->json(
                [
                    'status' => true,
                    'cart' => Session::get('cart'),
                    'message' => 'Item updated',
                ],
                200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'status' => true,
                    'message' => $th->getMessage(),
                ],
                200
            );
        }
    }

    public function shipping()
    {
        // $free_deliver_total = 0;
        $cart = Session::get('cart');
        $cities = CityModel::orderBy('loc_name', 'ASC')->get();
        $setting = SettingsModel::where('id', 1)->first();

        // if ($setting->is_active_free_deliver) {
        //     $free_deliver_total = $setting->free_deliver_total;
        // }
        $user_city_id = null;
        $user = null;

        if (Auth::user()) {
            $user_city_id = Auth::user()->city_id;
        }
        if (Auth::user()) {
            $user = Auth::user();
        }
        if ($cart) {
            return view('user.cart.shipping', compact('cart', 'user', 'cities', 'user_city_id', 'setting'));
        } else {
            return view('user.cart.index', compact('cart', 'cities', 'user_city_id'));
        }
    }
    public function payment()
    {
        $cart = Session::get('cart');
        return view('user.cart.payment', compact('cart'));
    }
}
