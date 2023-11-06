@extends('user.layouts.app')

@section('title')
    Myproduct.lk | Cart
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets-front/css/cart.css') }}">
@endsection

@section('content')
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i></a></li>
            <li><a href="#">Shopping Cart</a></li>
        </ul>

        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="container">
                        <div class="row ms-progressbar" style="border-bottom:0;">
                            <div class="col-xs-3 ms-progressbar-step active">
                                <div class="text-center ms-progressbar-step-number">Cart
                                </div>
                                <div class="progress">
                                    <div class="progress-bar"></div>
                                </div>
                                <a href="/cart" class="ms-progressbar-dot"></a>

                            </div>

                            <div class="col-xs-3 ms-progressbar-step disabled">
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
                </div>
            </div>
        </div>
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
            <h2 class="title">Shopping Cart</h2>
            <div class="">
                <table class="table table-xs">
                    <tr>
                        <th class="text-center" style="width: 20%"></th>
                        <th>Description</th>
                        <th class="text-right" style="width: 20%">Qty</th>
                        <th class="text-right">Price</th>
                        <th class="text-right">Total</th>
                    </tr>
                    @if ($cart)
                        @foreach ($cart as $item)
                            <tr class="item-row text-center">
                                <td>
                                    <button type="button" data-toggle="tooltip" title="Remove"
                                        class="btn btn-danger btn-remove-cart"
                                        onclick="cart_data.remove_cart({{ array_search($item, $cart) }});"><i
                                            class="fa fa-trash"></i></button>
                                    <img width="100px" src="{{ $item['image1_path'] }}" />
                                </td>
                                <td class="text-left">
                                    <p>{{ $item['product_name'] }}
                                        @if ($item['varies'])
                                            <ul>
                                                @foreach ($item['varies'] as $vr)
                                                    <li>{{ $vr['type'] }} - {{ $vr['value'] }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </p>
                                </td>
                                <td class="text-right" title="Qty">
                                    <div class="value-button" id="decrease"
                                        onclick="decreaseValue({{ array_search($item, $cart) }})" value="Decrease Value">-
                                    </div>
                                    <input type="number" readonly class="number"
                                        id="number_{{ array_search($item, $cart) }}" value="{{ $item['qty'] }}" />
                                    <div class="value-button" id="increase"
                                        onclick="increaseValue({{ array_search($item, $cart) }})" value="Increase Value">+
                                    </div>
                                </td>
                                <td class="text-right" title="Price" id="cart_price_{{ array_search($item, $cart) }}">
                                    {{ number_format($item['price'], 2) }}</td>
                                <td class="text-right row-total" title="Total"
                                    id="cart_total_{{ array_search($item, $cart) }}">
                                    {{ number_format($item['price'] * $item['qty'], 2) }}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <p>Your cart is empty. <a href="/products/all/all">Continue shopping.</a>
                        </p>
                    @endif

                </table>
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
            <div class="row">
                <div class="col-sm-4 col-sm-offset-8">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td class="text-right">
                                    <strong>Sub-Total:</strong>
                                </td>
                                <td class="text-right">Rs. <span id="c_sub_total">{{ number_format($total, 2) }}</span>
                                </td>
                            </tr>
                            {{-- <tr>
                                <td class="text-right">
                                    <strong>Shipping Rate:</strong>
                                </td>
                                <td class="text-right"><span id="delivery_rate">Calculate next step</span></td>
                            </tr> --}}
                            {{-- <tr>
                                <td class="text-right">
                                    <strong>Total:</strong>
                                </td>
                                <td class="text-right">Rs. <span id="final_total"><span
                                            id="c_total">{{ number_format($total, 2) }}</span></span>
                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="buttons">
                <div class="pull-left"><a href="/products/all/all" class="btn btn-primary"><i class="fa fa-angle-left"
                            aria-hidden="true"></i> Back to Products</a>
                </div>
                <div class="pull-right">
                    @if (Auth::user())
                        <a href="{{ route('user.cart.shipping') }}" class="btn btn-primary">Continue
                            <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    @else
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModel">
                            Continue <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </button>
                    @endif


                </div>
            </div>
        </div>
        <!--Middle Part End -->

    </div>
    </div>
    <!-- Modal -->
    <div class="modal fade bd-example-modal-sm" id="loginModel" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog center" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel"><b>Login</b></h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <a href="{{ route('user.cart.shipping') }}">
                            <button type="button" class="btn btn-checkout">
                                Guest Checkout
                            </button>
                        </a>
                    </div>
                    <div class="strike">
                        <span>or</span>
                    </div>

                    <form action="{{ route('user.auth_check') }}" method="post" id="form">
                        @csrf
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                @if ($message = Session::get('error'))
                                    <div class="alert alert-danger icons-alert">
                                        <p><strong>Sorry!</strong> {{ $message }}
                                        </p>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <input type="text" data-parsley-required data-parsley-type="digits"
                                        data-parsley-minlength="10" data-parsley-maxlength="10"
                                        placeholder="Mobile Number" name="mobile_number"
                                        value="{{ old('mobile_number') }}" id="input-mobile_number"
                                        class="form-control" />
                                </div>
                                <div class="form-group">
                                    <input type="password" data-parsley-required name="password"
                                        value="{{ old('password') }}" id="input-password" class="form-control"
                                        placeholder="Password" />
                                </div>
                                <div class="form-group">
                                    <a href="{{ route('user.forget') }}">Forgot Password?</a>
                                </div>
                                <button type="submit" style="width: 100%" class="btn btn-primary">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="text-center">
                        <p class="m-t-30">Don't have an account? <br>
                            <a href="{{ route('user.register') }}">Register now</a>
                        </p>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('files\custom\parsley\parsley.js') }}"></script>
    <script type="text/javascript" src="{{ asset('files\custom\parsley\parsley.min.js') }}"></script>
    <script>
        var error = "{{ Session::get('error') }}";
        if (error) {
            $('#loginModel').modal('show');
        }
        $('#form').parsley();
        var cart = @json($cart);
        // console.log(cart)
        // var cart_total = '{{ $total }}';
        var del_charges = 0;
        var initial_del_rate = 0;
        var total_grams = 0;

        function increaseValue(cart_index) {
            // console.log(cart_index)
            var value = parseInt(document.getElementById('number_' + cart_index).value, 10);
            value = isNaN(value) ? 0 : value;
            if (value != 10) {
                value++;
                document.getElementById('number_' + cart_index).value = value;

                cart.forEach(el => {
                    if (cart.indexOf(el) == cart_index) {
                        // document.getElementById('cart_price_' + cart_index).value = value;
                        $("#cart_total_" + cart_index).text(parseFloat(el.price * value).toFixed(2));
                        cart_data.update_cart(cart_index, 'increase');
                        calculate_total();
                        return;
                    }
                });
            }

        }

        function decreaseValue(cart_index) {
            // console.log(cart_index)
            var value = parseInt(document.getElementById('number_' + cart_index).value, 10);
            value = isNaN(value) ? 0 : value;
            value < 1 ? value = 1 : '';
            if (value != 1) {
                value--;
                document.getElementById('number_' + cart_index).value = value;
                cart.forEach(el => {
                    if (cart.indexOf(el) == cart_index) {
                        // document.getElementById('cart_price_' + cart_index).value = value;
                        $("#cart_total_" + cart_index).text(parseFloat(el.price * value).toFixed(2));
                        cart_data.update_cart(cart_index, 'decrease');
                        calculate_total();
                        return;
                    }
                });
            }

        }

        function calculate_total() {
            var subTotal = 0;
            $(".row-total").each(function() {
                subTotal += parseFloat($(this).text().replace(/\,/g, ""));
            });

            $("#c_sub_total").text(subTotal.toFixed(2));
            $("#c_total").text(subTotal.toFixed(2));
        }
    </script>
@endsection
