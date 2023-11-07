@extends('user.layouts.app')

@section('title')
greenguardexpress.lk | Home
@endsection

@section('styles')
@endsection

@section('content')
<!-- Block Spotlight1  -->
<section class="so-spotlight1 ">
    <div class="container">
        <div class="row">
            <div id="yt_header_right" class="col-lg-offset-3 col-lg-9 col-md-12">
                <div class="slider-container">

                    {{-- <div class="module first-block">
                            <div class="modcontent clearfix">
                                <div id="custom_popular_search" class="clearfix">
                                    <h5 class="so-searchbox-popular-title pull-left">Top Search:</h5>
                                    <div class="so-searchbox-keyword">
                                        <ul class="list-inline">
                                            <li>&nbsp;<a href="#">Acer,</a></li>
                                            <li><a href="#">APPLE,</a></li>
                                            <li><a href="#">Black,</a></li>
                                            <li><a href="#">Canon,</a></li>
                                            <li><a href="#">Cogs,</a></li>
                                            <li><a href="#">Confi,</a></li>
                                            <li><a href="#">Kate,</a></li>
                                            <li><a href="#">Lor,</a></li>
                                            <li><a href="#">Product,</a></li>
                                            <li><a href="#">Zolof The Rock And Roll Destroyer</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    <div id="so-slideshow" class="col-lg-8 col-md-8 col-sm-12 col-xs-12 two-block">
                        <div class="module no-margin">
                            <div class="yt-content-slider yt-content-slider--arrow1" data-rtl="yes" data-autoplay="yes"
                                data-autoheight="no" data-delay="2" data-speed="0.6" data-margin="0"
                                data-items_column0="1" data-items_column1="1" data-items_column2="1"
                                data-items_column3="1" data-items_column4="1" data-arrows="yes" data-pagination="no"
                                data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                                <div class="yt-content-slide">
                                    <a href="{{ $banners->main_banner_1_redirect }}"><img
                                            src="{{ $banners->main_banner_path_1 }}" alt="slider1"
                                            class="img-responsive"></a>
                                </div>
                                <div class="yt-content-slide">
                                    <a href="{{ $banners->main_banner_2_redirect }}"><img
                                            src="{{ $banners->main_banner_path_2 }}" alt="slider2"
                                            class="img-responsive"></a>
                                </div>
                                <div class="yt-content-slide">
                                    <a href="{{ $banners->main_banner_3_redirect }}"><img
                                            src="{{ $banners->main_banner_path_3 }}" alt="slider3"
                                            class="img-responsive"></a>
                                </div>
                            </div>

                            <div class="loadeding"></div>
                        </div>
                    </div>
                    <div class="module row hidden-lg hidden-md">
                        <div class="col-xs-6 col-sm-4 sm-banner">
                            <div class="banners">
                                <div>
                                    <a href="{{ $banners->banner_image_sm_1_redirect }}"><img
                                            src="{{ $banners->banner_image_sm_1 }}" alt="banner1"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-4 sm-banner">
                            <div class="banners">
                                <div>
                                    <a href="{{ $banners->banner_image_sm_2_redirect }}"><img
                                            src="{{ $banners->banner_image_sm_2 }}" alt="banner1"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-4 sm-banner hidden-xs">
                            <div class="banners">
                                <div>
                                    <a href="{{ $banners->banner_image_sm_3_redirect }}"><img
                                            src="{{ $banners->banner_image_sm_3 }}" alt="banner1"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="module col-md-4 col-xs-12 hidden-sm hidden-xs three-block ">
                        <div class="modcontent clearfix">
                            <div class="htmlcontent-block">
                                <ul class="htmlcontent-home">
                                    <li>
                                        <div class="banners">
                                            <div>
                                                <a href="{{ $banners->banner_image_sm_1_redirect }}"><img
                                                        src="{{ $banners->banner_image_sm_1 }}" alt="banner1"></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="banners">
                                            <div>
                                                <a href="{{ $banners->banner_image_sm_2_redirect }}"><img
                                                        src="{{ $banners->banner_image_sm_2 }}" alt="banner1"></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="banners">
                                            <div>
                                                <a href="{{ $banners->banner_image_sm_3_redirect }}"><img
                                                        src="{{ $banners->banner_image_sm_3 }}" alt="banner1"></a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="module hidden-xs col-sm-12 four-block">
                        <div class="modcontent clearfix">
                            <div class="policy-detail">
                                <div class="banner-policy">
                                    <div class="policy policy1"><a href="#">
                                            {{-- <i class="fas fa-circle-notch fa-spin"></i> --}}
                                            <span class="ico-policy">&nbsp;</span> 30 day <br> money back </a>
                                    </div>
                                    <div class="policy policy2"><a href="#"> <span class="ico-policy">&nbsp;</span>
                                            In-store exchange </a></div>
                                    <div class="policy policy3"><a href="#"> <span class="ico-policy">&nbsp;</span>
                                            lowest price guarantee </a>
                                    </div>
                                    <div class="policy policy4"><a href="#"> <span class="ico-policy">&nbsp;</span>
                                            shopping guarantee </a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //Block Spotlight1  -->

<!-- Main Container  -->
<div class="main-container container">

    <div class="row">
        <div id="content" class="col-sm-12">
            <div class="related titleLine products-list grid module ">
                <h3 class="modtitle">Flash Deals </h3>
                <div class="releate-products">
                    @foreach ($featured as $item)
                    <div class="product-layout">
                        <a href="{{ route('user.view.product', [$item->id, $item->metaname]) }}">
                            <div class="product-item-container">
                                <div class="left-block">
                                    <div class="product-image-container lazy second_img ">
                                        <img data-src="{{ $item->image1_path }}" src="{{ $item->image1_path }}"
                                            alt="{{ $item->title }}&quot;" class="img-responsive" />
                                        @if ($item->image2_path)
                                        <img data-src="{{ $item->image2_path }}" src="{{ $item->image2_path }}"
                                            alt="{{ $item->title }}&quot;" class="img_0 img-responsive" />
                                        @endif
                                    </div>
                                    <!--Sale Label-->
                                    @if ($item->discount_pre)
                                    <span class="label label-sale">Sale</span>
                                    @endif
                                    @if ($item->is_new)
                                    <span class="label label-new">New</span>
                                    @endif
                                    <div class="countdown_box">
                                        <div class="countdown_inner">
                                            <div class="title">This limited offer ends</div>

                                            <div class="defaultCountdown-30"></div>
                                        </div>
                                    </div>
                                    <!--countdown box-->
                                    {{-- <div class="countdown_box">
                                                    <div class="countdown_inner">
                                                        <div class="title">This limited offer ends</div>
    
                                                        <div class="defaultCountdown-30"></div>
                                                    </div>
                                                </div> --}}
                                    <!--end countdown box-->

                                    <!--full quick view block-->
                                    {{-- <a href="{{ route('user.view.product', [$item->id, $item->metaname]) }}"
                                    class="quickview visible-lg"> View Product
                        </a> --}}
                        <!--end full quick view block-->
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
                                <span class="price-old">Rs.{{ number_format($item->price, 2) }}</span>
                                <span class="label label-percent-featured">-{{ $item->discount_pre }}%</span>
                                @else
                                <span class="price-new">Rs.{{ number_format($item->price, 2) }}</span>
                                @endif
                            </div>
                            <div class="description item-desc hidden">
                                <p>{{ $item->small_description }}</p>
                            </div>
                        </div>

                        {{-- <div class="button-group">
                                                <button class="addToCart" type="button" data-toggle="tooltip"
                                                    title="Add to Cart" onclick="cart.add('42', '1');"><i
                                                        class="fa fa-shopping-cart"></i> <span class="hidden-xs">Add to
                                                        Cart</span></button>
                                                <button class="wishlist" type="button" data-toggle="tooltip"
                                                    title="Add to Wish List"
                                                    onclick="wishlist.add({{ $item->id }}, '{{ $item->image1_path }}' ,
                        '{{ $item->title }}');"><i id="" class="icon_{{ $item->id }} fa fa-heart-o"></i></button>
                        <button class="compare" type="button" data-toggle="tooltip" title="Compare this Product"
                            onclick="compare.add('42');"><i class="fa fa-exchange"></i></button>
                    </div> --}}
                </div><!-- right block -->

            </div>
            </a>
        </div>
        @endforeach

    </div>
</div>
<div class="module">
    <div class="modcontent clearfix">
        <div class="banner-wraps ">
            <div class="m-banner row text-center">
                <div class="banner htmlconten1 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="banners">
                        <div>
                            <a href="{{ $banners->middle_banner_lg_1_redirect }}"><img
                                    src="{{ $banners->middle_banner_lg_1 }}" alt="banner1"></a>
                        </div>
                    </div>
                </div>
                <div class="htmlconten2 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="module banners">
                        <div>
                            <a href="{{ $banners->middle_banner_sm_1_redirect }}"><img
                                    src="{{ $banners->middle_banner_sm_1 }}" alt="banner1"></a>
                        </div>
                    </div>

                    <div class="banners">
                        <div>
                            <a href="{{ $banners->middle_banner_sm_2_redirect }}"><img
                                    src="{{ $banners->middle_banner_sm_2 }}" alt="banner1"></a>
                        </div>
                    </div>

                </div>
                <div class="banner htmlconten3 hidden-sm col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="banners">
                        <div>
                            <a href="{{ $banners->middle_banner_lg_2_redirect }}"><img
                                    src="{{ $banners->middle_banner_lg_2 }}" alt="banner1"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="related titleLine products-list grid module hidden-sm hidden-xs">
    <h3 class="modtitle">New Products </h3>
    <div class="releate-products ">
        @foreach ($new as $item)
        <div class="product-layout">
            <a href="{{ route('user.view.product', [$item->id, $item->metaname]) }}">
                <div class="product-item-container">
                    <div class="left-block">
                        <div class="product-image-container lazy second_img ">
                            <img data-src="{{ $item->image1_path }}" src="{{ $item->image1_path }}"
                                alt="{{ $item->title }}&quot;" class="img-responsive" />
                            @if ($item->image2_path)
                            <img data-src="{{ $item->image2_path }}" src="{{ $item->image2_path }}"
                                alt="{{ $item->title }}&quot;" class="img_0 img-responsive" />
                            @endif
                        </div>
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
                                <a class="demo-1"
                                    href="{{ route('user.view.product', [$item->id, $item->metaname]) }}">{{ $item->title }}&quot;</a>
                            </h4>
                            <div class="price">
                                @if ($item->discount_pre)
                                <span
                                    class="price-new">Rs.{{ number_format($item->price - $item->discount_price, 2) }}</span>
                                <span class="price-old">Rs.{{ number_format($item->price, 2) }}</span>
                                <span class="label label-percent">-{{ $item->discount_pre }}%</span>
                                @else
                                <span class="price-new">Rs.{{ number_format($item->price, 2) }}</span>
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
            <h3 class="modtitle">Deals of the days</h3>
        </div>
        <div class="col-xs-3 text-right">
            <a href="/products/all/all" class="btn-view">View All</a>
        </div>
    </div>
    <div class="products-list row grid">
        @foreach ($new as $item)
        <div class="product-layout col-md-4 col-sm-6 col-xs-6">
            <a href="{{ route('user.view.product', [$item->id, $item->metaname]) }}">
                <div class="product-item-container">
                    <div class="left-block">
                        <div class="product-image-container lazy second_img ">
                            <img data-src="{{ $item->image1_path }}" src="{{ $item->image1_path }}"
                                alt="{{ $item->title }}&quot;" class="img-responsive" />
                            @if ($item->image2_path)
                            <img data-src="{{ $item->image2_path }}" src="{{ $item->image2_path }}"
                                alt="{{ $item->title }}&quot;" class="img_0 img-responsive" />
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
                                <span class="price-old">Rs.{{ number_format($item->price, 2) }}</span>
                                <span class="label label-percent">-{{ $item->discount_pre }}%</span>
                                @else
                                <span class="price-new">Rs.{{ number_format($item->price, 2) }}</span>
                                <span class="price-old"></span>
                                <span class="label label-percent"></span>
                                @endif
                            </div>
                            <div class="description item-desc hidden">
                                <p>{{ $item->small_description }}</p>
                            </div>
                        </div>

                        {{-- <div class="button-group">
                                                <button class="addToCart" type="button" data-toggle="tooltip"
                                                    title="Add to Cart" onclick="cart.add('42', '1');"><i
                                                        class="fa fa-shopping-cart"></i> <span class="hidden-xs">Add to
                                                        Cart</span></button>
                                                <button class="wishlist" type="button" data-toggle="tooltip"
                                                    title="Add to Wish List"
                                                    onclick="wishlist.add({{ $item->id }}, '{{ $item->image1_path }}' ,
                        '{{ $item->title }}');"><i id="" class="icon_{{ $item->id }} fa fa-heart-o"></i></button>
                        <button class="compare" type="button" data-toggle="tooltip" title="Compare this Product"
                            onclick="compare.add('42');"><i class="fa fa-exchange"></i></button>
                    </div> --}}
                </div><!-- right block -->

        </div>
        </a>
    </div>
    {{-- <div class="clearfix visible-xs-block"></div> --}}
    @endforeach
</div>
</div>
<div class="related titleLine products-list grid module hidden-lg hidden-md">
    <div class="row">
        <div class="col-xs-9">
            <h3 class="modtitle">Trending Products</h3>
        </div>
        <div class="col-xs-3 text-right">
            <a href="/products/all/all" class="btn-view">View All</a>
        </div>
    </div>
    <div class="products-list row grid">
        @foreach ($featured as $item)
        <div class="product-layout col-md-4 col-sm-6 col-xs-6">
            <a href="{{ route('user.view.product', [$item->id, $item->metaname]) }}">
                <div class="product-item-container">
                    <div class="left-block">
                        <div class="product-image-container lazy second_img ">
                            <img data-src="{{ $item->image1_path }}" src="{{ $item->image1_path }}"
                                alt="{{ $item->title }}&quot;" class="img-responsive" />
                            @if ($item->image2_path)
                            <img data-src="{{ $item->image2_path }}" src="{{ $item->image2_path }}"
                                alt="{{ $item->title }}&quot;" class="img_0 img-responsive" />
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
                                <span class="price-old">Rs.{{ number_format($item->price, 2) }}</span>
                                <span class="label label-percent">-{{ $item->discount_pre }}%</span>
                                @else
                                <span class="price-new">Rs.{{ number_format($item->price, 2) }}</span>
                                <span class="price-old"></span>
                                <span class="label label-percent"></span>
                                @endif
                            </div>
                            <div class="description item-desc hidden">
                                <p>{{ $item->small_description }}</p>
                            </div>
                        </div>

                        {{-- <div class="button-group">
                                                <button class="addToCart" type="button" data-toggle="tooltip"
                                                    title="Add to Cart" onclick="cart.add('42', '1');"><i
                                                        class="fa fa-shopping-cart"></i> <span class="hidden-xs">Add to
                                                        Cart</span></button>
                                                <button class="wishlist" type="button" data-toggle="tooltip"
                                                    title="Add to Wish List"
                                                    onclick="wishlist.add({{ $item->id }}, '{{ $item->image1_path }}' ,
                        '{{ $item->title }}');"><i id="" class="icon_{{ $item->id }} fa fa-heart-o"></i></button>
                        <button class="compare" type="button" data-toggle="tooltip" title="Compare this Product"
                            onclick="compare.add('42');"><i class="fa fa-exchange"></i></button>
                    </div> --}}
                </div><!-- right block -->

        </div>
        </a>
    </div>
    {{-- <div class="clearfix visible-xs-block"></div> --}}
    @endforeach
</div>
</div>
<div class="related titleLine products-list grid module hidden-lg hidden-md">
    <div class="row">
        <div class="col-xs-9">
            <h3 class="modtitle">New Arrivals</h3>
        </div>
        <div class="col-xs-3 text-right">
            <a href="/products/all/all" class="btn-view">View All</a>
        </div>
    </div>
    <div class="products-list row grid">
        @foreach ($new as $item)
        <div class="product-layout col-md-4 col-sm-6 col-xs-6">
            <a href="{{ route('user.view.product', [$item->id, $item->metaname]) }}">
                <div class="product-item-container">
                    <div class="left-block">
                        <div class="product-image-container lazy second_img ">
                            <img data-src="{{ $item->image1_path }}" src="{{ $item->image1_path }}"
                                alt="{{ $item->title }}&quot;" class="img-responsive" />
                            @if ($item->image2_path)
                            <img data-src="{{ $item->image2_path }}" src="{{ $item->image2_path }}"
                                alt="{{ $item->title }}&quot;" class="img_0 img-responsive" />
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
                                <span class="price-old">Rs.{{ number_format($item->price, 2) }}</span>
                                <span class="label label-percent">-{{ $item->discount_pre }}%</span>
                                @else
                                <span class="price-new">Rs.{{ number_format($item->price, 2) }}</span>
                                <span class="price-old"></span>
                                <span class="label label-percent"></span>
                                @endif
                            </div>
                            <div class="description item-desc hidden">
                                <p>{{ $item->small_description }}</p>
                            </div>
                        </div>

                        {{-- <div class="button-group">
                                                <button class="addToCart" type="button" data-toggle="tooltip"
                                                    title="Add to Cart" onclick="cart.add('42', '1');"><i
                                                        class="fa fa-shopping-cart"></i> <span class="hidden-xs">Add to
                                                        Cart</span></button>
                                                <button class="wishlist" type="button" data-toggle="tooltip"
                                                    title="Add to Wish List"
                                                    onclick="wishlist.add({{ $item->id }}, '{{ $item->image1_path }}' ,
                        '{{ $item->title }}');"><i id="" class="icon_{{ $item->id }} fa fa-heart-o"></i></button>
                        <button class="compare" type="button" data-toggle="tooltip" title="Compare this Product"
                            onclick="compare.add('42');"><i class="fa fa-exchange"></i></button>
                    </div> --}}
                </div><!-- right block -->

        </div>
        </a>
    </div>
    {{-- <div class="clearfix visible-xs-block"></div> --}}
    @endforeach
</div>
</div>

{{-- <div class="module no-margin titleLine hidden-xs hidden-sm">
                    <h3 class="modtitle">COLLECTIONS</h3>
                    <div class="modcontent clearfix">
                        <div id="collections_block" class="clearfix  block">
                            <ul class="width6">
                                <li class="collect collection_0">
                                    <div class="color_co"><a href="#">Furniture</a> </div>
                                </li>
                                <li class="collect collection_1">
                                    <div class="color_co"><a href="#">Gift idea</a> </div>
                                </li>
                                <li class="collect collection_2">
                                    <div class="color_co"><a href="#">Cool gadgets</a> </div>
                                </li>
                                <li class="collect collection_3">
                                    <div class="color_co"><a href="#">Outdoor activities</a> </div>
                                </li>
                                <li class="collect collection_4">
                                    <div class="color_co"><a href="#">Accessories for</a> </div>
                                </li>
                                <li class="collect collection_5">
                                    <div class="color_co"><a href="#">Women world</a> </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
<div class="module no-margin titleLine hidden-lg hidden-md">
    <h3 class="modtitle">HOT CATEGORIES</h3>
    <div class="modcontent clearfix">
        <div id="collections_block" class="clearfix  block">
            <ul class="width6">
                <li class="collect collection_0">
                    <div class="color_co"><a href="/products/my-electronics/all">My Electronics</a> </div>
                </li>
                <li class="collect collection_1">
                    <div class="color_co"><a href="/products/my-home-garden/all">My Home & Garden</a>
                    </div>
                </li>
                <li class="collect collection_2">
                    <div class="color_co"><a href="/products/my-phone-accessories/all">My Phone & Acc</a>
                    </div>
                </li>
                <li class="collect collection_3">
                    <div class="color_co"><a href="/products/my-health-beauty/all">My Health & Beauty</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

</div>
</div>
</div>
<!-- //Main Container -->
<!-- Block Spotlight3  -->
<section class="so-spotlight3 hidden-sm hidden-xs">
    <div class="container">
        <div class="row">
            <div id="so_categories_173761471880018"
                class="so-categories module titleLine preset01-4 preset02-3 preset03-3 preset04-1 preset05-1">
                <h3 class="modtitle">Hot Categories</h3>

                <div class="wrap-categories">
                    <div class="cat-wrap theme3">
                        @foreach ($hot_cats as $ht)
                        <div class="content-box">
                            <div class="image-cat">
                                <a href="{{ route('user.products.get', [$ht->metaname, 'all']) }}" title="Automotive"
                                    target="_blank">
                                    <img src="{{ $ht->image1_path }}" title="Automotive" alt="Automotive">
                                </a>
                                <a class="btn-viewmore hidden-xs"
                                    href="{{ route('user.products.get', [$ht->metaname, 'all']) }}"
                                    title="View more">View
                                    more</a>
                            </div>
                            <div class="inner">
                                <div class="title-cat"> <a
                                        href="{{ route('user.products.get', [$ht->metaname, 'all']) }}"
                                        title="Automotive " target="_blank">{{ $ht->title }}</a> </div>
                                <div class="child-cat">
                                    @foreach ($subcats as $sb)
                                    @if ($ht->id == $sb->category_id)
                                    <div class="child-cat-title"> <a title="More Car Accessories"
                                            href="{{ route('user.products.get', [$ht->metaname, $sb->metaname]) }}"
                                            target="_blank">{{ $sb->subcat_name }}</a> </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="clr1"></div>
                        @endforeach



                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="newsletter-section">
    <div class="container">
        <div class="row text-center">
            <div class="col-sm-4 col-xs-12">
                <div>
                    <h3 class="newsletter-title"><i class="fa fa-envelope-o" aria-hidden="true"></i> <b>Sign up to
                            Newsletter</b></h3>
                    <p class="newsletter-p">Get updates on discount & counpons.</p>
                </div>
            </div>
            <div class="col-sm-7 col-xs-12">
                <div class="email display-flex m-t-10">
                    <input type="email" placeholder="Your email address..." value="" class="form-control" id="txtemail"
                        name="txtemail">
                    <button class="button-search btn btn-primary" type="submit" onclick="return subscribe_newsletter();"
                        name="submit">Subscribe
                    </button>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- //Block Spotlight3  -->
<script type="text/javascript">
// var $typeheader = 'header-home1';
</script>
@endsection

@section('scripts')
<script>
// $(document).ready(function() {
//     $(".owl-carousel").owlCarousel();
// });
</script>
@endsection