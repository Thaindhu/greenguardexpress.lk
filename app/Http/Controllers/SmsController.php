<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmsController extends Controller
{
    public function sendSms($data)
    {
        $curl = curl_init();
        // $url = 'https://e-sms.dialog.lk/api/v1/message-via-url/create/url-campaign?esmsqk=' . env('SMS_KEY') . ' &list=' . $data['number'] . ' &message=' . $data['message'];
        $url = "https://e-sms.dialog.lk/api/v1/message-via-url/create/url-campaign?esmsqk=" . env('SMS_KEY') . "&list=" . $data['number'] . "&message=" . $data['message'] . "";
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url, // your preferred link
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                // Set Here Your Requesred Headers
                'Content-Type: application/json',
            ),
        ));
        $response = curl_exec($curl);
        return $response;
    }
}
