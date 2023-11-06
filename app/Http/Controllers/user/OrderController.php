<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SmsController;
use App\Mail\invoice;
use App\Models\SaleModel;
use App\Models\SaleProductsModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class OrderController extends Controller
{
    public function view($id)
    {
        $order_details = null;
        $order = DB::table('sales as s')
            ->select('s.*', 'cities.loc_name')
            ->leftJoin('cities', 'cities.loc_id', '=', 's.city_id')
            ->where('invoice_number', $id)->first();
        // dd($order);
        if ($order) {
            // $order_details = [];
            $order_details = DB::table('sale_products as s')
                ->select('s.*', 'p.title', 'p.metaname',)
                ->leftJoin('products as p', 'p.id', '=', 's.product_id')
                ->where('s.sale_id', $order->id)
                ->get();
        }
        // print_r($order); 
        

       
        return view('user.profile.order', compact('order', 'order_details'));
        // exit();
    }

    public function history()
    {
        // dd('came');
        $orders = DB::table('sales')
            ->where('user_id', Auth::user()->id)
            ->where('is_verified', 1)
            ->where('is_otp_verified', 1)
            ->get();
        return view('user.profile.order_history', compact('orders'));
    }

    public function store(Request $request)
    {
        // dd($request->user_type);
        $this->validate($request, [
            // 'user_type' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile_number' => 'required',
            // 'email' => 'required',
            'city_id' => 'required',
            'address_1' => 'required',
            // 'payment_method' => 'required',
            'delivery_charge' => 'required',
        ]);
        $otp = mt_rand(100000, 999999);
        $order_id = time() . rand(10, 1000);
        $cart = Session::get('cart');
        if (!$cart) {
            return back()->with('error', 'Your cart is empty');
        }
        $total = 0;
        if ($cart) {
            foreach ($cart as &$el) {
                $total += $el['price'] * $el['qty'];
            }
        }
        try {
            // $file_path = null;
            // // dd($request->file('slip'));
            // if ($request->file('slip')) {
            //     $ext = pathinfo($request->slip->getClientOriginalName(), PATHINFO_EXTENSION);
            //     if ($ext == null || $ext == '') {
            //         $ext = 'jpeg';
            //     }
            //     $filename = time() . '-' . preg_replace("/[^\w]+/", "-", strtolower($order_id)) . '.' . $ext;
            //     // $file_path = $request->file('image_2')->storeAs('uploads/categories', $image_2_name, 'public');
            //     $file_path = $request->file('slip')->move(public_path('uploads/slips'), $filename);
            //     $file_path = env('APP_URL') . "/uploads/slips/" . $filename;
            // }
          

            $res = SaleModel::create([
                "invoice_number" => $order_id,
                "user_id" => Auth::user() ? Auth::user()->id : null,
                "user_type" => Auth::user() ? 'registered_user' : 'guest',
                "payment_type" => null,
                "slip_path" => null,
                "total_amount" => floatval($total),
                "deliver_type" => $request->deliver_type,
                "delivery_amount" => floatval($request->delivery_charge),
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "address_1" => $request->address_1,
                "address_2" => null,
                "city_id" => $request->city_id,
                "email" => $request->email,
                "mobile_number" => $request->mobile_number,
                "postal_code" => $request->postal_code,
                "status" => 0,
                "remark" => null,
                "is_active" => 1,
                "otp" => $otp,
                "is_verified" => 1,
                "is_otp_verified" => 1,
                "created_at" => Carbon::now()->timezone('Asia/Colombo'),
                "updated_at" => Carbon::now()->timezone('Asia/Colombo'),
            ]);
            // ------------update deliver_amount-----------------------------
             $order = DB::table('sales as s')
            ->select('s.*', 'cities.loc_name','cities.delivery_rate as delivery_rate')
            ->leftJoin('cities', 'cities.loc_id', '=', 's.city_id')
            ->where('invoice_number', $order_id)->first();

            // $order_details = [];
              $order_details = DB::table('sale_products as s')
              ->select('s.*', 'p.title', 'p.metaname','p.weight as pweight',)
              ->leftJoin('products as p', 'p.id', '=', 's.product_id')
              ->where('s.sale_id', $order->id)
              ->get();

            $delivery_rate=$order->delivery_rate;
            $total_gram=0;
            $diliveryFree=0;
            $extra_dilivery_free=0;
            foreach ($order_details as $item){
                $total_gram=($item->pweight*$item->qty)+$total_gram;
            } 
            if($total_gram>1000){
               $roundedGramsInKilograms=ceil($total_gram/1000)-1;
               $extra_dilivery_free=50*$roundedGramsInKilograms;
               $diliveryFree=$extra_dilivery_free+$delivery_rate;
            }else{
                $diliveryFree=$delivery_rate;
            } 
            // Need update delivery_amount 
            DB::table('sales')
            ->where('id', $order->id) 
            ->update(['delivery_amount' => $diliveryFree]);
          // -----------------------------------------------------------------

            if ($res) {
                $dataset = array();
                foreach ($cart as $key => $value) {
                    array_push(
                        $dataset,
                        array(
                            'sale_id' => $res->id,
                            'product_id' => $value['product_id'],
                            'qty' => $value['qty'],
                            'unit_price' => $value['price'],
                            'total_amount' => $value['qty'] * $value['price'],
                            'variations' => json_encode($value['varies']),
                            'total_discount_precentage' => null,
                            'total_discount' => null,
                            'is_active' => 1,
                        )
                    );
                }
                $result = SaleProductsModel::insert($dataset);
                if ($res && $result) {
                    return redirect()->route('user.order.payment', $res->invoice_number);
                    //remove OTP verfictaton , Below code.. OTP verfication remove
                    // if (Auth::user()) {
                    //     return redirect()->route('user.order.payment', $res->invoice_number);
                    //     // Session::forget('cart');
                    //     // return redirect()->route('user.cart.order_status', $res->invoice_number)->with('success', "Your Order has been placed. Thank you for choosing myproduct.lk.");
                    // } else {
                    //     $data['number'] = $request->mobile_number;
                    //     $data['message'] = 'Dear+Customer+Please+use+following+OTP:+' . $otp . '+to+complete+your+request';

                    //     $smscontroller = new SmsController();
                    //     $res = $smscontroller->sendSms($data);
                    //     return view('user.cart.confirm_order', compact('order_id'));
                    // }
                }
            }
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
    // public function verify_order_view($order_id)
    // {
    //     return view('user.cart.confirm_order', compact('order_id'));
    // }
    public function verify_otp(Request $request)
    {
        $this->validate($request, [
            'order_id' => 'required',
            'otp' => 'required',
        ]);
        $order = DB::table('sales as s')
            ->select('s.*', 'cities.loc_name')
            ->leftJoin('cities', 'cities.loc_id', '=', 's.city_id')
            ->where('invoice_number', $request->order_id)->first();
        if ($order) {
            $order_id = $request->order_id;
            if ($order->otp == $request->otp) {
                DB::table('sales')
                    ->where('invoice_number', $request->order_id)
                    ->update(['is_otp_verified' => 1]);
            } else {
                // return redirect()->back()->with(compact('order_id'));
                return view('user.cart.confirm_order', compact('order_id'))->with('error', 'Invalid OTP');
            }
            // $order_details = [];
            // $order_details = DB::table('sale_products as s')
            //     ->select('s.*', 'p.title', 'p.metaname',)
            //     ->leftJoin('products as p', 'p.id', '=', 's.product_id')
            //     ->where('s.sale_id', $order->id)
            //     ->get();

            return redirect()->route('user.order.payment', $request->order_id);
            // Session::forget('cart');
            // return redirect()->route('user.cart.order_status', $order->invoice_number)->with('success', "Your Order has been placed. Thank you for choosing myproduct.lk.");
        } else {
            return back()->with('error', 'Invalid Order');
        }

        // dd($order);

    }
    public function order_status($id)
    {
        Session::forget('cart');
        $order_details = null;
        $order = null;
        $diliveryFree=0;
        $order = DB::table('sales as s')
            ->select('s.*', 'cities.loc_name','cities.delivery_rate as delivery_rate')
            ->leftJoin('cities', 'cities.loc_id', '=', 's.city_id')
            ->where('invoice_number', $id)->first();

         
            
 

   
        if ($order) {

            if ($order->deliver_type == 'delivery') {
              //  $this->add_to_courier($order);
            }
            // $order_details = [];
            $order_details = DB::table('sale_products as s')
                ->select('s.*', 'p.title', 'p.metaname','p.weight as pweight',)
                ->leftJoin('products as p', 'p.id', '=', 's.product_id')
                ->where('s.sale_id', $order->id)
                ->get();

        $delivery_rate=$order->delivery_rate;
        $total_gram=0;
        $extra_dilivery_free=0;
        foreach ($order_details as $item){
            $total_gram=($item->pweight*$item->qty)+$total_gram;
        } 
        if($total_gram>1000){
           $roundedGramsInKilograms=ceil($total_gram/1000)-1;
           $extra_dilivery_free=50*$roundedGramsInKilograms;
           $diliveryFree=$extra_dilivery_free+$delivery_rate;
        }else{
            $diliveryFree=$delivery_rate;
        }

        DB::table('sales')
            ->where('id', $order->id) 
            ->update(['delivery_amount' => $diliveryFree]);

           //sent_email   
        if (!empty($order->email) && filter_var($order->email, FILTER_VALIDATE_EMAIL)) {
            Mail::to($order->email)->send(new \App\Mail\invoice($order,$order_details,$diliveryFree));
       }  

            return view('user.cart.order_status', compact('order', 'order_details','diliveryFree'));
        }
        return back()->with('error', 'Your cart is empty');
    }

    public function add_to_courier($order)
    {
        //delivery amount
        $delivery_amount = $order->delivery_amount ?? 0;
        //full order total amount
        $total_amount = $order->total_amount + $delivery_amount;

        //call set parcel variables
        $api_key               = "api6391c73994712";
        $client_id             = "14190";
        $recipient_name        = $order->first_name . $order->last_name;
        $recipient_contact_no  = $order->mobile_number;
        $recipient_address     = $order->address_1 . $order->address_2;
        $recipient_city        = "nugegoda";
        $parcel_type           = "2";
        $cod_amount            = $order->payment_type == 'cod' ? $total_amount : "0.00";
        $parcel_description    = "greenguardexpress.lk";
        $order_id              = $order->invoice_number;
        $exchange              = "0";


        //call pickup_request function
        $this->pickup_request($api_key, $client_id, $recipient_name, $recipient_contact_no, $recipient_address, $recipient_city, $parcel_type, $cod_amount, $parcel_description, $order_id, $exchange);
    }
    public function pickup_request($api_key, $client_id, $recipient_name, $recipient_contact_no, $recipient_address, $recipient_city, $parcel_type, $cod_amount, $parcel_description, $order_id, $exchange)
    {
        // curl post

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://fardardomestic.com/api/p_request_v1.02.php");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt(
            $ch,
            CURLOPT_POSTFIELDS,
            "client_id=$client_id&api_key=$api_key&recipient_name=$recipient_name&recipient_contact_no=$recipient_contact_no&recipient_address=$recipient_address&parcel_type=$parcel_type&recipient_city=$recipient_city&parcel_description=$parcel_description&cod_amount=$cod_amount&order_id=$order_id&exchange=$exchange"
        );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close($ch);
        $res = json_decode($server_output);
        // dd($res->status);
        if ($res->status == 204) {
            $updateValues['delivery_number'] = $res->waybill_no;
            $result = DB::table('sales')->where('invoice_number', $order_id)
                ->update($updateValues);
        }
    }

    public function cancel_order($order_id)
    {
        $updateValues = [
            "updated_at" => Carbon::now()->timezone('Asia/Colombo'),
        ];
        $updateValues['status'] = 2;
        $updateValues['canceled_date'] = Carbon::now()->timezone('Asia/Colombo');

        $result = DB::table('sales')->where('invoice_number', $order_id)
            ->update($updateValues);
        if ($result) {
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Order cancelled.',
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'status' => false,
                    'err_msg' => 'Order cancellation failed. Please contact our customer care.',
                ],
                201
            );
        }

        try {
        } catch (\Illuminate\Database\QueryException $e) {

            if ($e->getCode() === '23000') {
                return response()->json(
                    [
                        'status' => false,
                        'err_msg' => 'This sub category is already in use. Cannot Delete',
                    ],
                    201
                );
            } else {
                return response()->json(
                    [
                        'status' => false,
                        'err_msg' => $e->getMessage(),
                    ],
                    201
                );
            }
        }
    }

    public function cancel_guest_order($id)
    {
        $order = DB::table('sales')
            ->where('id', $id)->first();
        if (!$order) {
            return response()->json(
                [
                    'status' => false,
                    'err_msg' => 'This order cannot be found. Please contact customer care',
                ],
                201
            );
        }
        $otp = mt_rand(100000, 999999);
        $res = DB::table('sales')
            ->where('id', $id)
            ->update(['otp' => $otp]);
        $data['number'] = $order->mobile_number;
        $data['message'] = 'Dear+Customer+Please+use+following+OTP:+' . $otp . '+to+complete+your+request';

        $smscontroller = new SmsController();
        $result = $smscontroller->sendSms($data);
        if ($res) {
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Please enter the OTP that we sent to your mobile in order to continue',
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'status' => false,
                    'err_msg' => 'Order cancellation failed. Please contact our customer care.',
                ],
                201
            );
        }
    }

    public function cancel_guest_order_confrim($id, $otp)
    {
        // return response()->json(
        //     [
        //         'status' => true,
        //         'message' => 'Order cancelled.',
        //     ],
        //     200
        // );
        $order = DB::table('sales')
            ->where('id', $id)->first();
        if (!$order) {
            return response()->json(
                [
                    'status' => false,
                    'err_msg' => 'This order cannot be found. Please contact customer care',
                ],
                201
            );
        }
        if ($order->otp == $otp) {
            $updateValues = [
                "updated_at" => Carbon::now()->timezone('Asia/Colombo'),
            ];
            $updateValues['status'] = 2;
            $updateValues['canceled_date'] = Carbon::now()->timezone('Asia/Colombo');

            $result = DB::table('sales')->where('id', $id)
                ->update($updateValues);
            if ($result) {
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Order cancelled.',
                    ],
                    200
                );
            } else {
                return response()->json(
                    [
                        'status' => false,
                        'err_msg' => 'Order cancellation failed. Please contact our customer care.',
                    ],
                    201
                );
            }
        } else {
            return response()->json(
                [
                    'status' => false,
                    'err_msg' => 'Invalid OTP',
                ],
                201
            );
        }
    }

    public function payment_get($order_id)
    {
        $cart = Session::get('cart');
        $user_city_id = null;
        $user = null;
        $diliveryFree=0;
        $order = SaleModel::where('invoice_number', $order_id)->first();
        if (!$order->user_type == "registered_user" && !Auth::user()) {
            return redirect('/login')->with('error', 'You must be logged in first.');
        }
        if (!$cart) {
            return view('user.cart.index', compact('cart', 'user', 'user_city_id'));
        }
        $order = DB::table('sales as s')
            ->select('s.*', 'cities.loc_name as city_name','cities.delivery_rate as delivery_rate')
            ->leftJoin('cities', 'cities.loc_id', '=', 's.city_id')
            ->where('invoice_number', $order_id)
           ->first();
            
 

        $order_details = DB::table('sale_products as s')
            ->select('s.*', 'p.title as product_name', 'p.metaname','p.weight as pweight',)
            ->leftJoin('products as p', 'p.id', '=', 's.product_id')
            ->where('s.sale_id', $order->id)
            ->get();
         
        $delivery_rate=$order->delivery_rate;
        $total_gram=0;
        $extra_dilivery_free=0;
        foreach ($order_details as $item){
            $total_gram=($item->pweight*$item->qty)+$total_gram;
        } 
        if($total_gram>1000){
           $roundedGramsInKilograms=ceil($total_gram/1000)-1;
           $extra_dilivery_free=50*$roundedGramsInKilograms;
           $diliveryFree=$extra_dilivery_free+$delivery_rate;
        }else{
            $diliveryFree=$delivery_rate;
        }
        DB::table('sales')
        ->where('id', $order->id) 
        ->update(['delivery_amount' => $diliveryFree]);
        return view('user.cart.payment', compact('order', 'order_details','diliveryFree'));
    }

    public function update_payment_method(Request $request)
    {

        $this->validate($request, [
            'payment_method' => 'required',
            'order_id' => 'required',
        ]);
  
        $order_id = $request->order_id;
        $order = SaleModel::where('invoice_number', $order_id)->first();
        if ($order->payment_type && $order->is_verified) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'reload',
                    'data' => $request
                ],
                200
            );
        }
        $updateValues = [
            'payment_type' => $request->payment_method,
        ];
        try {
            if ($request->payment_method == 'bank_pay') {
                $updateValues['is_verified'] = 1;
                $file_path = null;
                // dd($request->file('slip'));
                if ($request->file('slip')) {
                    $ext = pathinfo($request->slip->getClientOriginalName(), PATHINFO_EXTENSION);
                    if ($ext == null || $ext == '') {
                        $ext = 'jpeg';
                    }
                    $filename = time() . '-' . preg_replace("/[^\w]+/", "-", strtolower($order_id)) . '.' . $ext;
                    // $file_path = $request->file('image_2')->storeAs('uploads/categories', $image_2_name, 'public');
                    $file_path = $request->file('slip')->move(public_path('uploads/slips'), $filename);
                    $file_path = env('APP_URL') . "/uploads/slips/" . $filename;
                    $updateValues['slip_path'] = $file_path;
                }
            }
            if ($request->payment_method == 'cod') {
                $updateValues['is_verified'] = 1;
            }
            if ($request->payment_method == 'koko') {
                $updateValues['is_verified'] = 1;
            }
            $res = DB::table('sales')
                ->where('invoice_number', $request->order_id)
                ->update($updateValues);
            if ($res) {
                if ($request->payment_method != 'online') {
                    $url = env('APP_URL') . '/' . 'order/' . $request->order_id;
                    $data['number'] = $order->mobile_number;
                    $data['message'] = 'Dear+Customer+Thank+you+for+using+greenguardexpress.lk.+Please+use+this+url+for+get+your+order+details:+' . $url;

                    $smscontroller = new SmsController();
                    $result = $smscontroller->sendSms($data);
                }
                
                Session::flash('success', 'Your Order has been placed. Thank you for choosing myproduct.lk!');
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Order Updated',
                        'order_id' => $request->order_id,
                        'payment_type' => $request->payment_method,
                    ],
                    200
                );
            } else {
                if ($request->payment_method == "online" && $order->is_verified != 1) {
                    
                    return response()->json(
                        [
                            'status' => true,
                            'message' => 'Order Updated',
                            'order_id' => $request->order_id,
                            'payment_type' => $request->payment_method,
                        ],
                        200
                    );
                } else {
                    return response()->json(
                        [
                            'status' => false,
                            'message' => 'Payment already updated for this order.',
                        ],
                        200
                    );
                }
                return response()->json(
                    [
                        'status' => false,
                        'message' => 'Payment method valdiating failed',
                    ],
                    201
                );
            }
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $th->getMessage(),
                ],
                201
            );
        }
    }


    public function proceedMintpay($id, $invoice_number, $delivery_amount)
    {

        $products = [];
        $total = 0;
        $total_discount = 0;
        $created_at_date = "";
        $cart = Session::get('cart');
        foreach ($cart as $key => $value) {
            $products[] = (object) [
                "name" => $value['product_name'],
                "product_id" => $value['product_id'],
                "sku" => $value['varies'] != null ? $value['varies'][0]['value'] : null,
                "quantity" => $value['qty'],
                "unit_price" => $value['price'],
                "discount" => $value['discount'],
                "created_date" => $value['created_at'],
                "updated_date" => $value['created_at']
            ];
            $total += ($value['qty'] * $value['price']);
            $total_discount += $value['discount'];
            $created_at_date = $value['created_at'];
        }

        $request_one = Http::withHeaders([
            'Authorization' => 'Token 11639fbd36c0570b5f4656bfb1138f941b6367ad',
            'Content-Type' => 'application/json'
        ])->post('https://app.mintpay.lk/user-order/api/', [
            "merchant_id" => "mp0582",
            "order_id" => $invoice_number,
            "total_price" => ($total + $delivery_amount),
            "discount" => $total_discount,
            "customer_email" => session()->get('LoggedUser')->email == null ? 'info@myproduct.lk' : session()->get('LoggedUser')->email,
            "customer_id" => session()->get('LoggedUser')->id,
            "customer_telephone" => session()->get('LoggedUser')->mobile_number,
            "ip" => request()->ip(),
            "x_forwarded_for" => "65.109.86.90",
            "delivery_street" => session()->get('LoggedUser')->address_1,
            "delivery_region" => session()->get('LoggedUser')->address_2,
            "delivery_postcode" => session()->get('LoggedUser')->postal_code,
            "cart_created_date" => $created_at_date,
            "cart_updated_date" => $created_at_date,
            "products" => $products,
            "success_url" => "https://myproduct.lk/checkout/complete/" . $invoice_number,
            "fail_url" => "https://myproduct.lk/order/" . $invoice_number . "/payment",
        ]);


        $jsonData = $request_one->json();
        $encodedData = json_encode($jsonData);
        $obj = json_decode($encodedData);


        $sale_model = SaleModel::find($id);
        $sale_model->mpay_data = $obj->data;
        $sale_model->payment_type = "Mintpay";
        $sale_model->is_verified = 1;
        $sale_model->save();


        $url = 'https://app.mintpay.lk/user-order/login/';
        $key = '<input type="text" name="purchase_id" value=' . $obj->data . '>';

        echo '<form style="display:none;" action="' . $url . '" method="post" id="m_pay">' . $key . '
                <input type="submit" class="button-alt" id="submit" value="submit"/>
                    <script type="text/javascript">
                    document.getElementById("submit").click();
                    </script>
                </form>';
    }


    public function proceedKoko($id, $invoice_number, $delivery_amount)
    {

        $sale_model = SaleModel::find($id);
        $sale_items = SaleProductsModel::join('products', 'products.id', 'sale_products.product_id')
            ->select('products.id', 'products.title', 'products.price', 'sale_products.total_discount', 'sale_products.qty', 'sale_products.created_at', 'sale_products.updated_at')
            ->where('sale_id', $id)->get();
        $products = [];

        foreach ($sale_items as $key => $value) {
            $products[] = (object) [
                "name" => $value['title'],
                "product_id" => $value['id'],
                "quantity" => $value['qty'],
                "unit_price" => $value['price'],
                "discount" => $value['total_discount'],
                "created_date" => $value['created_at'],
                "updated_date" => $value['created_at']
            ];
        }

        $order_id = $invoice_number; // ex: 123456789125
        $merchant = 'e98e34331fce347bd26191cbe4ddf1dc';
        $amount = $sale_model->total_amount + $delivery_amount;
        $currency = 'LKR';
        $pluginName = "customapi";
        $pluginVersion = 1;
        $reference = $merchant . rand(111, 999) . '-' . $order_id;
        $firstName = 'Shihan';
        $lastName = 'Abdeen';
        $email = 'webivox@gmail.com';
        $mobile = '0777904054';
        $apiKey = 'I8PeVMOaS0RhaiIZNy8odLryRbonlRgV';
        $redirect_url = 'https://www.beimmune.lk/';

        $productName = json_encode($products);

        $dataString = $merchant . $amount . $currency . $pluginName . $pluginVersion . $redirect_url . $redirect_url . $order_id .
            $reference . $firstName . $lastName . $email . $productName . $apiKey . $redirect_url;

        $pkeyid = openssl_get_privatekey(file_get_contents("../private_key.pem"));

        if (!openssl_sign($dataString, $signature, $pkeyid, OPENSSL_ALGO_SHA256)) {
            $signatureEncoded = openssl_error_string();
        } else {
            $signatureEncoded = base64_encode($signature);
        }


        $darazbnpl_args = array(
            '_mId' => $merchant,
            'api_key' => $apiKey,
            '_returnUrl' => $redirect_url,
            '_responseUrl' => $redirect_url,
            '_currency' => $currency,
            '_amount' => $amount,
            '_reference' => $reference,
            '_pluginName' => $pluginName,
            '_pluginVersion' => $pluginVersion,
            '_cancelUrl' => $redirect_url,
            '_orderId' => $order_id,
            '_firstName' => $firstName,
            '_lastName' => $lastName,
            '_email' => $email,
            '_description' => $productName,
            'dataString' => $dataString,
            'signature' => $signatureEncoded,
            // '_type' => 'ONE_TIME',
            '_mobileNo' => $mobile
        );

        $darazbnpl_args_array = array();
        foreach ($darazbnpl_args as $key => $value) {
            $darazbnpl_args_array[] = "<input type='hidden' name='$key' value='$value'/>";
        }


        $url = 'https://prodapi.paykoko.com/api/merchants/orderCreate';

        echo '    <form action="' . $url . '" method="post" id="darazbnpl_payment_form">
                        ' . implode('', $darazbnpl_args_array) . '
                        <input type="submit" class="button-alt" id="submit_darazbnpl_payment_form" value="NExt" style="display:none;"/> <a class="button cancel" href="' . $redirect_url . '" style="display:none;">Cancel</a>
                            <script type="text/javascript">
                            jQuery(function(){
                            jQuery("body").block({
                                message: Thanks for your order! We are now redirecting you to DarazBNPL Payment Gateway to make the payment.,
                                overlayCSS: {
                                    background      : "#fff",
                                    opacity         : 0.8
                                },
                                css: {
                                    padding         : 20,
                                    textAlign       : "center",
                                    color           : "#333",
                                    border          : "1px solid #eee",
                                    backgroundColor : "#fff",
                                    cursor          : "wait",
                                    lineHeight      : "32px"
                                }
                            });
                            
                        });
                            </script>

                            <script type="text/javascript">
                            document.getElementById("submit_darazbnpl_payment_form").click();
                            </script>
                        </form>';

        if ($url) {
            $sale_model->payment_type = "KOKO";
            $sale_model->is_verified = 1;
            $sale_model->save();
        }
    }


    public function proceedPayhere(Request $request)
    { 
      
        $orderDetils = DB::table('sales')->where('id', $request->orderId)->first();

        $orderItemDetils = DB::table('sale_products')
            ->join('products', 'products.id', 'sale_products.product_id')
            ->where('sale_products.sale_id', $orderDetils->id)
            ->first();

        $userDetils = DB::table('sales')
            ->join('users', 'users.id', 'sales.user_id')
            ->where('sales.id', $orderDetils->id)
            ->first();
        if( $userDetils==null){
            $userDetils = DB::table('users')->where('id',2)->first();
        }
        
        $total_amount = floatval($orderDetils->total_amount + $orderDetils->delivery_amount);

        $merchant_id = "223120";
        $merchant_secret = "MTA0ODA0MjA4NTg1MjMxODM3MzEyOTg3NzAyNDI0MDU5ODg3OTc=";
        $order_id = $request->invoiceNumber;
        $amount = number_format($total_amount, 2, '.', '');
        $currency = "LKR";

        $hash = strtoupper(
            md5(
                $merchant_id .
                    $order_id .
                    number_format($amount, 2, '.', '') .
                    $currency .
                    strtoupper(md5($merchant_secret))
            )
        );

    
        return response()->json(["hash" => $hash, 'orderItemDetils' => $orderItemDetils, 'orderDetils' => $orderDetils, 'userDetils' => $userDetils]);
    } 

    
}