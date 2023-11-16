@extends('admin.layouts.master')

@section('title')
Order | {{ $order->invoice_number }}
@endsection

@section('styles')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">

                <!-- Page body start -->
                <div class="page-body">
                    <!-- Container-fluid starts -->
                    <div class="container">
                        <!-- Main content starts -->
                        <div>
                            <div class="row text--right">
                                <div class="col-sm-12 invoice-btn-group text--right">
                                    {{-- @if (!$qo_master->is_approved && !$ex_date->isPast())
                                    <button type="button" id="btnApprove"
                                        class="btn btn-success waves-effect m-b-10 btn-sm waves-light m-r-5">Approve
                                        Quotation</button>
                                    @endif --}}
                                    {{-- <a target="_black" href="/quote/print"> <button type="button" id="printButton"
                                                class="btn btn-primary btn-print-invoice m-b-10 btn-sm waves-effect waves-light m-r-5">Print</button></a> --}}
                                    {{-- <a href="/po-list"> --}}
                                    <div class="dropdown-inverse dropdown open">
                                        <button class="btn btn-inverse dropdown-toggle waves-effect waves-light " type="button" id="dropdown-7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Options</button>
                                        <div class="dropdown-menu" aria-labelledby="dropdown-7" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 39px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            @if ($order->status == 0)
                                            <a disabled class="dropdown-item waves-light waves-effect" onclick="changeOrderStatus({{ $order->id }} , 'despatched')" href="javascript:void(0)"><i class=" icofont icofont-edit"></i>Mark
                                                as
                                                Despatched</a>
                                            @endif
                                            @if ($order->status == 0 || $order->status == 1)
                                            <a class="dropdown-item waves-light waves-effect" onclick="changeOrderStatus({{ $order->id }} , 'canceled')" href="javascript:void(0)"><i class=" icofont icofont-edit"></i>Mark
                                                as
                                                canceled by customer</a>
                                            @endif
                                            @if ($order->status == 1)
                                            <a class="dropdown-item waves-light waves-effect" onclick="changeOrderStatus({{ $order->id }} , 'returned')" href="javascript:void(0)"><i class="icofont icofont-notepad"></i>Mark
                                                as Returned</a>
                                            @endif

                                            @if ($order->status == 1)
                                            <a class="dropdown-item waves-light waves-effect" onclick="changeOrderStatus({{ $order->id }} , 'completed')" href="javascript:void(0)"><i class="icofont icofont-notepad"></i>Mark as
                                                Completed</a>
                                            @endif
                                        </div>
                                    </div>


                                    <button type="button" id="btn-cancel" class="btn btn-danger waves-effect m-b-10 btn-sm waves-light">Cancel</button>
                                    {{-- </a> --}}
                                </div>
                            </div>
                            <!-- Invoice card start -->
                            <div class="card">
                                <div class="row invoice-contact">
                                    <div class="col-md-8">
                                        <div class="invoice-box row">
                                            <div class="col-sm-12">
                                                <table class="table table-responsive invoice-table table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td><img width="250px" src="{{ url('/assets-front/image/demo/logos/theme_logo.png') }}" class="m-b-10" alt="">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>greenguardexpress.lk</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                New supper market, Uragasmanhandiya.</td>
                                                        </tr>
                                                        <tr>
                                                            <td>info@Greenguardexpress.lk</td>
                                                        </tr>
                                                        <tr>
                                                            <td> 0777 749 800 /0752 800 800</td>
                                                        </tr>
                                                        <!-- <tr>
                                                                                                                                                                                                                                                                                <td><a href="#" target="_blank">www.demo.com</a>
                                                                                                                                                                                                                                                                                </td>
                                                                                                                                                                                                                                                                            </tr> -->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="row invoive-info">
                                        <div class="col-md-4 col-xs-12 invoice-client-info">
                                            <h6>Shipping Address :</h6>
                                            <h6 class="m-0" id="order_name">{{ $order->first_name }} {{ $order->last_name }}</h6>
                                            <p class="m-0 m-t-10" id="order_address">{{ $order->address_1 }},<br>{{ $order->address_2 }},
                                                {{ $order->loc_name }},<br>{{ $order->postal_code }}
                                            </p>
                                            <p class="m-0" id="order_mobile">{{ $order->mobile_number }}</p>
                                            <p>
                                                {{ $order->email }}
                                            </p>
                                        </div>
                                        <input type="hidden" id="order_city" value="{{$order->loc_name}}" />
                                        <input type="hidden" id="order_amount_total" value="{{$order->total_amount + $order->delivery_amount}}" />
                                        <div class="col-md-4 col-sm-6">
                                            <h6>Order Information :</h6>
                                            <table class="table table-responsive invoice-table invoice-order table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <th>Date :</th>
                                                        <td>{{ $order->created_at }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Status :</th>
                                                        <td>
                                                            <span id="status_lbl" class="label label-warning">
                                                                {{ $order->status == 0 ? 'Processing' : null }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Order ID :</th>
                                                        <td>
                                                            #{{ $order->invoice_number }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Payment Method: </th>
                                                        <td>
                                                            @if ($order->payment_type == 'cod')
                                                            Cash on Delivery
                                                            @elseif ($order->payment_type == 'bank_pay')
                                                            Bank Transfer <br>
                                                            <a target="_blank" href="{{ $order->slip_path }}">View
                                                                Transfer Note</a>
                                                            @elseif ($order->payment_type == 'online')
                                                            VISA / Master
                                                            @else
                                                            {{ $order->payment_type }}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Delivery Method: </th>
                                                        <td>
                                                            @if ($order->deliver_type == 'delivery')
                                                            Home Delivery
                                                            @elseif ($order->deliver_type == 'pickup')
                                                            Store Pickup
                                                            @endif
                                                        </td>
                                                    </tr>


                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <h6 class="m-b-20">Invoice Number
                                                <span>#{{ $order->invoice_number }}</span>
                                            </h6>
                                            <h6 class="text-uppercase text-primary">Total :
                                                <span>Rs.{{ number_format($order->total_amount + $order->delivery_amount, 2) }}</span>
                                            </h6>
                                        </div>
                                        <!-- <div class="col-md-4 col-sm-6">
                                            <tr>
                                                <th>Tracking ID: </th>
                                                <td>
                                                    <input type="text" id="tracking_id" data-parsley-required value="{{ $order->delivery_number }}">
                                                </td>
                                            </tr>
                                        </div> -->
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table  invoice-detail-table">
                                                    <thead>
                                                        <tr class="thead-default">
                                                            <th>Product</th>
                                                            <th>Image</th>
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
                                                            <td><img src="{{ $item->image1_path }}" width="20%" alt=""></td>
                                                            <td>{{ $item->qty }}</td>
                                                            <td>Rs.{{ number_format($item->unit_price, 2) }}</td>
                                                            <td>Rs.{{ number_format($item->total_amount, 2) }}</td>
                                                        </tr>
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-responsive invoice-table invoice-total">
                                                <tbody>
                                                    <tr>
                                                        <th>Sub Total :</th>
                                                        <td>Rs.{{ number_format($order->total_amount, 2) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Delivery Charges :</th>
                                                        <td>Rs.{{ number_format($order->delivery_amount, 2) }}</td>
                                                    </tr>
                                                    <tr class="text-info">
                                                        <td>
                                                            <hr>
                                                            <h5 class="text-primary">Total :</h5>
                                                        </td>
                                                        <td>
                                                            <hr>
                                                            <h5 class="text-primary">
                                                                Rs.{{ number_format($order->total_amount + $order->delivery_amount, 2) }}
                                                            </h5>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h6>Customer Note :</h6>
                                            <p>{{ $order->remark }} </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Container ends -->
                </div>
                <!-- Page body end -->
            </div>
        </div>
        <!-- Warning Section Starts -->

        <div id="styleSelector">

        </div>
    </div>
</div>
</div>
@endsection


@section('scripts')
{{-- sweet alerts --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript" src="{{ asset('files\assets\pages\advance-elements\moment-with-locales.min.js') }}">
</script>
<script type="text/javascript" src="{{ asset('files\custom\parsley\parsley.js') }}"></script>
<script type="text/javascript" src="{{ asset('files\custom\parsley\parsley.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<script>
    // console.log()
    // $('#pre-load-div').show();
    change_status({{$order->status}});

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

    function changeOrderStatus(id, type) {
        Swal.fire({
            title: 'Do you want to save the changes?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: `Approve`,
            denyButtonText: `Don't Approve`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                // if (type == 'despatched' || type == 'canceled') {
                    // if ($("#tracking_id").parsley().validate() !== true) return;
                    MarkAsArrpoved(id, type);
                // }

            } else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'info')
            }
        })
        $("#pre-load-div").show();
        // console.log(rowObject)
        function MarkAsArrpoved(id, type) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/admin/orders/ajax/change-status",
                type: "POST",
                data: {
                    order_id: id,
                    type: type,
                    order_name: $("#order_name").html().trim(),
                    order_address: $("#order_address").html().trim(),
                    order_mobile: $("#order_mobile").html().trim(),
                    order_city: $("#order_city").val().trim(),
                    order_amount_total: $("#order_amount_total").val().trim(),
                },
                success: function(response, textStatus, xhr) {
                    // console.log(response);
                    if (xhr.status == 200) {

                        change_status(response.is_active);
                        Toast.fire({
                            icon: 'success',
                            title: response.type
                        });
                        location.reload();
                    } else if (xhr.status == 201) {
                        $("#pre-load-div").hide();
                        Toast.fire({
                            icon: 'error',
                            title: response.error
                        });
                    }
                },
                error: function(response) {
                    // $("#pre-load-div").hide();
                    // $('#status_lbl').removeClass("label-warning");
                    // $('#status_lbl').addClass("label-success");
                    // $('#status_lbl').text('Approved');
                    $("#pre-load-div").hide();
                }

            });
        }
    }

    function change_status(is_active) {
        // console.log(is_active);
        switch (is_active) {
            case 0 || '0':
                $('#status_lbl').removeClass();
                $('#status_lbl').addClass("label label-warning");
                $('#status_lbl').text("Processing");
                break;
            case 1 || '1':
                $('#status_lbl').removeClass();
                $('#status_lbl').addClass("label label-primary");
                $('#status_lbl').text("Despatched");
                break;
            case 2 || '2':
                $('#status_lbl').removeClass();
                $('#status_lbl').addClass("label label-danger");
                $('#status_lbl').text("Canceled by Customer");
                break;
            case 3 || '3':
                $('#status_lbl').removeClass();
                $('#status_lbl').addClass("label label-danger");
                $('#status_lbl').text("Returned");
                break;
            case 4 || '4':
                $('#status_lbl').removeClass();
                $('#status_lbl').addClass("label label-success");
                $('#status_lbl').text("Completed");
                break;

            default:
                break;
        }
        // $('#status_lbl').removeClass("label-warning");
        // $('#status_lbl').addClass("label-success");
        // $('#status_lbl').text('Approved');
        // $("#pre-load-div").hide();
    }

    $('#btn-cancel').click(function(e) {
        window.history.back();
    });
</script>
@endsection