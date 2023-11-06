@extends('user.layouts.app')

@section('title')
    Myproduct.lk | Categories
@endsection

@section('styles')
@endsection

@section('content')
    <!-- Main Container  -->
    <div class="main-container container">
        

        <div class="row">
            <!--Left Part Start -->
            <aside class="col-sm-12 col-md-12 col-xs-12" id="column-left">
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
            </aside>
            <!--Left Part End -->

            <!--Middle Part Start-->
           


        </div>
        <!--Middle Part End-->
    </div>
    <!-- //Main Container -->
@endsection

@section('scripts')
@endsection
