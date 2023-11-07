@extends('user.layouts.app')

@section('title')
greenguardexpress.lk | Checkout | Payment
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css" integrity="sha512-DIW4FkYTOxjCqRt7oS9BFO+nVOwDL4bzukDyDtMO7crjUZhwpyrWBFroq+IqRe6VnJkTpRAS6nhDvf0w+wHmxg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

    .plans .plan {
        cursor: pointer;
        width: 100%;
    }

    .plans .plan input[type="radio"]:checked+.plan-content:after {
        top: 12px;
        right: 12px;
    }

    .iziToast>.iziToast-body .iziToast-title {
        line-height: 30px;
    }
</style>
@endsection

@section('content')

<div class="main-container container">
    <ul class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Checkout</a></li>
        <li><a href="#">Payment Method</a></li>

    </ul>
    <div class="row">
        <div class="container">
            <div class="row ms-progressbar" style="border-bottom:0;">
                <div class="col-xs-3 ms-progressbar-step complete">
                    <div class="text-center ms-progressbar-step-number">Cart
                    </div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="/cart" class="ms-progressbar-dot"></a>

                </div>

                <div class="col-xs-3 ms-progressbar-step complete">
                    <!-- complete -->
                    <div class="text-center ms-progressbar-step-number">Shipping</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="#" class="ms-progressbar-dot"></a>

                </div>

                <div class="col-xs-3 ms-progressbar-step active">
                    <!-- complete -->
                    <div class="text-center ms-progressbar-step-number">Payment</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="#" class="ms-progressbar-dot"></a>

                </div>

                <div class="col-xs-3 ms-progressbar-step disabled">
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
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('user.order.payment.update') }}" method="post" id="form" enctype="multipart/form-data">
            @csrf
            <input type="text" value="{{ $order->invoice_number }}" readonly required hidden name="order_id">

            <div id="content" class="col-sm-8">
                {{-- <h2 class="title">Payment Method</h2> --}}
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        {{-- <div class="panel-heading">
                                <h4 class="panel-title"><i class="fa fa-sign-in"></i> Payment Method
                                </h4>
                            </div> --}}
                        <div class="panel-body">
                            <div class="row">
                                {{-- <p>Please select the preferred payment method to use on this order.</p> --}}
                                <div class="col-sm-12">
                                    <div class="plans">
                                        <div class="title">Please select the preferred payment method to use on this
                                            order.</div>

                                        <label class="plan basic-plan" for="online">
                                            <input type="radio" onclick="payment_method_change()" name="payment_method" id="online" value="online" data-value1="{{ $order->id }}" data-value2="{{ $order->invoice_number }}"/>
                                            <div class="plan-content">
                                                <div class="row">
                                                    <div class="col-sm-5 text-center">
                                                        <img loading="lazy" {{-- width="200" --}} src="{{ asset('assets-front/image/payhere.png') }}" alt="" />

                                                    </div>
                                                    <div class="col-sm-7">
                                                        <div class="plan-details">
                                                            <span><b>ක්‍රෙඩිට් කාර්ඩ් ගෙවීම්</b></span>
                                                            <p>(Visa, Master and Amex **Bank Charge Apply)</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>

                                        <!-- <label class="plan basic-plan" for="mintpay">
                                            <input type="radio" name="payment_method" id="mintpay" value="mintpay" disabled />
                                            <a href="/order/payment/mintpay/{{ $order->id }}/{{ $order->invoice_number }}/{{$order->delivery_amount}}">
                                                <div class="plan-content">
                                                    <div class="row">
                                                        <div class="col-sm-5 text-center">
                                                            <img loading="lazy" style="width: 85%;" src="{{ asset('assets-front/image/Secondary-Badge.png') }}" alt="" />
                                                        </div>
                                                        <div class="col-sm-7">
                                                            <div class="plan-details">
                                                                <span><b>Mint Pay - Buy Now, Pay Later</b></span>
                                                                <p>(Pay for it in 3 installments over a period of 2 months at 0% interest)</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </label> -->

                                        <label class="plan basic-plan" for="koko">
                                            <input type="radio" name="payment_method" id="koko" value="koko" disabled />
                                            <a href="/order/payment/koko/{{ $order->id }}/{{ $order->invoice_number }}/{{$order->delivery_amount}}">
                                                <div class="plan-content">
                                                    <div class="row">
                                                        <div class="col-sm-5 text-center">
                                                            <img loading="lazy" {{-- width="200" --}} src="{{ asset('assets-front/image/koko.png') }}" alt="" />
                                                        </div>
                                                        <div class="col-sm-7">
                                                            <div class="plan-details">
                                                                <span><b> Koko: Buy Now Pay Later</b></span>
                                                                <p>(Pay in 3 interest-free installments with KOKO)</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </label>

                                        <label class="plan complete-plan" for="cod">
                                            <input checked type="radio" onclick="payment_method_change()" id="cod" name="payment_method" value="cod" />
                                            <div class="plan-content">
                                                <div class="row">
                                                    <div class="col-sm-5 text-center">
                                                        <img loading="lazy" {{-- width="200" --}} src="{{ asset('assets-front/image/cod.png') }}" alt="" />

                                                    </div>
                                                    <div class="col-sm-7">
                                                        <div class="plan-details">
                                                            <span><b>Cash on Delivery</b></span>
                                                            <p>(payment for the order is collected when the products are
                                                                delivered)</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>

                                        <label class="plan complete-plan" for="bank_pay">
                                            <input type="radio" onclick="payment_method_change()" id="bank_pay" name="payment_method" value="bank_pay" />
                                            <div class="plan-content">
                                                <div class="row">
                                                    <div class="col-sm-5 text-center">
                                                        <img loading="lazy" src="{{ asset('assets-front/image/deposit.png') }}" alt="" />
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <div class="plan-details">
                                                            <span><b>Bank Deposits</b></span>
                                                            <p>(You can deposit money to our bank account and upload the
                                                                slip)</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>

                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group required upload-file">
                                        <hr>
                                        <p><b>Bank:</b> Commercial Bank</p>
                                        <p><b>Account Name:</b> greenguardexpress.lk</p>
                                        <p><b>Account No:</b> 1000 569 658</p>
                                        <label for="input-payment-telephone" class="control-label">Upload Slip/
                                            Payment
                                            Verification</label>
                                        <input type="file" class="form-control" placeholder="Upload Slip" value="" id="slip" name="slip">
                                    </div>
                                </div>


                            </div>

                        </div>

                    </div>

                    <div class="">
                        <div class="buttons pull-left">
                            <div class=" m-t-20">I have read and agree to the <a href="{{ route('pages.terms') }}" class="agree"><b>Terms &
                                        Conditions</b></a>
                                <input class="box-checkbox" type="checkbox" data-parsley-mincheck="1" required name="agree" value="1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="content" class="col-sm-4">
                <h2 class="title">Summery</h2>
                <div class="">
                    <table class="table table-xs">
                        <tr>
                            <th class="text-left">Description</th>
                            <th class="text-right">Total</th>
                            {{-- <th></th> --}}
                        </tr>
                        @if ($order_details)
                        @foreach ($order_details as $item)
                        <tr class="item-row">
                            <td>
                                <p>{{ $item->product_name }}</p>
                            </td>
                            <td class="text-right" title="Total">
                                {{ number_format($item->unit_price * $item->qty, 2) }}
                            </td>
                        </tr>
                        @endforeach
                        @endif

                    </table>
                </div>
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-2">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td class="text-right">
                                        <strong>Sub-Total:</strong>
                                    </td>
                                    <td class="text-right">Rs.{{ number_format($order->total_amount, 2) }}</td>
                                </tr>
                                <tr>
                                    <td class="text-right">
                                        <strong>Shipping Rate:</strong>
                                    </td>
                                    <td class="text-right">Rs.<span id="delivery_rate">{{ $diliveryFree }}</span></td>
                                </tr>
                                <tr>
                                    <td class="text-right">
                                        <strong>Total:</strong>
                                    </td>
                                    <td class="text-right">Rs. <span id="final_total">{{ number_format($diliveryFree + $order->total_amount, 2) }}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div id="content" class="col-sm-8">
                <div class="buttons">
                    <div class="pull-left"><a href="/products/all/all" class="btn btn-primary">Back to shipping</a>
                    </div>
                    <div class="pull-right">
                        <button type="submit" id="btn-order" class="btn btn-primary">Complete order</button>
                    </div>
                </div>
            </div>
        </form>
        <!--Middle Part End -->

    </div>
</div>
@endsection

@section('scripts')
<script>
    const order = @json($order);
</script>
<script type="text/javascript" src="{{ asset('files\custom\parsley\parsley.js') }}"></script>
<script type="text/javascript" src="{{ asset('files\custom\parsley\parsley.min.js') }}"></script>
<script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
<script type="text/javascript" src="{{ asset('assets-front\custom\order.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js" integrity="sha512-OmBbzhZ6lgh87tQFDVBHtwfi6MS9raGmNvUNTjDIBb/cgv707v9OuBVpsN6tVVTLOehRFns+o14Nd0/If0lE/A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection