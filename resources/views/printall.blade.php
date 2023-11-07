@foreach($orders as $order)
<!DOCTYPE html>
<html lang="en">

<head>
    <title>My Product</title>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style type="text/css">
h2 {
    text-align: center;
    font-size: 22px;
    margin-bottom: 50px;
}

body {
    background: #fff;
    margin: 0;
}

.section {
    margin-top: 2px;
    margin-left: 2px;
    margin-right: 2px;
    background: #fff;

}

.pdf-btn {
    margin-top: 30px;
}
</style>

<body>

    <div class="">
        <div class="col-md-8 section offset-md-2">
            <div class="panel panel-primary">




                <div class="invoice" id="printable">

                    <div class="invoice-company text-inverse f-w-600">
                        <img width="250px" src="{{ url('/assets-front/image/demo/logos/theme_logo.png') }}"
                            class="m-b-10" alt="">
                        <table>
                            <tr>
                                <td style="width: 40%;">
                                    <address class="m-t-5 m-b-5" style="font-size: 18px;margin-top:5px">
                                        greenguardexpress.lk<br>
                                        New supper market,Uragasmanhandiya.<br>
                                        info@myproducts.lk<br>
                                        0777 749 800 / 0752 800 800
                                    </address>
                                </td>
                                <td style="width: 60%;">
                                    <label
                                        style="display: inline-block; width: 4cm; height:2cm; margin-right:5px; margin-left:0px;  margin-top: 10px; text-align: center;">
                                        {!! DNS1D::getBarcodeHTML($order->delivery_number, 'CODABAR', 4, 140) !!}
                                    </span>
                                    <label
                                        style="margin-top:1px;font-size:22px; font-weight:bold; margin-left:180px;">{{ $order->delivery_number }}</label>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <br>

                    <div class="invoice-header">
                        <table>
                            <tr>
                                <td style="width: 300px">
                                    <address class="m-t-5 m-b-5" style="font-size:24px; font-weight: bold;">
                                        <u>Coustomer Details</u><br>
                                        {{ $order->first_name }} {{ $order->last_name }}<br>
                                        {{ $order->address_1 }},{{ $order->address_2 }}<br>
                                        {{ $order->loc_name }},<br>{{ $order->postal_code }}<br>
                                        {{ $order->mobile_number }}<br>
                                        {{ $order->email }}
                                    </address>
                                </td>
                                <td style="width: 100px">

                                </td>
                                <td style="width: 250px">
                                    <address class="m-t-5 m-b-5" style="font-size:20px;">
                                        Date: {{ $order->created_at }} <br>
                                        Order ID: #{{ $order->invoice_number }}<br>
                                        Payment Method: {{ strtoupper($order->payment_type) }}<br>
                                        Delivery Method: {{ $order->deliver_type }}
                                    </address>
                                </td>




                            </tr>
                        </table>

                    </div>


                    <div class="invoice-content">
                        <div class="table-responsive">
                            <table class="table  invoice-detail-table" style="font-size:20px;">
                                <thead>
                                    <tr class="thead-default">
                                        <th width="35%">Product</th>
                                        <th>Qty</th>
                                        <th>Unit Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order_details as $item)

                                    @if($order->id == $item->sale_id)

                                    @php
                                    $varies = json_decode($item->variations);
                                    @endphp
                                    <tr>
                                        <td>
                                            <h6 style="font-size:20px;">{{ $item->title }}</h6>
                                            @if ($varies)
                                            <ul style="font-size:20px;">
                                                @foreach ($varies as $vr)
                                                <li>{{ $vr->type }} -
                                                    {{ $vr->value }}
                                                </li>
                                                @endforeach
                                            </ul>
                                            @endif
                                        </td>
                                        <td style="font-size:20px;">{{ $item->qty }}</td>
                                        <td style="font-size:20px;">Rs.{{ number_format($item->unit_price, 2) }}</td>
                                        <td style="font-size:20px;">Rs.{{ number_format($item->total_amount, 2) }}</td>
                                    </tr>

                                    @endif
                                    @endforeach


                                </tbody>
                            </table>
                        </div>

                        <div class="invoice-price">
                            <table>
                                <tr>
                                    <td style="width: 300px">
                                        <div class="sub-price">
                                            <table>
                                                <tr>
                                                    <td style="width: 200px;font-size: 24px; font-weight: bold;"><span
                                                            class="text-inverse">SUBTOTAL</span></td>
                                                    <td><span class="text-inverse"
                                                            style="font-size: 20px; font-weight: bold;">Rs.{{ number_format($order->total_amount, 2) }}</span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 300px">
                                        @if($order->delivery_amount)
                                        <div class="sub-price">
                                            <table>
                                                <tr>
                                                    <td style="width: 200px; font-size: 24px; font-weight: bold;"><span
                                                            class="text-inverse">DELIVERY FEE</span></td>
                                                    <td><span class="text-inverse"
                                                            style="font-size: 20px; font-weight: bold;">Rs.{{ number_format($order->delivery_amount, 2) }}</span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 300px">
                                        <div class="sub-price">
                                            <table>
                                                <tr>
                                                    <td style="width: 200px;font-size: 24px; font-weight: bold;"><span
                                                            class="text-inverse">TOTAL</span></td>
                                                    <td><span class="text-inverse"
                                                            style="font-size: 20px; font-weight: bold;">Rs.{{ number_format($order->total_amount + $order->delivery_amount, 2) }}</span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>

                                </tr>
                            </table>
                        </div>
                    </div>
                    <br>
                    <div class="invoice-footer" style="font-size: 12px">
                        <p class="text-center f-w-200">
                            <span class="m-r-10">THANK YOU FOR YOUR BUSINESS</span><br>
                            <span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> greenguardexpress.lk </span>
                            <span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone"></i> +94 752 800 800</span>
                        </p>
                    </div>

                </div>
                <br>

            </div>
        </div>
    </div>

</body>

</html>

@endforeach