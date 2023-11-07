@extends('user.layouts.app')

@section('title')
    greenguardexpress.lk | Checkout
@endsection

@section('styles')
@endsection

@section('content')
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i></a></li>
            <li><a href="#">Checkout</a></li>

        </ul>
        <div class="row">
            <!--Middle Part Start-->
            <div id="content" class="col-sm-12">
                <h2 class="title">Checkout</h2>
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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('user.order.store') }}" method="post" id="from">
                    @csrf
                    <div class="so-onepagecheckout ">
                        <div class="col-left col-sm-3">
                            @if (!$user)
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><i class="fa fa-sign-in"></i> Create an Account or Login
                                        </h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" checked="checked" value="guest" name="user_type">
                                                Guest Checkout</label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" value="returning" onclick="redirect()"
                                                    name="user_type">
                                                Returning Customer</label>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><i class="fa fa-user"></i> Your Personal Details</h4>
                                </div>
                                <div class="panel-body">
                                    <fieldset id="account">
                                        <div class="form-group required">
                                            <label for="input-payment-firstname" class="control-label">First
                                                Name</label>
                                            <input type="text" data-parsley-required class="form-control"
                                                id="input-payment-firstname" placeholder="First Name"
                                                value="{{ $user ? $user->first_name : null }}" name="first_name">
                                        </div>
                                        <div class="form-group required">
                                            <label for="input-payment-lastname" class="control-label">Last Name</label>
                                            <input type="text" class="form-control" data-parsley-required
                                                id="input-payment-lastname" placeholder="Last Name"
                                                value="{{ $user ? $user->last_name : null }}" name="last_name">
                                        </div>
                                        <div class="form-group required">
                                            <label for="input-payment-email" class="control-label">E-Mail</label>
                                            <input type="text" class="form-control" id="input-payment-email"
                                                placeholder="E-Mail" data-parsley-required
                                                value="{{ $user ? $user->email : null }}" name="email">
                                        </div>
                                        <div class="form-group required">
                                            <label for="input-payment-telephone" class="control-label">Mobile Number</label>
                                            <input type="text" class="form-control" id="input-payment-telephone"
                                                placeholder="Telephone" data-parsley-required
                                                value="{{ $user ? $user->mobile_number : null }}" name="mobile_number">
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><i class="fa fa-book"></i> Your Address</h4>
                                </div>
                                <div class="panel-body">
                                    <fieldset id="address" class="required">
                                        <div class="form-group required">
                                            <label for="input-payment-address-1" class="control-label">Address 1</label>
                                            <input type="text" class="form-control" id="input-payment-address-1"
                                                placeholder="Address 1" data-parsley-required
                                                value="{{ $user ? $user->address_1 : null }}" name="address_1">
                                        </div>
                                        <div class="form-group">
                                            <label for="input-payment-address-2" class="control-label">Address 2</label>
                                            <input type="text" class="form-control" id="input-payment-address-2"
                                                placeholder="Address 2" value="{{ $user ? $user->address_2 : null }}"
                                                name="address_2">
                                        </div>
                                        <div class="form-group required">
                                            <label for="input-payment-city" class="control-label">City</label>
                                            <select class="form-control city-id" data-parsley-required
                                                id="input-payment-zone" name="city_id">
                                                <option value=""> --- Please Select --- </option>
                                                @foreach ($cities as $item)
                                                    <option
                                                        {{ $user && $user->city_id == $item->loc_id ? 'selected' : null }}
                                                        value="{{ $item->loc_id }}">{{ $item->loc_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group required">
                                            <label for="input-payment-postcode" class="control-label">Post Code</label>
                                            <input type="text" class="form-control" id="input-payment-postcode"
                                                placeholder="Post Code" data-parsley-required
                                                value="{{ $user ? $user->postal_code : null }}" name="postal_code">
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="col-right col-sm-9">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel panel-default no-padding">

                                        <div class="col-sm-12  checkout-payment-methods">
                                            <div class="panel-heading">
                                                <h4 class="panel-title"><i class="fa fa-credit-card"></i> Payment Method
                                                </h4>
                                            </div>
                                            <div class="panel-body">
                                                <p>Please select the preferred payment method to use on this order.</p>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" value="cod" checked="checked"
                                                            name="payment_method">Cash
                                                        On Delivery</label>
                                                    <label>
                                                        <input type="radio" value="pickup" name="payment_method">Store
                                                        Pickup</label>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="text" name="delivery_charge" hidden id="delivery_charge" readonly>
                                    </div>



                                </div>

                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><i class="fa fa-shopping-cart"></i> Shopping cart
                                            </h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <td class="text-center">Image</td>
                                                            <td class="text-left">Product Name</td>
                                                            <td class="text-left">Quantity</td>
                                                            <td class="text-right">Unit Price</td>
                                                            <td class="text-right">Total</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $cart = Session::get('cart') ? Session::get('cart') : [];
                                                            $total = 0;
                                                            if ($cart) {
                                                                foreach ($cart as &$el) {
                                                                    $total += $el['price'] * $el['qty'];
                                                                }
                                                            }
                                                        @endphp
                                                        @if ($cart)
                                                            @foreach ($cart as $item)
                                                                <tr>
                                                                    <td class="text-center"><a
                                                                            href="{{ route('user.view.product', [$item['product_id'], $item['metaname']]) }}"><img
                                                                                width="70px"
                                                                                src="{{ $item['image1_path'] }}"
                                                                                alt="{{ $item['product_name'] }}"
                                                                                title="{{ $item['product_name'] }}"
                                                                                class="img-thumbnail" /></a></td>
                                                                    <td class="text-left"><a
                                                                            href="{{ route('user.view.product', [$item['product_id'], $item['metaname']]) }}">{{ $item['product_name'] }}</a><br />
                                                                        @if ($item['varies'])
                                                                            <ul>
                                                                                {{-- {{ dd($item['varies']) }} --}}
                                                                                @foreach ($item['varies'] as $vr)
                                                                                    <li>{{ $vr['type'] }} -
                                                                                        {{ $vr['value'] }}</li>
                                                                                @endforeach
                                                                            </ul>
                                                                        @endif
                                                                    </td>
                                                                    <td class="text-left" width="50px">
                                                                        {{ $item['qty'] }}
                                                                    </td>
                                                                    <td class="text-right">
                                                                        {{ number_format($item['price'], 2) }}</td>
                                                                    <td class="text-right">
                                                                        {{ number_format($item['price'] * $item['qty'], 2) }}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @else
                                                            <p>Your cart is empty. <a href="/products/all/all">Continue
                                                                    shopping.</a>
                                                            </p>
                                                        @endif
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td class="text-right" colspan="4">
                                                                <strong>Sub-Total:</strong>
                                                            </td>
                                                            <td class="text-right">Rs.{{ number_format($total, 2) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-right" colspan="4"><strong>Shipping
                                                                    Rate:</strong></td>
                                                            <td class="text-right">Rs. <span
                                                                    id="delivery_rate">0.00</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-right" colspan="4"><strong>Total:</strong>
                                                            </td>
                                                            <td class="text-right">Rs. <span
                                                                    id="final_total">{{ number_format($total, 2) }}</span>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><i class="fa fa-pencil"></i> Add Comments About Your
                                                Order</h4>
                                        </div>
                                        <div class="panel-body">
                                            <textarea rows="4" class="form-control" id="confirm_comment" name="remark"></textarea>
                                            <br>
                                            <div class="buttons">
                                                <div class="pull-right">
                                                    <input type="submit" class="btn btn-primary" id="button-confirm"
                                                        value="Confirm Order">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!--Middle Part End -->

        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('files\custom\parsley\parsley.js') }}"></script>
    <script type="text/javascript" src="{{ asset('files\custom\parsley\parsley.min.js') }}"></script>
    <script>
        $('#form').parsley();
        $('input[name="payment_method"]').change(function(e) {
            // var val = $("input[name='payment_method']:checked").val();
            // console.log(val)
            getshipping();
        });

        function redirect() {
            window.location.href = "/login";
        }
        var cart = @json($cart);
        var cities = @json($cities);
        var cart_total = '{{ $total }}';
        var del_charges = 0;
        var initial_del_rate = 0;
        var total_grams = 0;
        console.log(cart_total);
        getshipping();
        $('.city-id').change(function(e) {
            getshipping();
        });

        function getshipping(param) {
            if ($('.city-id').val() && $("input[name='payment_method']:checked").val() == 'cod') {
                cities.forEach(el => {
                    if (el.loc_id == $('.city-id').val()) {
                        initial_del_rate = el.delivery_rate;
                    }
                });
                cart.forEach(el => {
                    total_grams += (el.weight * el.qty);
                });
                if (total_grams < 1000) {
                    del_charges = initial_del_rate;
                } else {
                    del_charges = initial_del_rate + ((total_grams / 1000) - 1) * 75;
                }
            } else {
                del_charges = 0
            }
            update_values();
        }

        function update_values() {
            $('#delivery_rate').text(del_charges.toFixed(2));
            $('#delivery_charge').val(del_charges);
            var final_val = parseFloat(cart_total) + parseFloat(del_charges);
            $('#final_total').text(final_val.toFixed(2));
        }
    </script>
@endsection
