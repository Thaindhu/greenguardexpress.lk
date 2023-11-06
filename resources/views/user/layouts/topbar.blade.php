<!-- Header Container  -->
<header id="header" class=" variantleft type_1">
    <!-- Header Top -->
    {{-- @include('user.layouts.snow') --}}
    <div class="header-top compact-hidden">
        <div class="container hidden-xs">
            <div class="row">
                <div class="header-top-left form-inline col-sm-6 col-xs-12 compact-hidden">
                    <div class="form-group languages-block ">
                        <form action="{{ route('user.home') }}" method="post" enctype="multipart/form-data"
                            id="bt-language">
                            <!-- <a class="btn btn-xs dropdown-toggle" data-toggle="dropdown">
                                <img src="/assets-front/image/demo/flags/gb.png" alt="English" title="English">
                                <span class="">Sri Lanka</span>
                                <span class="fa fa-angle-down"></span>
                            </a> -->
                            <!-- <ul class="dropdown-menu">
                                <li><a href="{{ route('user.home') }}"><img class="image_flag"
                                            src="/assets-front/image/demo/flags/gb.png" alt="English"
                                            title="English" />
                                        English </a></li>
                                {{-- <li> <a href="{{ route('user.home')}}"> <img class="image_flag"
                                              src="/assets-front/image/demo/flags/lb.png" alt="Arabic"
                                              title="Arabic" /> Arabic </a> </li> --}}
                            </ul> -->
                        </form>
                    </div>

                    <div class="form-group currencies-block">
                        <!-- <form action="{{ route('user.home') }}" method="post" enctype="multipart/form-data"
                            id="currency">
                            <a class="btn btn-xs dropdown-toggle" data-toggle="dropdown">
                                <span class="icon icon-credit "></span> LKR <span class="fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu btn-xs">
                                <li> <a href="#">(Rs.)&nbsp;LKR</a></li>
                                {{-- <li> <a href="#">(£)&nbsp;Pounds </a></li>
                                <li> <a href="#">($)&nbsp;US Dollar </a></li> --}}
                            </ul>
                        </form> -->
                    </div>
                </div>
                <div class="header-top-right collapsed-block text-right  col-sm-6 col-xs-12 compact-hidden">
                    <h5 class="tabBlockTitle visible-xs">More<a class="expander " href="#TabBlock-1"><i
                                class="fa fa-angle-down"></i></a></h5>
                    <div class="tabBlock" id="TabBlock-1">
                        <ul class="top-link list-inline">
                            <li class="account" id="my_account">
                                <a href="#" title="My Account" class="btn btn-xs dropdown-toggle"
                                    data-toggle="dropdown"> <span>My Account</span> <span
                                        class="fa fa-angle-down"></span></a>
                                @if (Auth::user())
                                    <ul class="dropdown-menu ">
                                        <li><a href="/my-account"><i class="fa fa-user"></i> Profile</a></li>
                                        <li><a href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i>
                                                Logout</a>
                                        </li>
                                    </ul>
                                @else
                                    <ul class="dropdown-menu ">
                                        <li><a href="/register"><i class="fa fa-user"></i> Register</a></li>
                                        <li><a href="/login"><i class="fa fa-pencil-square-o"></i> Login</a>
                                        </li>
                                    </ul>
                                @endif

                            </li>
                            <li class="wishlist"><a href="{{ route('user.wishlist.index') }}" id="wishlist-total"
                                    class="top-link-wishlist" title="Wish List"><span>Wish List
                                    </span></a></li>
                            {{-- <li class="checkout"><a href="checkout.html" class="top-link-checkout"
                                    title="Checkout"><span>Checkout</span></a></li> --}}
                            {{-- <li class="login"><a href="{{ route('user.cart.index') }}"
                                    title="Shopping Cart"><span>Shopping
                                        Cart</span></a></li> --}}
                            <li class="login"><a target="_blank" href="https://fardardomestic.com/"
                                    title="Track Order"><span>
                                        Track Order</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //Header Top -->

    <!-- Header center -->
    <div class="header-center left">
        <div class="container">
            <div class="row">
                <!-- Logo -->
                <div class="navbar-logo col-md-3 col-sm-12 col-xs-6">
                    <a href="/"><img src="/assets-front/image/demo/logos/theme_logo.png" title="Your Store"
                            alt="Your Store" /></a>
                </div>
                <!-- //end Logo -->


                @php
                    $cart = Session::get('cart') ? Session::get('cart') : [];
                    $total = 0;
                    if ($cart) {
                        foreach ($cart as &$el) {
                            $total += $el['price'] * $el['qty'];
                        }
                    }
                @endphp
                <!-- Secondary menu -->
                <div class="col-md-2 col-sm-5 col-xs-6 shopping_cart pull-right">
                    <!--cart-->
                    <div id="cart" class=" btn-group btn-shopping-cart">
                        <a data-loading-text="Loading..." class="top_cart dropdown-toggle" data-toggle="dropdown">
                            <div class="shopcart">
                                <span class="handle pull-left"></span>
                                <span class="title">My cart</span>
                                <p class="text-shopping-cart cart-total-full"><span
                                        class="cart-count">{{ count($cart) }}</span> item(s) -
                                    Rs.
                                    <span class="cart_total">{{ number_format($total, 2) }}</span>
                                </p>
                            </div>
                        </a>

                        <ul class="tab-content content dropdown-menu pull-right shoppingcart-box hidden-xs"
                            role="menu">

                            <li>
                                <table class="table table-striped top-cart-tbl">
                                    <tbody>
                                        @if ($cart)
                                            @foreach ($cart as $item)
                                                <tr>
                                                    <td class="text-center" style="width:70px">
                                                        <a
                                                            href="{{ route('user.view.product', [$item['product_id'], $item['metaname']]) }}">
                                                            <img src="{{ $item['image1_path'] }}" style="width:70px"
                                                                alt="{{ $item['product_name'] }}"
                                                                title="{{ $item['product_name'] }}" class="preview">
                                                        </a>
                                                    </td>
                                                    <td class="text-left"> <a class="cart_product_name"
                                                            href="{{ route('user.view.product', [$item['product_id'], $item['metaname']]) }}">{{ substr($item['product_name'], 0, 8) }}</a>
                                                    </td>
                                                    <td class="text-center"> x{{ $item['qty'] }}</td>
                                                    <td class="text-center">
                                                        Rs.{{ number_format($item['qty'] * $item['price'], 2) }} </td>
                                                    <td class="text-right">
                                                        <a href="{{ route('user.view.product', [$item['product_id'], $item['metaname']]) }}"
                                                            class="fa fa-edit"></a>
                                                    </td>
                                                    <td class="text-right">
                                                        <a onclick="cart_data.remove({{ array_search($item, $cart) }});"
                                                            class="fa fa-times fa-delete"></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <p>Your cart is empty. <a href="/products/all/all">Continue shopping.</a>
                                            </p>
                                        @endif
                                        {{-- <tr>
                                            <td class="text-center" style="width:70px">
                                                <a href="product.html"> <img
                                                        src="/assets-front/image/demo/shop/product/resize/2.jpg"
                                                        style="width:70px" alt="Filet Mign" title="Filet Mign"
                                                        class="preview"> </a>
                                            </td>
                                            <td class="text-left"> <a class="cart_product_name"
                                                    href="product.html">Filet Mign</a> </td>
                                            <td class="text-center"> x1 </td>
                                            <td class="text-center"> Rs.1,202.00 </td>
                                            <td class="text-right">
                                                <a href="product.html" class="fa fa-edit"></a>
                                            </td>
                                            <td class="text-right">
                                                <a onclick="cart.remove('2');" class="fa fa-times fa-delete"></a>
                                            </td>
                                        </tr> --}}

                                    </tbody>
                                </table>
                            </li>
                            <li>
                                <div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td class="text-left"><strong>Sub-Total</strong>
                                                </td>
                                                <td class="text-right">Rs.<span
                                                        class="cart_total">{{ number_format($total, 2) }}</span></td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>Shipping</strong>
                                                </td>
                                                <td class="text-right">Calculate during checkout</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>Total</strong>
                                                </td>
                                                <td class="text-right">Rs.<span
                                                        class="cart_total">{{ number_format($total, 2) }}</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p class="text-right"> <a class="btn view-cart"
                                            href="{{ route('user.cart.index') }}"><i
                                                class="fa fa-shopping-cart"></i>View Cart</a>&nbsp;&nbsp;&nbsp;
                                        <a class="btn btn-mega checkout-cart"
                                            href="{{ route('user.cart.shipping') }}"><i
                                                class="fa fa-share"></i>Checkout</a>
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!--//cart-->
                </div>
                <!-- Search -->
                <div id="sosearchpro" class="col-sm-7 col-xs-12 search-pro">
                    <form method="GET" action="{{ route('user.products.get', ['all', 'all']) }}">
                        <div id="search0" class="search input-group">
                            <div class="select_category filter_type icon-select">
                                <select class="no-border" name="cat_id" onchange="cat(this.value)">
                                    <option value="0">All Categories</option>
                                    @foreach ($cats as $item)
                                        @if (app('request')->input('cat_id') == $item->cat_id)
                                            <option selected value="{{ $item->cat_id }}">{{ $item->cat_name }}
                                            </option>
                                        @else
                                            <option value="{{ $item->cat_id }}">{{ $item->cat_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <input class="autosearch-input form-control" type="text"
                                value="{{ app('request')->input('query') }}" size="50" autocomplete="off"
                                placeholder="Search" name="query">
                            <span class="input-group-btn">
                                <button type="submit" class="button-search btn btn-primary" name="submit_search"><i
                                        class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                </div>
                <!-- //end Search -->
            </div>

        </div>
    </div>
    <!-- //Header center -->

    <!-- Header Bottom -->
    <div class="header-bottom hidden-xs hidden-sm">
        <div class="container">
            <div class="row">
                <div class="sidebar-menu col-md-3 col-sm-6 col-xs-6 ">
                    <div class="responsive so-megamenu ">
                        <div class="so-vertical-menu no-gutter compact-hidden">
                            <nav class="navbar-default">
                                <div class="container-megamenu vertical {{ request()->is('/') ? 'open' : '' }}">
                                    <div id="menuHeading">
                                        <div class="megamenuToogle-wrapper">
                                            <div class="megamenuToogle-pattern">
                                                <div class="container">
                                                    <div>
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                    </div>
                                                    All Categories
                                                    <i
                                                        class="all-cat fa pull-right arrow-circle fa-chevron-circle-up"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="navbar-header">
                                        <button type="button" id="show-verticalmenu" data-toggle="collapse"
                                            class="navbar-toggle fa fa-list-alt">

                                        </button>
                                        All Categories
                                    </div> --}}
                                    <div class="vertical-wrapper">
                                        <span id="remove-verticalmenu" class="fa fa-times"></span>
                                        <div class="megamenu-pattern">
                                            <div class="container">
                                                <ul class="megamenu">
                                                    @foreach ($cats as $item)
                                                        <li class="item-vertical css-menu with-sub-menu hover">
                                                            <p class="close-menu"></p>
                                                            <a href="{{ route('user.products.get', [$item->metaname, 'all']) }}"
                                                                class="clearfix">
                                                                {{-- <img src="{{ $item->icon_path }}" alt="icon"> --}}
                                                                <span>{{ $item->cat_name }}</span>
                                                                <b class="caret"></b>
                                                            </a>
                                                            <div class="sub-menu" data-subwidth="30"
                                                                style="width: 270px; display: none; right: 0px;">
                                                                <div class="content" style="display: none;">
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <div class="row">
                                                                                <div class="col-sm-12 hover-menu">
                                                                                    <div class="menu">
                                                                                        <ul>
                                                                                            @foreach ($subcats as $sb)
                                                                                                @if ($item->cat_id == $sb->category_id)
                                                                                                    <li>
                                                                                                        <a href="{{ route('user.products.get', [$item->metaname, $sb->metaname]) }}"
                                                                                                            class="main-menu">{{ $sb->subcat_name }}</a>
                                                                                                    </li>
                                                                                                @endif
                                                                                            @endforeach
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach

                                                    {{-- <li class="item-vertical">
                                                        <p class="close-menu"></p>
                                                        <a href="#" class="clearfix">
                                                            <img src="/assets-front/image/theme/icons/11.png"
                                                                alt="icon">
                                                            <span>Flashlights &amp; Lamps</span>

                                                        </a>
                                                    </li> --}}
                                                    <li class="loadmore">
                                                        <i class="fa fa-plus-square-o"></i>
                                                        <span class="more-view">More Categories</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>

                </div>

                <!-- Main menu -->
                <div class="megamenu-hori header-bottom-right  col-md-9 col-sm-6 col-xs-6 ">
                    <div class="responsive so-megamenu ">
                        <nav class="navbar-default">
                            <div class=" container-megamenu  horizontal">
                                <div class="navbar-header text-right">
                                    <button type="button" id="show-megamenu" data-toggle="collapse"
                                        class="navbar-toggle">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    {{-- Navigation --}}
                                </div>

                                <div class="megamenu-wrapper">
                                    <span id="remove-megamenu" class="fa fa-times"></span>
                                    <div class="megamenu-pattern">
                                        <div class="container">
                                            <ul class="megamenu " data-transition="slide" data-animationtime="250">

                                                <li class="">
                                                    <p class="close-menu"></p>
                                                    <a href="{{ route('user.home') }}" class="clearfix">
                                                        <strong>Home</strong>
                                                        <span class="label"></span>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <p class="close-menu"></p>
                                                    <a href="{{ route('user.products.get', ['all', 'all']) }}"
                                                        class="clearfix">
                                                        <strong>Shop</strong>
                                                        <span class="label"></span>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <p class="close-menu"></p>
                                                    <a href="{{ route('user.products.hot_deals') }}"
                                                        class="clearfix">
                                                        <strong>Hot Deals</strong>
                                                        <span class="label"></span>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <p class="close-menu"></p>
                                                    <a href="{{ route('pages.about') }}" class="clearfix">
                                                        <strong>About Us</strong>
                                                        <span class="label"></span>
                                                    </a>
                                                </li>

                                                <li class="hidden-md">
                                                    <p class="close-menu"></p>
                                                    <a href="{{ route('pages.contact') }}" class="clearfix">
                                                        <strong>Contact Us</strong>

                                                    </a>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                <!-- //end Main menu -->

            </div>
        </div>

    </div>
    {{-- Bottom Navigation Mobile --}}
    @if (request()->is('product/view/*'))
        {{-- @include('user.layouts.product_bottom_bar') --}}
    @else
        @include('user.layouts.bottom_bar')
    @endif

    <!-- Navbar switcher -->
    <!-- //end Navbar switcher -->
</header>
<!-- //Header Container  -->
