@extends('user.layouts.app')

@section('title')
    greenguardexpress.lk | {{ $cat_name }}
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
        integrity="sha512-DIW4FkYTOxjCqRt7oS9BFO+nVOwDL4bzukDyDtMO7crjUZhwpyrWBFroq+IqRe6VnJkTpRAS6nhDvf0w+wHmxg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <!-- Main Container  -->
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li><a href="#">{{ $cat_name }}</a></li>
            <li><a href="#">{{ $subcat_name }}</a></li>
        </ul>

        <div class="row">
            <!--Left Part Start -->
            <aside class="col-sm-4 col-md-3 hidden-xs hidden-sm" id="column-left">
                <div class="module menu-category titleLine">
                    <h3 class="modtitle">Categories</h3>
                    <div class="modcontent">
                        <div class="box-category">
                            <ul id="cat_accordion" class="list-group">
                                @foreach ($cats as $item)
                                    <li class="hadchild"><a
                                            href="{{ route('user.products.get', [$item->metaname, 'all']) }}"
                                            class="cutom-parent">{{ $item->cat_name }}</a> <span
                                            class="button-view  fa fa-plus-square-o"></span>
                                        <ul style="display: block;">
                                            @foreach ($subcats as $sb)
                                                @if ($item->cat_id == $sb->category_id)
                                                    <li><a
                                                            href="{{ route('user.products.get', [$item->metaname, $sb->metaname]) }}">{{ $sb->subcat_name }}</a>
                                                    </li>
                                                @endif
                                            @endforeach

                                        </ul>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="module latest-product titleLine">
                    <h3 class="modtitle">Latest Product</h3>
                    <div class="modcontent ">
                        @foreach ($new_products as $nw)
                            <div class="product-latest-item">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="{{ route('user.view.product', [$nw->pro_id, $nw->metaname]) }}"><img
                                                src="{{ $nw->image1_path }}" alt="Cisi Chicken" title="Cisi Chicken"
                                                class="img-responsive" style="width: 100px; height: 82px;"></a>
                                    </div>
                                    <div class="media-body">
                                        <div class="caption">
                                            <h4 class="product-title"><a
                                                    href="{{ route('user.view.product', [$nw->pro_id, $nw->metaname]) }}">
                                                    {{ strlen($nw->title) > 30 ? substr($nw->title, 0, 30) . '...' : $nw->title }}
                                                </a></h4>
                                            <div class="price">
                                                <span class="price-new">Rs.
                                                    {{ number_format($nw->price - $nw->discount_price, 2) }}</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="module">
                    <div class="modcontent clearfix">
                        <div class="banners">
                            <div>
                                <a href="#"><img src="/assets-front/image/demo/cms/left-image-static.png"
                                        alt="left-image"></a>
                            </div>
                        </div>

                    </div>
                </div>
            </aside>
            <!--Left Part End -->

            <!--Middle Part Start-->
            <div id="content" class="col-md-9 col-sm-8">
                <div class="products-category">
                    {{-- <div class="category-derc">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="banners">
                                    <div>
                                        <a href="#"><img
                                                src="/assets-front/image/demo/shop/category/electronic-cat.png"
                                                alt="Apple Cinema 30&quot;"><br></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div> --}}
                    <!-- Filters -->
                    <div class="product-filter filters-panel">
                        <div class="row">
                            <div class="col-md-2 visible-lg">
                                <div class="view-mode">
                                    <div class="list-view">
                                        <button class="btn btn-default grid" data-view="grid" data-toggle="tooltip"
                                            data-original-title="Grid"><i class="fa fa-th"></i></button>
                                        <button class="btn btn-default list active" data-view="list" data-toggle="tooltip"
                                            data-original-title="List"><i class="fa fa-th-list"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="short-by-show form-inline text-right col-md-10 col-sm-10 col-xs-12">
                                <div class="form-group short-by">
                                    {{-- <label class="control-label" for="input-sort">Sort By:</label> --}}
                                    <select id="input-sort" class="form-control" onchange="filter(this.value)">
                                        <option value disabled selected>Sort By</option>
                                        <option value="default"
                                            {{ app('request')->input('sortby') == null ? 'selected' : null }}>Default
                                        </option>
                                        <option value="asc"
                                            {{ app('request')->input('sortby') == 'asc' ? 'selected' : null }}>Name (A -
                                            Z)</option>
                                        <option {{ app('request')->input('sortby') == 'desc' ? 'selected' : null }}
                                            value="desc">Name (Z - A)</option>
                                        <option {{ app('request')->input('sortby') == 'price-low' ? 'selected' : null }}
                                            value="price-low">Price (Low &gt; High)</option>
                                        <option {{ app('request')->input('sortby') == 'price-high' ? 'selected' : null }}
                                            value="price-high">Price (High &gt; Low)</option>
                                        {{-- <option value="">Rating (Highest)</option>
                                        <option value="">Rating (Lowest)</option>
                                        <option value="">Model (A - Z)</option>
                                        <option value="">Model (Z - A)</option> --}}
                                    </select>
                                </div>
                                {{-- <div class="form-group">
                                    <label class="control-label" for="input-limit">Show:</label>
                                    <select id="input-limit" class="form-control" onchange="location = this.value;">
                                        <option value="" selected="selected">9</option>
                                        <option value="">25</option>
                                        <option value="">50</option>
                                        <option value="">75</option>
                                        <option value="">100</option>
                                    </select>
                                </div> --}}
                            </div>
                            {{-- <div class="box-pagination col-md-3 col-sm-4 col-xs-12 text-right">
                                <ul class="pagination">
                                    <li class="active"><span>1</span></li>
                                    <li><a href="">2</a></li>
                                    <li><a href="">&gt;</a></li>
                                    <li><a href="">&gt;|</a></li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                    <!-- //end Filters -->
                    <!--changed listings-->
                    <div class="products-list row grid">
                        @foreach ($products as $item)
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
                            {{-- <div class="clearfix visible-xs-block"></div> --}}
                        @endforeach
                    </div>
                    <!--// End Changed listings-->
                    <!-- Filters -->
                    {{ $products->onEachSide(2)->links('user.pagination') }}
                    <!-- //end Filters -->

                </div>

            </div>


        </div>
        <!--Middle Part End-->
    </div>
    <!-- //Main Container -->
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"
        integrity="sha512-OmBbzhZ6lgh87tQFDVBHtwfi6MS9raGmNvUNTjDIBb/cgv707v9OuBVpsN6tVVTLOehRFns+o14Nd0/If0lE/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var cat_id = "{{ app('request')->input('cat_id') }}";
        var cat_name = "{{ $cat_name }}";

        // function filter(val) {
        //     // var url = document.URL + "&sortby=" + val;
        //     // var url = 
        //     window.location.href = url + "?query=" + keyword + "&cat_id=" + cat_id + "&sortby=" + val;
        //     // console.log(url)
        // }
        if (cat_name == "My Sexual Wellness" || cat_id == 17){
            agelimit();
        }

       
    </script>
@endsection
