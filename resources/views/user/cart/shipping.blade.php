@extends('user.layouts.app')

@section('title')
    greenguardexpress.lk | Checkout | Shipping Details
@endsection

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i></a></li>
            <li><a href="#">Checkout</a></li>
            <li><a href="#">Shipping</a></li>

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

                    <div class="col-xs-3 ms-progressbar-step active">
                        <!-- complete -->
                        <div class="text-center ms-progressbar-step-number">Shipping</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="#" class="ms-progressbar-dot"></a>

                    </div>

                    <div class="col-xs-3 ms-progressbar-step disabled">
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
            @if ($message = Session::get('success'))
                <div class="alert alert-primary icons-alert">
                    <p><strong>Success!</strong> {{ $message }}
                    </p>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-danger icons-alert">
                    <p><strong>Sorry!</strong> {{ $message }}
                    </p>
                </div>
            @endif
            @if (!empty($error))
                <div class="alert alert-danger"> {{ $error }}</div>
            @endif
            <form action="{{ route('user.order.store') }}" method="post" id="form" enctype='multipart/form-data'>
                <div id="content" class="col-sm-10 col-sm-offset-1">
                    <h2 class="title">Shipping Info</h2>

                    @csrf
                    <div class="so-onepagecheckout ">
                        {{-- <div class="col-left {{ !$user ? 'col-sm-12' : 'col-sm-6' }}">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><i class="fa fa-credit-card" aria-hidden="true"></i> Payment
                                        Method
                                    </h4>
                                </div>
                                <div class="panel-body">
                                    <p>Please select the preferred Payment method to use on this order.</p>
                                    <div class="radio">
                                        <label class="m-r-20" onclick="payment_method()">
                                            <input type="radio" onclick="payment_method()" value="cod"
                                                checked="checked" name="payment_method">Cash
                                            On Delivery</label>
                                        <label onclick="payment_method()">
                                            <input type="radio" onclick="payment_method()" value="bank_pay"
                                                name="payment_method">Bank
                                            Deposit</label>
                                        </label>
                                    </div>
                                    <div class="form-group required upload-file">
                                        <label for="input-payment-telephone" class="control-label">Upload Slip/ Payment
                                            Verification</label>
                                        <input type="file" class="form-control" placeholder="Upload Slip"
                                            value="" id="slip" name="slip">
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-left col-sm-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group required">
                                                <label for="input-payment-firstname" class="control-label">First
                                                    Name</label>
                                                <input type="text" data-parsley-required class="form-control"
                                                    id="input-payment-firstname" placeholder="First Name"
                                                    value="{{ $user ? $user->first_name : null }}" name="first_name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group required">
                                                <label for="input-payment-lastname" class="control-label">Last Name</label>
                                                <input type="text" class="form-control" data-parsley-required
                                                    id="input-payment-lastname" placeholder="Last Name"
                                                    value="{{ $user ? $user->last_name : null }}" name="last_name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group required">
                                                <label for="input-payment-telephone" class="control-label">Mobile
                                                    Number</label>
                                                <input type="text" class="form-control" id="input-payment-telephone"
                                                    placeholder="Telephone" data-parsley-required
                                                    value="{{ $user ? $user->mobile_number : null }}" name="mobile_number">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="input-payment-email" class="control-label">E-Mail
                                                    (optional)</label>
                                                <input type="text" class="form-control" id="input-payment-email"
                                                    placeholder="E-Mail" value="{{ $user ? $user->email : null }}"
                                                    name="email">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group required">
                                                <label for="input-payment-address-1" class="control-label">Address</label>
                                                <input type="text" class="form-control" id="input-payment-address-1"
                                                    placeholder="Address" data-parsley-required
                                                    value="{{ $user ? $user->address_1 . ' ' . $user->address_2 : null }}"
                                                    name="address_1">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group required">
                                                <label for="input-payment-city" class="control-label">City</label>
                                                <select class="form-control js-example-basic-single city-id"
                                                    data-parsley-required id="input-payment-zone" name="city_id">
                                                    <option value=""> --- Please Select --- </option>
                                                    @foreach ($cities as $item)
                                                        <option
                                                            {{ $user && $user->city_id == $item->loc_id ? 'selected' : null }}
                                                            value="{{ $item->loc_id }}">{{ $item->loc_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <input type="text" hidden id="input-payment-postcode"
                                                    placeholder="Post Code"
                                                    value="{{ $user ? $user->postal_code : null }}" name="postal_code">
                                        {{-- <div class="col-sm-6">
                                            <div class="form-group required">
                                                <label for="input-payment-postcode" class="control-label">Post Code
                                                    (optional)</label>
                                                
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-left col-sm-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <p>Please select the preferred delivery method to use on this order.</p>
                                    <div class="plans text-center">
                                        <label class="plan basic-plan" for="basic">
                                            <input checked type="radio" value="delivery" name="deliver_type"
                                                id="basic" />
                                            <div class="plan-content">
                                                <div class="plan-details">
                                                    <span>Home Delivery</span>
                                                </div>
                                            </div>
                                        </label>

                                        <label class="plan complete-plan" for="complete">
                                            <input type="radio" value="pickup" id="complete" name="deliver_type" />
                                            <div class="plan-content">
                                                <div class="plan-details">
                                                    <span>Store Pickup</span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    {{-- <div class="radio">
                                        <label class="m-r-20">
                                            <input type="radio" value="delivery" checked="checked"
                                                name="deliver_type">Home Delivery</label>
                                        <label>
                                            <input type="radio" value="pickup" name="deliver_type">Store
                                            Pickup</label>
                                        </label>
                                    </div> --}}
                                </div>
                                <input type="text" hidden name="delivery_charge" required id="delivery_charge" readonly>
                            </div>
                        </div>

                    </div>
                </div>
                @php
                    // $cart = Session::get('cart') ? Session::get('cart') : [];
                    $total = 0;
                    if ($cart) {
                        foreach ($cart as &$el) {
                            $total += $el['price'] * $el['qty'];
                        }
                    }
                @endphp
                {{-- <div id="content" class="col-sm-4">
                    <h2 class="title">Summery</h2>
                    <div class="">
                        <table class="table table-xs">
                            <tr>
                                <th class="text-left">Description</th>
                                <th class="text-right">Total</th>
                            </tr>
                            @if ($cart)
                                @foreach ($cart as $item)
                                    <tr class="item-row">
                                        <td>
                                            <p>{{ $item['product_name'] }}</p>
                                        </td>
                                        <td class="text-right" title="Total">
                                            {{ number_format($item['price'] * $item['qty'], 2) }}
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
                                        <td class="text-right">Rs.{{ number_format($total, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">
                                            <strong>Shipping Rate:</strong>
                                        </td>
                                        <td class="text-right">Rs.<span id="delivery_rate">0.00</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">
                                            <strong>Total:</strong>
                                        </td>
                                        <td class="text-right">Rs. <span
                                                id="final_total">{{ number_format($total, 2) }}</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> --}}
                <div id="content" class="col-sm-10 col-sm-offset-1">
                    <div class="buttons">
                        <div class="pull-left"><a href="/products/all/all" class="btn btn-primary"><i
                                    class="fa fa-angle-left" aria-hidden="true"></i> Back to cart</a>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary">Continue <i class="fa fa-angle-right"
                                    aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </form>
            <!--Middle Part End -->

        </div>
    </div>
@endsection

@section('scripts')
    <!-- Select 2 js -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript" src="{{ asset('files\custom\parsley\parsley.js') }}"></script>
    <script type="text/javascript" src="{{ asset('files\custom\parsley\parsley.min.js') }}"></script>
    <script>
        function payment_method(param) {
            var val = $('input[name="payment_method"]:checked').val();
            if (val == "cod") {
                $("#slip").prop('required', false);
                $('.upload-file').hide();
            } else {
                $("#slip").prop('required', true);
                $('.upload-file').show();
            }
        }
        $('.upload-file').hide();

        $('#form').parsley();
        $('.js-example-basic-single').select2();

        $('input[name="deliver_type"]').change(function(e) {
            // var val = $("input[name='payment_method']:checked").val();
            // console.log($("input[name='deliver_type']:checked").val())
            getshipping();
        });

        var cart = @json($cart);
        var cities = @json($cities);
        var cart_total = '{{ $total }}';
        var max_cap_value = '{{ $setting->free_deliver_total }}';
        var max_cap_active_status = '{{ $setting->is_active_free_deliver }}';
        var del_charges = 0;
        var initial_del_rate = 0;
        var total_grams = 0;
        // console.log(max_cap_active_status);
        // console.log(max_cap_value);
        getshipping();
        $('.city-id').change(function(e) {
            getshipping();
        });

        function getshipping() {
            del_charges = 0;

            total_grams = 0;
            initial_del_rate = 0;
            if ($('.city-id').val() && $("input[name='deliver_type']:checked").val() == 'delivery') {
                cities.forEach(el => {
                    if (el.loc_id == $('.city-id').val()) {
                        initial_del_rate = el.delivery_rate;
                    }
                });
                cart.forEach(el => {
                    // total_grams += (el.weight * el.qty);
                    total_grams += (el.weight);
                });
                total_grams = Math.ceil(total_grams / 1000) * 1000; //rounding up for nearest 1000;
                if (total_grams < 1000) {
                    del_charges = initial_del_rate;
                } else {

                    del_charges = parseFloat(initial_del_rate) + parseFloat(((total_grams / 1000) - 1)) + 50;
                }
            } else {
                del_charges = 0
            }
            if (max_cap_active_status == 1) {
                if (max_cap_value <= cart_total) {
                    del_charges = 0
                }
            }

            update_values();
        }

        // function () {  }

        function update_values() {
            // $('#delivery_rate').text(parseFloat(del_charges).toFixed(2));
            $('#delivery_charge').val(parseFloat(del_charges));
            // var final_val = parseFloat(cart_total) + parseFloat(del_charges);
            // $('#final_total').text(parseFloat(final_val).toFixed(2));
        }
    </script>
@endsection
