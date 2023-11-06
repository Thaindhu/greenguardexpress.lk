@extends('user.layouts.app')

@section('title')
Myproduct.lk | Order
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css" integrity="sha512-DIW4FkYTOxjCqRt7oS9BFO+nVOwDL4bzukDyDtMO7crjUZhwpyrWBFroq+IqRe6VnJkTpRAS6nhDvf0w+wHmxg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .alert-danger,
    .alert-success {
        display: inline-block;
        width: 100%;
        border-radius: 0;
    }

    .alert {
        border-radius: 0;
    }

    .alert-danger {
        color: #a94442;
        background-color: #f2dede;
        border-color: #ebccd1;
    }

    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
    }

    .alert-primary {
        color: #3c763d !important;
        background-color: #dff0d8;
        border-color: #d6e9c6;
    }

    .iziToast>.iziToast-body .iziToast-title {
        line-height: 30px !important;
    }
</style>
@endsection

@section('content')
<div class="main-container container">
    <ul class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Order Infomation</a></li>
    </ul>

    <div class="row text">
        <div class="container">
            <div class="row ms-progressbar" style="border-bottom:0;">
                <div class="col-xs-4 ms-progressbar-step complete">
                    <div class="text-center ms-progressbar-step-number">Cart
                    </div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="/cart" class="ms-progressbar-dot"></a>

                </div>

                <div class="col-xs-4 ms-progressbar-step complete">
                    <!-- complete -->
                    <div class="text-center ms-progressbar-step-number">Shipping</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="#" class="ms-progressbar-dot"></a>

                </div>

                {{-- <div class="col-xs-3 ms-progressbar-step disabled">
                        <!-- complete -->
                        <div class="text-center ms-progressbar-step-number">Payment</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="#" class="ms-progressbar-dot"></a>

                    </div> --}}

                <div class="col-xs-4 ms-progressbar-step complete">
                    <!-- active -->
                    <div class="text-center ms-progressbar-step-number">Complete</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="#" class="ms-progressbar-dot"></a>

                </div>
            </div>

        </div>
        <!--Middle Part Start-->
        <div id="content" class="col-sm-8 col-sm-offset-2">
            <h2 class="title">Order Information</h2>
            @if (!$order->is_verified && $order->payment_type == 'online')
            <div class="alert alert-danger icons-alert">
                <p><strong>Sorry!</strong> Sorry payment failed. Please try again.
                </p>
            </div>
            @else
            {{-- @if ($message = Session::get('success')) --}}

            {{-- <div class="alert alert-primary icons-alert">
                            <p><strong>Success!</strong> {{ $message }}
            </p>
        </div> --}}
        {{-- @endif --}}


        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <td colspan="2" class="text-left">Order Details</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="width: 50%;" class="text-left"> <b>Order ID:</b> #{{ $order->invoice_number }}
                        <br>
                        <b>Date Added:</b> {{ $order->created_at }}
                    </td>
                    <td style="width: 50%;" class="text-left"> <b>Payment Method:</b>
                        @if ($order->payment_type == 'cod')
                            Cash on Delivery
                        @elseif ($order->payment_type == 'bank_pay')
                            Bank Transfer
                        @elseif ($order->payment_type == 'online')
                            VISA / Master
                        @elseif ($order->payment_type == 'Mintpay')
                            Mintpay
                        @endif
                        <br>
                        <b>Delivery Method:</b>
                        @if ($order->deliver_type == 'delivery')
                            Home Delivery
                        @elseif ($order->deliver_type == 'pickup')
                            Store Pickup
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <td style="width: 50%; vertical-align: top;" class="text-left">Payment Address</td>
                    <td style="width: 50%; vertical-align: top;" class="text-left">Shipping Address</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-left">
                        {{ $order->first_name }} {{ $order->last_name }}, <br>
                        {{ $order->address_1 }},<br>{{ $order->address_2 }},
                        {{ $order->loc_name }},<br>{{ $order->postal_code }}
                    </td>
                    <td class="text-left">{{ $order->first_name }} {{ $order->last_name }},<br>
                        {{ $order->address_1 }},<br>{{ $order->address_2 }},
                        {{ $order->loc_name }},<br>{{ $order->postal_code }}
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <td class="text-left">Product Name</td>
                        <td class="text-left">Brand</td>
                        <td class="text-right">Quantity</td>
                        <td class="text-right">Price</td>
                        <td class="text-right">Total</td>
                        <td style="width: 20px;"></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order_details as $item)
                    <tr>
                        @php
                        $varies = json_decode($item->variations);
                        @endphp
                        <td class="text-left">{{ $item->title }}
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
                        <td class="text-left"></td>
                        <td class="text-right">{{ $item->qty }}</td>
                        <td class="text-right">Rs.{{ number_format($item->unit_price, 2) }}</td>
                        <td class="text-right">Rs.{{ number_format($item->total_amount, 2) }}</td>
                        <td style="white-space: nowrap;" class="text-right"> <a class="btn btn-primary" title="" data-toggle="tooltip" href="{{ route('user.view.product', [$item->product_id, $item->metaname]) }}" data-original-title="Reorder"><i class="fa fa-shopping-cart"></i></a>
                            {{-- <a class="btn btn-danger" title="" data-toggle="tooltip" href="return.html"
                                data-original-title="Return"><i class="fa fa-reply"></i></a> --}}
                        </td>
                    </tr>
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3"></td>
                        <td class="text-right"><b>Sub-Total</b>
                        </td>
                        <td class="text-right">Rs.{{ number_format($order->total_amount, 2) }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td class="text-right"><b>Shipping Charges</b>
                        </td>
                        <td class="text-right">Rs.{{ number_format($diliveryFree, 2) }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td class="text-right"><b>Total</b>
                        </td>
                        <td class="text-right">
                            Rs.{{ number_format($order->total_amount + $diliveryFree, 2) }}</td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <h3>Order Status</h3>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <td class="text-left">Date Added</td>
                    <td class="text-left">Status</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-left">{{ $order->created_at }}</td>
                    <td class="text-left">Processing</td>
                </tr>
                <tr>
                    <td class="text-left">Pending</td>
                    <td class="text-left">Shipped</td>
                </tr>
                <tr>
                    <td class="text-left">Pending</td>
                    <td class="text-left">Complete</td>
                </tr>
            </tbody>
        </table>
        {{-- <div class="buttons clearfix">
                <div class="pull-right"><a class="btn btn-primary" href="#">Continue</a>
                </div>
            </div> --}}
        @endif



    </div>
</div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js" integrity="sha512-OmBbzhZ6lgh87tQFDVBHtwfi6MS9raGmNvUNTjDIBb/cgv707v9OuBVpsN6tVVTLOehRFns+o14Nd0/If0lE/A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var msg = "{{ Session::get('success') }}";
    if (msg) {
        iziToast.success({
            title: "Success",
            message: msg,
            position: "bottomRight",
            timeout: 4000,
        });
    }
</script>
@endsection