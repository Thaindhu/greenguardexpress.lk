@extends('user.layouts.app')

@section('title')
    greenguardexpress.lk | Login
@endsection

@section('styles')
@endsection

@section('content')
    <!-- Main Container  -->
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li><a href="#">Account</a></li>
            <li><a href="#">My Wish List</a></li>
        </ul>

        <div class="row">
            @include('user.layouts.profile_sidebar')
            <!--Middle Part Start-->
            <div id="content" class="col-sm-9">
                <h2 class="title">My Wish List</h2>
                <div class="table-responsive">

                    @if ($wishlist->isEmpty())
                        <p>Your wishlist is empty. <a href="#">Continue shopping</a></p>
                    @else
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td class="text-center">Image</td>
                                    <td class="text-left">Product Name</td>
                                    <td class="text-right">Stock</td>
                                    <td class="text-right">Unit Price</td>
                                    <td class="text-right">Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wishlist as $item)
                                    <tr id="tr_{{ $item->id }}">
                                        <td class="text-center">
                                            <a href="{{ route('user.view.product', [$item->id, $item->metaname]) }}"><img
                                                    width="70px" src="{{ $item->image1_path }}" alt="{{ $item->title }}"
                                                    title="{{ $item->title }}">
                                            </a>
                                        </td>
                                        <td class="text-left"><a
                                                href="{{ route('user.view.product', [$item->id, $item->metaname]) }}">{{ $item->title }}</a>
                                        </td>
                                        <td class="text-right">{{ $item->is_available ? 'Out of stock' : 'In Stock' }}</td>
                                        <td class="text-right">
                                            <div class="price"> <span
                                                    class="price-new">Rs.{{ number_format($item->price - $item->discount_price, 2) }}</span>
                                                <span class="price-old">Rs.{{ number_format($item->price, 2) }}</span>
                                            </div>

                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('user.view.product', [$item->id, $item->metaname]) }}"
                                                title="" data-toggle="tooltip" type="button"
                                                class="btn btn-primary m-b-10" data-original-title="View Product"><i
                                                    class="fa fa-eye"></i>
                                            </a>
                                            <a class="btn btn-danger" title=""
                                                onclick="wishlist.remove({{ $item->id }}, '{{ $item->image1_path }}' , '{{ $item->title }}');"
                                                data-toggle="tooltip" href="javascript:void(0)"
                                                data-original-title="Remove"><i
                                                    class="icon_{{ $item->id }} fa fa-times"></i></a>
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
@endsection
