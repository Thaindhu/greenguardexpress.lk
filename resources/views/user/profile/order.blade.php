@extends('user.layouts.app')

@section('title')
    Myproduct.lk | Order
@endsection

@section('styles')
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

        #loading-overlay {
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            display: none;
            align-items: center;
            background-color: #000;
            z-index: 999;
            opacity: 0.5;
        }

        .loading-icon {
            position: absolute;
            border-top: 2px solid #fff;
            border-right: 2px solid #fff;
            border-bottom: 2px solid #fff;
            border-left: 2px solid #767676;
            border-radius: 25px;
            width: 25px;
            height: 25px;
            margin: 0 auto;
            position: absolute;
            left: 50%;
            margin-left: -20px;
            top: 50%;
            margin-top: -20px;
            z-index: 4;
            -webkit-animation: spin 1s linear infinite;
            -moz-animation: spin 1s linear infinite;
            animation: spin 1s linear infinite;
        }

        @-moz-keyframes spin {
            100% {
                -moz-transform: rotate(360deg);
            }
        }

        @-webkit-keyframes spin {
            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
    </style>
@endsection

@section('content')
    <div id="loading-overlay">
        <div class="loading-icon"></div>
    </div>
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li><a href="#">Order Infomation</a></li>
        </ul>

        <div class="row">
            <!--Middle Part Start-->
            <div id="content" class="col-sm-9">
                <h2 class="title">Order Information</h2>
                @if ($message = Session::get('success'))
                    <div class="alert alert-primary icons-alert">
                        <p><strong>Success!</strong> {{ $message }}
                        </p>
                    </div>
                @endif
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
                                @endif
                                <br>
                                <b>Delivery Method:</b>
                                @if ($order->deliver_type == 'delivery')
                                    Home Delivery
                                @elseif ($order->deliver_type == 'pickup')
                                    Store Pickup
                                @endif
                                <br>
                                <b>Order Status:</b>
                                @if ($order->status == 0)
                                    <label class="label label-warning">Processing</label>
                                @elseif($order->status == 1)
                                    <label class="label label-primary">Desptached</label>
                                @elseif($order->status == 2)
                                    <label class="label label-danger">Canceled</label>
                                @elseif($order->status == 3)
                                    <label class="label label-danger">Returned</label>
                                @elseif($order->status == 4)
                                    <label class="label label-success">Completed</label>
                                @endif
                                <br>
                                <b>Tracking ID:</b>
                                {{ $order->delivery_number ? $order->delivery_number : 'n/a' }} <br>
                                @if ($order->delivery_number)
                                    <a target="_blank" href="https://fardardomestic.com/">Click Here to Track</a>
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
                                                        {{ $vr->value }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </td>
                                    <td class="text-left"></td>
                                    <td class="text-right">{{ $item->qty }}</td>
                                    <td class="text-right">Rs.{{ number_format($item->unit_price, 2) }}</td>
                                    <td class="text-right">Rs.{{ number_format($item->total_amount, 2) }}</td>
                                    <td style="white-space: nowrap;" class="text-right"> <a class="btn btn-primary"
                                            title="" data-toggle="tooltip"
                                            href="{{ route('user.view.product', [$item->product_id, $item->metaname]) }}"
                                            data-original-title="Reorder"><i class="fa fa-shopping-cart"></i></a>
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
                                <td class="text-right">Rs.{{ number_format($order->delivery_amount, 2) }}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td class="text-right"><b>Total</b>
                                </td>
                                <td class="text-right">
                                    Rs.{{ number_format($order->total_amount + $order->delivery_amount, 2) }}</td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <h3>Order Status</h3>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <td class="text-left">Date</td>
                            <td class="text-left">Status</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-left">Processing</td>
                            <td class="text-left">{{ $order->created_at }}</td>

                        </tr>
                        <tr>
                            <td class="text-left">Shipped</td>
                            <td class="text-left">{{ $order->shipped_date ? $order->shipped_date : 'Pending' }}</td>

                        </tr>
                        @if ($order->status == 3)
                            <tr>
                                <td class="text-left">Returned</td>
                                <td class="text-left">{{ $order->returned_date }}</td>
                            </tr>
                        @endif
                        @if ($order->status == 2)
                            <tr>
                                <td class="text-left">Canceled by Customer</td>
                                <td class="text-left">{{ $order->canceled_date }}</td>
                            </tr>
                        @endif
                        <tr>
                            <td class="text-left">Order Completed</td>
                            <td class="text-left">{{ $order->completed_date ? $order->completed_date : 'Pending' }}</td>
                        </tr>
                    </tbody>
                </table>
                @if ($order->status == 0 && !Auth::user())
                    <div class="buttons clearfix">
                        <div class="pull-right"><a class="btn btn-danger" onclick="cancelOrder({{ $order->id }})"
                                href="#">Cancel Order</a>
                        </div>
                    </div>
                @endif



            </div>
            <!--Middle Part End-->
            <!--Right Part Start -->
            @include('user.layouts.profile_sidebar')
            <!--Right Part End -->
        </div>
    </div>
@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        function cancelOrder(order_id) {
            // console.log(order_id);
            Swal.fire({
                title: 'Do you want to cancel this Order?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: `Yes, Please.`,
                denyButtonText: `No, Don't`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    canceled(order_id);
                } else if (result.isDenied) {
                    // Swal.fire('Changes are not saved', '', 'info')
                }
            })

            function canceled(order_id) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "/order/guest/cancel/otp/" + order_id,
                    beforeSend: function() {
                        $("#loading-overlay").show();
                    },
                    type: "GET",
                    success: function(response, textStatus, xhr) {
                        $("#loading-overlay").hide();
                        console.log(response);
                        if (xhr.status == 200) {
                            confirm_cancel(response.message, order_id);
                        } else if (xhr.status == 201) {
                            $("#loading-overlay").hide();
                            Toast.fire({
                                icon: 'error',
                                title: response.error
                            });
                        }
                    },
                    error: function(response) {
                        $("#loading-overlay").hide();
                    }

                });
            }


            async function confirm_cancel(msg, order_id) {
                Swal.fire({
                    title: msg,
                    input: 'number',
                    inputAttributes: {
                        autocapitalize: 'off'
                    },
                    showCancelButton: true,
                    confirmButtonText: 'Confirm',
                    showLoaderOnConfirm: true,
                    preConfirm: (otp) => {
                        if (!otp) {
                            Swal.showValidationMessage(
                                `OTP is Required:`
                            );
                        } else {
                            return $.ajax({
                                url: "/order/guest/cancel/confirm/" + order_id + "/" + otp,
                                method: "GET",
                                success: function(response, textStatus, xhr) {
                                    if (response.status == false) {
                                        Swal.showValidationMessage(
                                            response.err_msg
                                        );
                                    } else {
                                        return response;
                                    }
                                    console.log(response);
                                },
                                error: function(response) {
                                    return response;
                                }
                            });
                        }
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                }).then((result) => {
                    location.reload();
                    Swal.fire(
                        'Done',
                        'Order cancelled',
                        'success'
                    )
                })
            }
        }
    </script>
@endsection
