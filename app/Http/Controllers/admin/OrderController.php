<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SmsController;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;


class OrderController extends Controller
{
    public function index($type)
    {
        $conditions = array();
        if ($type == 'pending') {
            array_push($conditions, array('sales.status', '=', 0));
        }
        if ($type == 'despatched') {
            array_push($conditions, array('sales.status', '=', 1));
        }
        if ($type == 'completed') {
            array_push($conditions, array('sales.status', '=', 4));
        }
        if ($type == 'canceled') {
            array_push($conditions, array('sales.status', '=', 2));
        }
        if ($type == 'returned') {
            array_push($conditions, array('sales.status', '=', 3));
        }
        $orders = DB::table('sales')
            ->where($conditions)
            ->where('is_verified', 1)
            ->where('is_otp_verified', 1)
            ->orderBy('id', 'desc')
            ->get();
        return view('admin.orders.index', compact('orders', 'type'));
    }

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
                ->select('s.*', 'p.title', 'p.metaname', 'p.image1_path')
                ->leftJoin('products as p', 'p.id', '=', 's.product_id')
                ->where('s.sale_id', $order->id)
                ->get();
        }
        // dd($order_details);
        return view('admin.orders.view', compact('order', 'order_details'));
    }
    public function print($id)
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
                ->select('s.*', 'p.title', 'p.metaname', 'p.image1_path')
                ->leftJoin('products as p', 'p.id', '=', 's.product_id')
                ->where('s.sale_id', $order->id)
                ->get();
        }
        // dd($order_details);
        return view('admin.orders.print', compact('order', 'order_details'));
    }

    public function update_status(Request $request)
    {

        $api_key               = "api654884a74cd2a";
        $client_id             = "14190";
        $recipient_name        = $request->order_name;
        $recipient_contact_no  = $request->order_mobile;
        $recipient_address     = $request->order_address;
        $recipient_city        = $request->order_city;
        $parcel_type           = "1";
        $cod_amount            = $request->order_amount_total;
        $parcel_description    = "greenguardexpress.lk";
        $order_id              = $request->order_id;
        $exchange              = "0";

        $waybillnumber = $this->pickup_request($api_key, $client_id, $recipient_name, $recipient_contact_no, $recipient_address, $recipient_city, $parcel_type, $cod_amount, $parcel_description, $order_id, $exchange);
        $obj = json_decode($waybillnumber);
        $updateValues = [
            "updated_at" => Carbon::now()->timezone('Asia/Colombo'),
        ];
        $status = 0;
        $type = "";
        switch ($request->type) {
            case 'despatched':
                $status = 1;
                $updateValues['status'] = 1;
                $updateValues['delivery_number'] = $obj->waybill_no;
                $updateValues['shipped_date'] = Carbon::now()->timezone('Asia/Colombo');
                $type = "Despatched";
                break;
            case 'canceled':
                $status = 2;
                $updateValues['status'] = 2;
                $updateValues['canceled_date'] = Carbon::now()->timezone('Asia/Colombo');
                $type = "Canceled";
                break;
            case 'returned':
                $status = 3;
                $updateValues['status'] = 3;
                $updateValues['returned_date'] = Carbon::now()->timezone('Asia/Colombo');
                $type = "Returned";
                break;
            case 'completed':
                $status = 4;
                $updateValues['status'] = 4;
                $updateValues['completed_date'] = Carbon::now()->timezone('Asia/Colombo');
                $type = "Completed";

                break;
            default:
                # code...
                break;
        }
        $result = DB::table('sales')->where('id', $request->order_id)
            ->update($updateValues);
        if ($result) {
            $order = DB::table('sales')->where('id', $request->order_id)->select('mobile_number')->first();
            if ($request->type == 'despatched') {
                $data['number'] = $order->mobile_number;
                $data['message'] = 'Dear+Customer,+Your+Order+Has+Been+Dispatched.+Tracking+No:' . $obj->waybill_no;
                $smscontroller = new SmsController();
                $res = $smscontroller->sendSms($data);
            }

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Status Updated',
                    'type' => $type,
                    'is_active' => $status,
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'status' => false,
                    'err_msg' => 'Status Updating Failed',
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
        return $server_output;
    }

    public function generatePDF(Request $request)
    {


        $srtToArr = explode(',', $request->ids);

        $order_details = [];
        $order = DB::table('sales as s')
            ->select('s.*', 'cities.loc_name')
            ->leftJoin('cities', 'cities.loc_id', '=', 's.city_id')
            ->whereIN('s.id', $srtToArr)->get();

        if ($order) {
            foreach ($order as $srt) {
                $order_detail = DB::table('sale_products as s')
                    ->select('s.*', 'p.title', 'p.metaname', 'p.image1_path')
                    ->leftJoin('products as p', 'p.id', '=', 's.product_id')
                    ->where('s.sale_id', $srt->id)
                    ->get();

                foreach ($order_detail as $orderd) {
                    $order_details[] = (object)[
                        "variations" => $orderd->variations,
                        "title" => $orderd->title,
                        "qty" => $orderd->qty,
                        "unit_price" => $orderd->unit_price,
                        "total_amount" => $orderd->total_amount,
                        "sale_id" => $orderd->sale_id,
                    ];
                }
            }
        }

        $data = [
            'orders' => $order,
            'order_details' => $order_details,
        ];

        $pdf = PDF::loadView('printall', $data);
        $fileName =  time() . '.' . 'pdf';
        $pdf->save(public_path() . '/' . $fileName);
        $pdf = public_path($fileName);
        return response()->download($pdf);

        // $pdf = Pdf::loadView('printall', $data);
        // return response()->download($pdf);

        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>abc</h1>');
        // return response()->$pdf->download($order[0]->invoice_number . '.pdf');
    } 

   
}
