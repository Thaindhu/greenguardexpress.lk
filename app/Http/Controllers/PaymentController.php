<?php

namespace App\Http\Controllers;

use App\Models\PaymentModel;
use App\Models\SaleModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $merchant_secret = env('MERCHENT_SECRET'); //LIVE
        // $merchant_secret = '5bbf48def912840d79d798c49cd07e15';
        // echo "came";
        // exit;

        // $validator = Validator::make($request->all(), [
        //     'merchant_id' => 'required',
        //     'order_id' => 'required',
        //     'payhere_amount' => 'required',
        //     'payhere_currency' => 'required',
        //     'status_code' => 'required',
        //     'md5sig' => 'required',
        // ]);
        // if ($validator->fails()) {
        //     return response()->json(
        //         [
        //             'status' => 'Success',
        //             'message' => 'Invalid request',
        //         ],
        //         201
        //     );
        // }
        $merchant_id = $request->merchant_id;
        $order_id = $request->order_id;
        $payhere_amount = $request->payhere_amount;
        $payhere_currency = $request->payhere_currency;
        $status_code  = $request->status_code;
        $md5sig = $request->md5sig;

        $card_holder_name = $request->card_holder_name;
        $card_no = $request->card_no;
        $card_expiry = $request->card_expiry;
        $payment_id = $request->payment_id;
        $method = $request->method;

        $local_md5sig = strtoupper(
            md5(
                $merchant_id .
                    $order_id .
                    $payhere_amount .
                    $payhere_currency .
                    $status_code .
                    strtoupper(md5($merchant_secret))
            )
        );

        if (($local_md5sig === $md5sig) AND ($status_code == 2) ){
            $order = SaleModel::where('invoice_number', $request->order_id)->first();
            $res = DB::table('sales')
                ->where('invoice_number', $request->order_id)
                ->update(['is_verified' => 1]);
            $res = PaymentModel::create([
                "user_id" => null,
                "sale_id" => null,
                "invoice_number" => $order_id,
                "payment_ref" => $payment_id,
                "payment_currency" => $payhere_currency,
                "payment_amount" => $payhere_amount,
                "payment_method" => $method,
                "card_holder_name" => $card_holder_name,
                "card_no" => $card_no,
                "card_ex_date" => $card_expiry,
                "status_msg" => $status_code,
                "created_at" => Carbon::now()->timezone('Asia/Colombo'),
                "updated_at" => Carbon::now()->timezone('Asia/Colombo'),
            ]);
            $url = env('APP_URL') . '/' . 'order/' . $request->order_id;
            $data['number'] = $order->mobile_number;
            $data['message'] = 'Dear+Customer+Thank+you+for+using+greenguardexpress.lk.+Please+use+this+url+for+get+your+order+details:+' . $url;

            $smscontroller = new SmsController();
            $smscontroller->sendSms($data);
        }
        // else {
        //     $res = PaymentModel::create([
        //         "user_id" => 1,
        //         "sale_id" => 2,
        //         "invoice_number" => 213213,
        //         "payment_ref" => 213213,
        //         "payment_currency" => "lkr",
        //         "payment_amount" => 1000,
        //         "payment_method" => "visa",
        //         "card_holder_name" => "aa n",
        //         "card_no" => "1234",
        //         "card_ex_date" => "12/24",
        //         "status_msg" => 200,
        //         "created_at" => Carbon::now()->timezone('Asia/Colombo'),
        //         "updated_at" => Carbon::now()->timezone('Asia/Colombo'),
        //     ]);
        // }
    }
}
