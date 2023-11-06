<div class="product-layout col-md-4 col-sm-6 col-xs-6">
    <a href="{{ route('user.view.product', [$item->id, $item->metaname]) }}">
        <div class="product-item-container">
            <div class="left-block">
                <div class="product-image-container lazy second_img ">
                    <img data-src="{{ $item->image1_path }}"
                        src="{{ $item->image1_path }}" alt="{{ $item->title }}&quot;"
                        class="img-responsive" />
                    <img data-src="{{ $item->image2_path }}"
                        src="{{ $item->image2_path }}" alt="{{ $item->title }}&quot;"
                        class="img_0 img-responsive" />
                </div>
                <!--Sale Label-->
                @if ($item->discount_pre)
                    <span class="label label-sale">Sale</span>
                @endif
                @if ($item->is_new)
                    <span class="label label-new">New</span>
                @endif

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
                class="quickview visible-lg"> View Product</a> --}}
                <!--end full quick view block-->
            </div>


            <div class="right-block">
                <div class="caption">
                    <h4 class="wrap-text">
                        <a class="demo-2"
                            href="{{ route('user.view.product', [$item->id, $item->metaname]) }}">{{ $item->title }}&quot;</a>
                    </h4>
                    {{-- <div class="ratings">
                    <div class="rating-box">
                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i
                                class="fa fa-star-o fa-stack-1x"></i></span>
                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i
                                class="fa fa-star-o fa-stack-1x"></i></span>
                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i
                                class="fa fa-star-o fa-stack-1x"></i></span>
                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i
                                class="fa fa-star-o fa-stack-1x"></i></span>
                        <span class="fa fa-stack"><i
                                class="fa fa-star-o fa-stack-1x"></i></span>
                    </div>
                </div> --}}

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

                {{-- <div class="button-group">
                <button class="addToCart" type="button" data-toggle="tooltip"
                    title="Add to Cart" onclick="cart.add('42', '1');"><i
                        class="fa fa-shopping-cart"></i> <span class="hidden-xs">Add to
                        Cart</span></button>
                <button class="wishlist" type="button" data-toggle="tooltip"
                    title="Add to Wish List"
                    onclick="wishlist.add({{ $item->id }}, '{{ $item->image1_path }}' , '{{ $item->title }}');"><i
                        id="" class="icon_{{ $item->id }} fa fa-heart-o"></i></button>
                <button class="compare" type="button" data-toggle="tooltip"
                    title="Compare this Product" onclick="compare.add('42');"><i
                        class="fa fa-exchange"></i></button>
            </div> --}}
            </div><!-- right block -->

        </div>
    </a>
</div>