<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Invoice - 1676958546155</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="text/javascript" src="{{ asset('files\assets\js\jQuery.print.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        function addScript(url) {
            var script = document.createElement('script');
            script.type = 'application/javascript';
            script.src = url;
            document.head.appendChild(script);
        }
        addScript('https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js');

        function printHtml() {
            var element = document.getElementById('printable');
            html2pdf(element);
        }
    </script>

</head>

<body class="A5">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container">
        <div class="col-md-6">
            <span class="pull-right noPrint">
                <!-- <a href="javascript:;" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-file t-plus-1 text-danger fa-fw fa-lg"></i> Export as PDF</a> -->
                <a href="javascript:;" onclick="printHtml()" class="btn btn-sm btn-white m-b-10 p-l-5">
                    <i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
            </span>
            <div class="invoice" id="printable">

                <div class="invoice-company text-inverse f-w-600">
                    <img width="250px" src="{{ url('/assets-front/image/demo/logos/theme_logo.png') }}" class="m-b-10" alt="">
                    <div class="row">
                        <div class="col-lg-6">
                            <address class="m-t-5 m-b-5" style="font-size: 15px;margin-top:5px">
                                greenguardexpress.lk<br>
                                New supper market, Uragasmanhandiya.<br>
                                info@myproducts.lk<br>
                                0777 749 800 / 0752 800 800
                            </address>
                        </div>
                        <div class="col-lg-6">
                            <span style="display: inline-block; font-size: 40px; margin-top:10px">{!! DNS1D::getBarcodeHTML($order->delivery_number, 'CODABAR')!!}</span>
                            <span style="margin-top:2px;font-size:20px">{{ $order->delivery_number }}</span>
                        </div>
                    </div>
                </div>



                <div class="invoice-header">
                    <div class="invoice-from">
                        <strong class="text-inverse">Shipping address</strong>
                        <address class="m-t-5 m-b-5">
                            {{ $order->first_name }} {{ $order->last_name }}<br>
                            {{ $order->address_1 }},{{ $order->address_2 }}<br>
                            {{ $order->loc_name }},<br>{{ $order->postal_code }}<br>
                            {{ $order->mobile_number }}<br>
                            {{ $order->email }}
                        </address>
                    </div>
                    <div class="invoice-to">
                        <strong class="text-inverse">ORDER INFORMATION</strong>
                        <address class="m-t-5 m-b-5">
                            Date: {{ $order->created_at }} <br>
                            Order ID: #{{ $order->invoice_number }}<br>
                            Payment Method: {{ strtoupper($order->payment_type) }}<br>
                            Delivery Method: {{ $order->deliver_type }}
                        </address>
                    </div>
                    <div class="invoice-form">
                        <strong class="text-inverse">Invoice</strong>
                        <div class="invoice-detail">
                            #{{ $order->invoice_number }}
                        </div>
                    </div>
                </div>


                <div class="invoice-content">

                    <div class="table-responsive">
                        <table class="table  invoice-detail-table">
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
                                @php
                                $varies = json_decode($item->variations);
                                @endphp
                                <tr>
                                    <td>
                                        <h6>{{ $item->title }}</h6>
                                        @if ($varies)
                                        <ul>
                                            @foreach ($varies as $vr)
                                            <li>{{ $vr->type }} -
                                                {{ $vr->value }}
                                            </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </td>
                                    <td>{{ $item->qty }}</td>
                                    <td>Rs.{{ number_format($item->unit_price, 2) }}</td>
                                    <td>Rs.{{ number_format($item->total_amount, 2) }}</td>
                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>

                    <br>

                    <div class="invoice-price">
                        <div class="invoice-price-left">
                            <div class="invoice-price-row">
                                <div class="sub-price">
                                    <small style="font-size: 20px; font-weight: bold;">SUBTOTAL</small>
                                    <span  style="font-size: 20px; font-weight: bold;" class="text-inverse">Rs.{{ number_format($order->total_amount, 2) }}</span>
                                </div>
                                @if($order->delivery_amount)
                                <div class="sub-price">
                                    <i class="fa fa-plus text-muted"></i>
                                </div>
                                <div class="sub-price">
                                    <small style="font-size: 20px;font-weight: bold;">DELIVERY FEE</small>
                                    <span style="font-size: 20px;font-weight: bold;" class="text-inverse">Rs.{{ number_format($order->delivery_amount, 2) }}</span>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="invoice-price-right" style="background: #f0f3f4;color:#000;text-align: unset;right:7px;">
                            <small style="color:#000; " style="font-size: 20px;font-weight: bold;">TOTAL .</small> <span class="f-w-600" style="font-size: 20px;font-weight: bold;">Rs.{{ number_format($order->total_amount + $order->delivery_amount, 2) }}</span>
                        </div>
                    </div>

                </div>


                <!-- <div class="invoice-note">
                    * Make all cheques payable to [Your Company Name]<br>
                    * Payment is due within 30 days<br>
                    * If you have any questions concerning this invoice, contact [Name, Phone Number, Email]
                </div> -->


                <div class="invoice-footer">
                    <p class="text-center m-b-5 f-w-600">
                        THANK YOU FOR YOUR BUSINESS
                    </p>
                    <p class="text-center">
                        <span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> greenguardexpress.lk </span>
                        <span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone"></i> +94 752 800 800</span>
                        <!-- <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="e89a9c818d85989ba88f85898184c68b8785">[email&#160;protected]</a></span> -->
                    </p>
                </div>

            </div>
        </div>
    </div>
    <style type="text/css">
        /* body {
            margin-top: 20px;
            background: #eee;
        } */

        /* .invoice {
            background: #fff;
            padding: 20px
        } */

        .invoice-company {
            font-size: 20px
        }

        .invoice-header {
            margin: 0 -20px;
            background: #f0f3f4;
            padding: 20px
        }

        .invoice-date,
        .invoice-from,
        .invoice-to {
            display: table-cell;
            width: 1%
        }

        .invoice-from,
        .invoice-to {
            padding-right: 20px
        }

        .invoice-date .date,
        .invoice-from strong,
        .invoice-to strong {
            font-size: 16px;
            font-weight: 600
        }

        .invoice-date {
            text-align: right;
            padding-left: 20px
        }

        .invoice-price {
            background: #f0f3f4;
            display: table;
            width: 100%
        }

        .invoice-price .invoice-price-left,
        .invoice-price .invoice-price-right {
            display: table-cell;
            padding: 20px;
            font-size: 20px;
            font-weight: 600;
            width: 75%;
            position: relative;
            vertical-align: middle
        }

        .invoice-price .invoice-price-left .sub-price {
            display: table-cell;
            vertical-align: middle;
            padding: 0 20px
        }

        .invoice-price small {
            font-size: 12px;
            font-weight: 400;
            display: block
        }

        .invoice-price .invoice-price-row {
            display: table;
            float: left
        }

        .invoice-price .invoice-price-right {
            width: 25%;
            background: #2d353c;
            color: #fff;
            font-size: 28px;
            text-align: right;
            vertical-align: bottom;
            font-weight: 300
        }

        .invoice-price .invoice-price-right small {
            display: block;
            opacity: .6;
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 12px
        }

        .invoice-footer {
            border-top: 1px solid #ddd;
            padding-top: 10px;
            font-size: 10px
        }

        .invoice-note {
            color: #999;
            margin-top: 80px;
            font-size: 85%
        }

        .invoice>div:not(.invoice-footer) {
            margin-bottom: 20px
        }

        .btn.btn-white,
        .btn.btn-white.disabled,
        .btn.btn-white.disabled:focus,
        .btn.btn-white.disabled:hover,
        .btn.btn-white[disabled],
        .btn.btn-white[disabled]:focus,
        .btn.btn-white[disabled]:hover {
            color: #2d353c;
            background: #fff;
            border-color: #d9dfe3;
        }

        .container {
            /* width: 100%; */
            /* padding-right: 15px; */
            /* padding-left: 15px; */
            /* margin-right: auto; */
            /* margin-left: auto; */
        }

        .container {
            max-width: none !important;
        }

        @media print {
            .noPrint {
                display: none;
            }
        }

        @page {
            size: A5
        }
    </style>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script type="text/javascript"></script>
</body>

</html>