@extends('user.layouts.app')

@section('title')
    greenguardexpress.lk | Order History
@endsection

@section('styles')
    <style>
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
    <!-- Main Container  -->
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            {{-- <li><a href="#">Account</a></li> --}}
            <li><a href="#">Order History</a></li>
        </ul>

        <div class="row">
            @include('user.layouts.profile_sidebar')
            <!--Middle Part Start-->
            <div id="content" class="col-sm-9">
                <h2 class="title">Order History</h2>
                <div class="table-responsive">

                    @if ($orders->isEmpty())
                        <p>Your have no previous order records. <a href="/products/all/all">Continue shopping</a></p>
                    @else
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td class="text-center">#Order ID</td>
                                    <td class="text-left">Request Date</td>
                                    <td class="text-left">Status</td>
                                    <td class="text-center">Total</td>
                                    <td class="text-center">Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)
                                    <tr id="tr_{{ $item->invoice_number }}">
                                        <td class="text-left"><a
                                                href="{{ route('user.order.view', $item->invoice_number) }}">#{{ $item->invoice_number }}</a>
                                        </td>
                                        <td class="text-center">{{ $item->created_at }}</td>
                                        <th>
                                        <th>
                                            @if ($item->status == 0)
                                                <div class="label-main">
                                                    <label class="label label-warning">Processing</label>
                                                </div>
                                            @elseif($item->status == 1)
                                                <div class="label-main">
                                                    <label class="label label-primary">Desptached</label>
                                                </div>
                                            @elseif($item->status == 2)
                                                <div class="label-main">
                                                    <label class="label label-danger">Canceled</label>
                                                </div>
                                            @elseif($item->status == 3)
                                                <div class="label-main">
                                                    <label class="label label-danger">Returned</label>
                                                </div>
                                            @elseif($item->status == 4)
                                                <div class="label-main">
                                                    <label class="label label-success">Completed</label>
                                                </div>
                                            @endif

                                        </th>
                                        </th>
                                        <td class="text-center">
                                            Rs.{{ number_format($item->total_amount, 2) }}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('user.order.view', $item->invoice_number) }}" title=""
                                                data-toggle="tooltip" type="button" class="btn btn-primary m-b-10"
                                                data-original-title="View Invoice"><i class="fa fa-eye"></i>
                                            </a>
                                            @if ($item->status == 0)
                                                <a class="btn btn-danger" onclick="cancelOrder({{ $item->invoice_number }})"
                                                    title="" data-toggle="tooltip" href="javascript:void(0)"
                                                    data-original-title="Cancel Order"><i
                                                        class="icon_{{ $item->id }} fa fa-times"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                    @endif

                    </tbody>
                    </table>
                </div>
            </div>

            <!--Middle Part End-->
            <!--Right Part Start -->
            <!--Right Part End -->
        </div>
    </div>
    <!-- //Main Container -->
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
                    url: "/orders/canceled/by/customer/" + order_id,
                    beforeSend: function() {
                        $("#loading-overlay").show();
                    },
                    type: "GET",
                    success: function(response, textStatus, xhr) {
                        // console.log(response);
                        if (xhr.status == 200) {
                            $("#loading-overlay").hide();
                            Toast.fire({
                                icon: 'success',
                                title: response.message
                            });
                            location.reload();
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
        }
    </script>
@endsection
