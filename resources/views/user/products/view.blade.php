@extends('user.layouts.app')

@section('title')
    greenguardexpress.lk | {{ $product->title }}
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets-front/css/product.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
        integrity="sha512-DIW4FkYTOxjCqRt7oS9BFO+nVOwDL4bzukDyDtMO7crjUZhwpyrWBFroq+IqRe6VnJkTpRAS6nhDvf0w+wHmxg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css"
        integrity="sha512-O03ntXoVqaGUTDNEpUTHQoQUJMHLrErGJyHg89uy71MyuHuNGiS4l+bc1qre8jdw2azrg6tf49wmp652w00xltddxmpk98xp=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
@endsection

@section('content')
    <div class="main-container container">
        <ul class="breadcrumb m-b-20 hidden-sm hidden-xs">
            <li><a href="/"><i class="fa fa-home"></i></a></li>
            <li><a href="#">{{ $product->cat_name }}</a></li>
            <li><a href="#">{{ $product->title }}</a></li>
        </ul>

        <div class="row">
            <!--Middle Part Start-->
            <div id="content" class="col-md-12 col-sm-12">

                <div class="product-view row">
                    <div class="left-content-product col-lg-10 col-xs-12">
                        <div class="row">
                            <div class="content-product-left class-honizol col-sm-6 col-xs-12 ">
                                <div class="large-image ">
                                    <img itemprop="image" class="product-image-zoom" src="{{ $product->image1_path }}"
                                        data-zoom-image="{{ $product->image4_path }}" title="Bint Beef" alt="Bint Beef">
                                </div>
                                {{-- <a class="thumb-video pull-left" href="https://www.youtube.com/watch?v=HhabgvIIXik"><i
                                        class="fa fa-youtube-play"></i></a> --}}
                                <div id="thumb-slider" class="owl-theme owl-loaded owl-drag full_slider">
                                    <a data-index="0" class="img thumbnail " data-image="{{ $product->image1_path }}"
                                        title="Bint Beef">
                                        <img src="{{ $product->image1_path }}" title="Bint Beef" alt="Bint Beef">
                                    </a>
                                    @if ($product->image2_path)
                                        <a data-index="1" class="img thumbnail " data-image="{{ $product->image2_path }}"
                                            title="Bint Beef">
                                            <img src="{{ $product->image2_path }}" title="Bint Beef" alt="Bint Beef">
                                        </a>
                                    @endif
                                    @if ($product->image3_path)
                                        <a data-index="2" class="img thumbnail " data-image="{{ $product->image3_path }}"
                                            title="Bint Beef">
                                            <img src="{{ $product->image3_path }}" title="Bint Beef" alt="Bint Beef">
                                        </a>
                                    @endif
                                    @if ($product->image4_path)
                                        <a data-index="3" class="img thumbnail " data-image="{{ $product->image4_path }}"
                                            title="Bint Beef">
                                            <img src="{{ $product->image4_path }}" title="Bint Beef" alt="Bint Beef">
                                        </a>
                                    @endif

                                </div>

                            </div>

                            <div class="content-product-right col-sm-6 col-xs-12">
                                <div class="title-product">
                                    <h1>{{ $product->title }}</h1>
                                </div>
                                <!-- Review ---->
                                <div class="box-review form-group hidden-sm hidden-xs">
                                    <div class="ratings">
                                        <div class="rating-box">
                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        </div>
                                    </div>

                                    <a class="reviews_button" href=""
                                        onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">0
                                        reviews</a> |
                                    <a class="write_review_button" href=""
                                        onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">Write
                                        a review</a>
                                </div>

                                <div class="product-label form-group">
                                    <div class="product_page_price price" itemprop="offerDetails" itemscope=""
                                        itemtype="http://data-vocabulary.org/Offer">
                                        @if ($product->discount_pre)
                                            <span class="price-new" itemprop="price">Rs. <span
                                                    id="price">{{ number_format($product->price - $product->discount_price, 2) }}</span></span>
                                            <span class="price-old" id="price-old">Rs. <span
                                                    id="price_old_tag">{{ number_format($product->price, 2) }}</span></span>
                                            <span class="discount-pre">-{{ $product->discount_pre }}%</span>
                                        @else
                                            <span class="price-new" itemprop="price">Rs. <span
                                                    id="price">{{ number_format($product->price, 2) }}</span></span>
                                        @endif
                                        <input type="number" hidden name="product_price" id="product_price" readonly
                                            required value="{{ $product->price - $product->discount_price }}">

                                        {{-- <input type="number" name="old_product_price" id="old_product_price" readonly
                                            required value="{{ number_format($product->price, 2) }}"> --}}

                                        {{-- <input type="number" name="discount" id="discount" readonly required
                                            value="{{ $product->discount_pre }}"> --}}
                                    </div>
                                    <div class="stock"><span>Availability:</span>
                                        @if ($product->is_available)
                                            <span class="status-stock">In Stock</span>
                                        @else
                                            <span class="out-of-stock">Out of Stock</span>
                                        @endif
                                    </div>
                                </div>
                                <!-- <div class="koko-sec">
                                    <p>or make 3 interest free instalments of <b>Rs.
                                            <span id="koko-installment">{{ number_format((($product->price- $product->discount_price) / 3), 2) }}</span>
                                        </b> with Mintpay</p>
                                    <img src="{{ asset('assets-front/image/mintpay.png') }}" alt="" class="mintpay-width" style="width: 120px;">
                                </div> -->
                                <div class="koko-sec">
                                    <p>or make 3 interest free instalments of <b>Rs.
                                            <span id="koko-installment">{{ number_format((($product->price- $product->discount_price) / 3), 2) }}</span>
                                        </b> with KOKO</p>
                                    <img src="{{ asset('assets-front/image/koko_logo.png') }}" alt="">
                                </div>
                                <div class="product-box-desc">
                                    <div class="inner-box-desc">
                                        {{-- <div class="price-tax"><span>Ex Tax:</span> $60.00</div> --}}
                                        <div class="model"><span>Product Code:</span> {{ $product->product_code }}</div>
                                        {{-- <div class="reward"><span>Price in reward points:</span> 400</div> --}}
                                        <div class="brand"><span>Brand:</span><a
                                                href="#">{{ $product->brand ? $product->brand : ' n/a' }}</a> </div>

                                    </div>
                                </div>
                                @php
                                    $varies = json_decode($product->variations);
                                    // dd($varies);
                                @endphp

                                <div id="product">

                                    @if ($varies)
                                        <h4>Available Options</h4>
                                        @foreach ($varies as $item)
                                            <div class="image_option_type form-group required">
                                                <label class="control-label"
                                                    for="{{ $item->title }}">{{ $item->title }}</label>
                                                <ul class="product-options clearfix" id="input-option231">
                                                    @foreach ($item->varies as $v)
                                                        <li class="radio">
                                                            <label class="m-r-10"
                                                                onclick="cart_data.check({{ $v->price ? $v->price : 0 }}, {{ $v->qty ? $v->qty : 0 }})">
                                                                <input class="image_radio {{ $item->title }}"
                                                                    type="radio" name="{{ $item->title }}"
                                                                    id="{{ $item->title }}"
                                                                    value="{{ $v->type }}">
                                                                <img src="/assets-front/image/demo/colors/blue.jpg"
                                                                    data-original-title="{{ $v->price ? $v->type . '  +Rs.' . number_format($v->price, 2) : '' }}"
                                                                    class="img-thumbnail icon icon-color"> <i
                                                                    class="fa fa-check"></i>
                                                                <label> {{ $v->type }}</label>
                                                            </label>
                                                        </li>
                                                    @endforeach
                                                    <li class="selected-option">
                                                    </li>
                                                </ul>
                                            </div>
                                        @endforeach
                                    @endif

                                    <div class="error"></div>
                                    <div class="form-group box-info-product">
                                        <div class="option quantity hidden-sm hidden-xs">
                                            <div class="input-group quantity-control  m-r-10" unselectable="on"
                                                style="-webkit-user-select: none;">
                                                <label>Qty</label>
                                                <input class="form-control" type="text" name="quantity"
                                                    id="quantity" value="1">
                                                <input type="hidden" name="product_id" value="50">
                                                <span class="input-group-addon product_quantity_down">−</span>
                                                <span class="input-group-addon product_quantity_up">+</span>
                                            </div>
                                        </div>
                                        <div style="display: flex">
                                            <div class="cart">
                                                @if ($product->is_available)
                                                    <input type="button" data-toggle="tooltip" title=""
                                                        value="Add to Cart" data-loading-text="Loading..."
                                                        id="button-cart" class="btn btn-mega btn-lg btn-cart-web"
                                                        onclick="cart_data.single_add({{ $product->id }}, '{{ strlen($product->image1_path) }}' , '{{ strlen($product->title) }}' , 'cart', null);"
                                                        data-original-title="Add to Cart">
                                                    <input type="button" data-toggle="tooltip" title=""
                                                        value="Buy Now" data-loading-text="Loading..." id="button-cart"
                                                        class="btn btn-mega btn-lg btn-buy-web"
                                                        onclick="cart_data.single_add({{ $product->id }}, '{{ strlen($product->image1_path) }}' , '{{  strlen($product->title) }}', 'buynow', null);"
                                                        data-original-title="Buy Now">
                                                @endif

                                            </div>
                                            <div class="add-to-links wish_comp">
                                                <ul class="blank list-inline">
                                                    <li class="wishlist">
                                                        <a class="icon" data-toggle="tooltip" title=""
                                                            onclick="wishlist.add({{ $product->id }}, '{{ $product->image1_path }}' , '{{ $product->title }}');"
                                                            data-original-title="Add to Wish List"><i
                                                                class="icon_{{ $product->id }} {{ $is_wished ? 'fa fa-heart' : 'fa fa-heart-o' }}"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <!-- end box info product -->

                            </div>
                        </div>
                    </div>

                    <section class="col-lg-2 hidden-sm hidden-md hidden-xs slider-products">
                        <div class="module col-sm-12 four-block">
                            <div class="modcontent clearfix">
                                <div class="policy-detail">
                                    <div class="banner-policy">
                                        <div class="policy policy1">
                                            <a href="#"> <span class="ico-policy">&nbsp;</span> 30 day
                                                <br> money back </a>
                                        </div>
                                        <div class="policy policy2">
                                            <a href="#"> <span class="ico-policy">&nbsp;</span> In-store exchange
                                            </a>
                                        </div>
                                        <div class="policy policy3">
                                            <a href="#"> <span class="ico-policy">&nbsp;</span> lowest price
                                                guarantee </a>
                                        </div>
                                        <div class="policy policy4">
                                            <a href="#"> <span class="ico-policy">&nbsp;</span> shopping guarantee
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <!-- Product Tabs -->
                <div class="producttab ">
                    <div class="tabsslider  vertical-tabs col-xs-12">
                        <ul class="nav nav-tabs col-lg-2 col-sm-3">
                            <li class="active"><a data-toggle="tab" href="#tab-1">Description</a></li>
                            {{-- <li class="item_nonactive"><a data-toggle="tab" href="#tab-review">Reviews (1)</a></li> --}}
                            {{-- <li class="item_nonactive"><a data-toggle="tab" href="#tab-4">Tags</a></li> --}}
                            {{-- <li class="item_nonactive"><a data-toggle="tab" href="#tab-5">Custom Tab</a></li> --}}
                        </ul>
                        <div class="tab-content col-lg-10 col-sm-9 col-xs-12">
                            <div id="tab-1" class="tab-pane fade active in">
                                {!! $product->small_description !!} <br><br>
                                {!! $product->description !!}
                            </div>
                            <div id="tab-review" class="tab-pane fade">
                                <form>
                                    <div id="review">
                                        <table class="table table-striped table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 50%;"><strong>Super
                                                            Administrator</strong>
                                                    </td>
                                                    <td class="text-right">29/07/2015</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <p>Best this product opencart</p>
                                                        <div class="ratings">
                                                            <div class="rating-box">
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-1x"></i><i
                                                                        class="fa fa-star-o fa-stack-1x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-1x"></i><i
                                                                        class="fa fa-star-o fa-stack-1x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-1x"></i><i
                                                                        class="fa fa-star-o fa-stack-1x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-1x"></i><i
                                                                        class="fa fa-star-o fa-stack-1x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star-o fa-stack-1x"></i></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="text-right"></div>
                                    </div>
                                    <h2 id="review-title">Write a review</h2>
                                    <div class="contacts-form">
                                        <div class="form-group"> <span class="icon icon-user"></span>
                                            <input type="text" name="name" class="form-control" value="Your Name"
                                                onblur="if (this.value == '') {this.value = 'Your Name';}"
                                                onfocus="if(this.value == 'Your Name') {this.value = '';}">
                                        </div>
                                        <div class="form-group"> <span class="icon icon-bubbles-2"></span>
                                            <textarea class="form-control" name="text" onblur="if (this.value == '') {this.value = 'Your Review';}"
                                                onfocus="if(this.value == 'Your Review') {this.value = '';}">Your Review</textarea>
                                        </div>
                                        <span style="font-size: 11px;"><span class="text-danger">Note:</span>
                                            HTML
                                            is not translated!</span>

                                        <div class="form-group">
                                            <b>Rating</b> <span>Bad</span>&nbsp;
                                            <input type="radio" name="rating" value="1"> &nbsp;
                                            <input type="radio" name="rating" value="2"> &nbsp;
                                            <input type="radio" name="rating" value="3"> &nbsp;
                                            <input type="radio" name="rating" value="4"> &nbsp;
                                            <input type="radio" name="rating" value="5">
                                            &nbsp;<span>Good</span>

                                        </div>
                                        <div class="buttons clearfix"><a id="button-review"
                                                class="btn buttonGray">Continue</a></div>
                                    </div>
                                </form>
                            </div>
                            <div id="tab-4" class="tab-pane fade">
                                <a href="#">Monitor</a>,
                                <a href="#">Apple</a>
                            </div>
                            <div id="tab-5" class="tab-pane fade">
                                <h3 class="custom-color">Take a trivial example which of us ever undertakes
                                </h3>
                                <p>Lorem ipsum dolor sit amet, consetetur
                                    sadipscing elitr, sed diam nonumy eirmod
                                    tempor invidunt ut labore et dolore
                                    magna aliquyam erat, sed diam voluptua.
                                    At vero eos et accusam et justo duo
                                    dolores et ea rebum. Stet clita kasd
                                    gubergren, no sea takimata sanctus est
                                    Lorem ipsum dolor sit amet. Lorem ipsum
                                    dolor sit amet, consetetur sadipscing
                                    elitr, sed diam nonumy eirmod tempor
                                    invidunt ut labore et dolore magna aliquyam
                                    erat, sed diam voluptua. </p>
                                <p>At vero eos et accusam et justo duo dolores
                                    et ea rebum. Stet clita kasd gubergren,
                                    no sea takimata sanctus est Lorem ipsum
                                    dolor sit amet. Lorem ipsum dolor sit
                                    amet, consetetur sadipscing elitr.</p>
                                <ul class="marker-simple-list two-columns">
                                    <li>Nam liberempore</li>
                                    <li>Cumsoluta nobisest</li>
                                    <li>Eligendptio cumque</li>
                                    <li>Nam liberempore</li>
                                    <li>Cumsoluta nobisest</li>
                                    <li>Eligendptio cumque</li>
                                </ul>
                                <p>Sed diam nonumy eirmod tempor invidunt
                                    ut labore et dolore magna aliquyam erat,
                                    sed diam voluptua. At vero eos et accusam
                                    et justo duo dolores et ea rebum. Stet
                                    clita kasd gubergren, no sea takimata
                                    sanctus est Lorem ipsum dolor sit amet.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //Product Tabs -->

                <!-- Related Products -->
                <div class="related titleLine products-list grid module hidden-sm hidden-xs">
                    <h3 class="modtitle">Related Products </h3>
                    <div class="releate-products ">
                        @foreach ($related_products as $item)
                            <div class="product-layout">
                                <a href="{{ route('user.view.product', [$item->id, $item->metaname]) }}">
                                    <div class="product-item-container">
                                        <div class="left-block">
                                            <div class="product-image-container lazy second_img ">
                                                <img data-src="{{ $item->image1_path }}" src="{{ $item->image1_path }}"
                                                    alt="{{ $item->title }}&quot;" class="img-responsive" />
                                                <img data-src="{{ $item->image2_path }}" src="{{ $item->image2_path }}"
                                                    alt="{{ $item->title }}&quot;" class="img_0 img-responsive" />
                                            </div>
                                            <!--Sale Label-->
                                            @if ($item->discount_pre)
                                                <span class="label label-sale">Sale</span>
                                            @endif
                                            @if ($item->is_new)
                                                <span class="label label-new">New</span>
                                            @endif
                                        </div>


                                        <div class="right-block">
                                            <div class="caption">
                                                <h4 class="wrap-text">
                                                    <a class="demo-2"
                                                        href="{{ route('user.view.product', [$item->id, $item->metaname]) }}">{{ $item->title }}&quot;</a>
                                                </h4>

                                                <div class="price">
                                                    @if ($item->discount_pre)
                                                        <span
                                                            class="price-new">Rs.{{ number_format($item->price - $item->discount_price, 2) }}</span>
                                                        <span
                                                            class="price-old">Rs.{{ number_format($item->price, 2) }}</span>
                                                        <span
                                                            class="label label-percent">-{{ $item->discount_pre }}%</span>
                                                    @else
                                                        <span
                                                            class="price-new">Rs.{{ number_format($item->price, 2) }}</span>
                                                    @endif
                                                </div>
                                                <div class="description item-desc hidden">
                                                    <p>{{ $item->small_description }}</p>
                                                </div>
                                            </div>
                                        </div><!-- right block -->

                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="related titleLine products-list grid module hidden-lg hidden-md">
                    <div class="row">
                        <div class="col-xs-9">
                            <h3 class="modtitle">Related Products</h3>
                        </div>
                        {{-- <div class="col-xs-3 text-right">
                            <a href="/products/all/all" class="btn-view">View All</a>
                        </div> --}}
                    </div>
                    <div class="products-list row grid">
                        @foreach ($related_products as $item)
                            <div class="product-layout col-md-4 col-sm-6 col-xs-6">
                                <a href="{{ route('user.view.product', [$item->id, $item->metaname]) }}">
                                    <div class="product-item-container">
                                        <div class="left-block">
                                            <div class="product-image-container lazy second_img ">
                                                <img data-src="{{ $item->image1_path }}" src="{{ $item->image1_path }}"
                                                    alt="{{ $item->title }}&quot;" class="img-responsive" />
                                                @if ($item->image2_path)
                                                    <img data-src="{{ $item->image2_path }}"
                                                        src="{{ $item->image2_path }}" alt="{{ $item->title }}&quot;"
                                                        class="img_0 img-responsive" />
                                                @endif

                                            </div>
                                            <!--Sale Label-->
                                            @if ($item->discount_pre)
                                                <span class="label label-sale">Sale</span>
                                            @endif
                                            @if ($item->is_new)
                                                <span class="label label-new">New</span>
                                            @endif
                                            {{-- <span class="label label-sale">Sale</span> --}}
                                        </div>
                                        <div class="right-block">
                                            <div class="caption">
                                                <h4 class="wrap-text">
                                                    <a class="demo-1"
                                                        href="{{ route('user.view.product', [$item->id, $item->metaname]) }}">{{ $item->title }}&quot;</a>
                                                </h4>
                                                <div class="price">
                                                    @if ($item->discount_pre)
                                                        <span
                                                            class="price-new">Rs.{{ number_format($item->price - $item->discount_price, 2) }}</span>
                                                        <span
                                                            class="price-old">Rs.{{ number_format($item->price, 2) }}</span>
                                                        <span
                                                            class="label label-percent">-{{ $item->discount_pre }}%</span>
                                                    @else
                                                        <span
                                                            class="price-new">Rs.{{ number_format($item->price, 2) }}</span>
                                                        <span class="price-old"></span>
                                                        <span class="label label-percent"></span>
                                                    @endif
                                                </div>
                                                <div class="description item-desc hidden">
                                                    <p>{{ $item->small_description }}</p>
                                                </div>
                                            </div>
                                        </div><!-- right block -->
                                    </div>
                                </a>
                            </div>
                            {{-- <div class="clearfix visible-xs-block"></div> --}}
                        @endforeach
                    </div>
                </div>
                <!-- end Related  Products-->


            </div>


        </div>
        <!--Middle Part End-->
    </div>
    {{-- Product Bottom Bar Mobile --}}
    <header class="header-nav hidden-lg hidden-md">
        <div class="container-nav-bar">
            <nav class="bottom-nav">
                <div class="bottom-nav-item">
                    <a target="_blank"
                        href="https://wa.me/94777749800?text=I'm%20interested%20in%20your%20product.%20Link={{ url()->current() }}">
                        <div class="bottom-nav-link chat">
                            <i class="fa fa-whatsapp" aria-hidden="true"></i>
                            {{-- <span>Chat</span> --}}
                        </div>
                    </a>
                </div>
                @if ($product->is_available)
                    <div class="bottom-nav-item cart-btn-mob">
                        <button class="bottom-nav-link buy-now-mob" id="add-cart-mob"
                            onclick="cart_data.single_add({{ $product->id }}, '{{ strlen($product->image1_path) }}' , '{{ strlen($product->title) }}' , 'cart','mob');">
                            <span><i class="cart-mob-icon fa fa-shopping-cart" aria-hidden="true"></i> <b>Add to
                                    Cart</b></span>
                        </button>
                    </div>
                    <div class="bottom-nav-item buynow">
                        <button type="button" class="bottom-nav-link buy-now-mob" id="show-verticalmenu"
                            onclick="cart_data.single_add({{ $product->id }}, '{{ strlen($product->image1_path) }}' , '{{ strlen($product->title) }}', 'buynow' ,'mob');">
                            <i class="buy-mob-icon" aria-hidden="true"></i>
                            <span><b>Buy Now</b></span>
                        </button>
                    </div>
                @else
                    <div class="bottom-nav-item ouy-of-stock">
                        <a href="javascript:void(0)">
                            <div class="bottom-nav-link" id="show-verticalmenu">
                                {{-- <i class="fa fa-bars" aria-hidden="true"></i> --}}
                                <span>Out of Stock</span>
                            </div>
                        </a>
                    </div>
                @endif



            </nav>
        </div>
    </header>
    {{-- Product Bottom Bar Mobile --}}

@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('files\custom\parsley\parsley.js') }}"></script>
    <script type="text/javascript" src="{{ asset('files\custom\parsley\parsley.min.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"
        integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"
        integrity="sha512-OmBbzhZ6lgh87tQFDVBHtwfi6MS9raGmNvUNTjDIBb/cgv707v9OuBVpsN6tVVTLOehRFns+o14Nd0/If0lE/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var varies = @json($product->variations);
        window.varies = JSON.parse(varies);
        window.product = @json($product);
        var cat_id = "{{ $product->cat_id }}";
        // console.log(window.product)

        if (cat_id == 17) {
            agelimit();
        }
    </script>
@endsection
