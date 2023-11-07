@extends('admin.layouts.master')

@section('title')
    greenguardexpress.lk | Admin Area
@endsection

@section('styles')
    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('files\bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('files\assets\pages\data-table\css\buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('files\bower_components\datatables.net-responsive-bs4\css\responsive.bootstrap4.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        #chartdiv {
            width: 100%;
            height: 300px;
        }
    </style>
@endsection



@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">

                    <!-- Page-header end -->
                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-block">
                                        <h5><b>Summery</b> ({{ now()->format('F Y') }})</h5>
                                        <hr>
                                        <div class="row">

                                            <div class="col-md-12 col-xl-4">
                                                <div class="card widget-statstic-card">
                                                    <div class="card-header">
                                                        <div class="card-header-left">
                                                            <h5>Revenue</h5>
                                                            {{-- <p class="p-t-10 m-b-0 text-c-yellow">Current Month</p> --}}
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <i class="feather icon-sliders st-icon bg-c-yellow"></i>
                                                        <div class="text-left">
                                                            <h3 class="d-inline-block">Rs.{{ number_format($total_sales, 2) }}</h3>
                                                            <i class="feather icon-arrow-up f-30 text-c-green"></i>
                                                            <span class="f-right bg-c-yellow">0.0%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-4">
                                                <div class="card widget-statstic-card">
                                                    <div class="card-header">
                                                        <div class="card-header-left">
                                                            <h5>New Orders</h5>
                                                            {{-- <p class="p-t-10 m-b-0 text-c-blue">0.0% From last month</p> --}}
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <i class="feather icon-shopping-cart st-icon bg-c-blue"></i>
                                                        <div class="text-left">
                                                            <h3 class="d-inline-block">{{ $total_orders }}</h3>
                                                            <i class="feather icon-arrow-up text-c-green f-30 "></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-4">
                                                <div class="card widget-statstic-card">
                                                    <div class="card-header">
                                                        <div class="card-header-left">
                                                            <h5>Total Sales</h5>
                                                            {{-- <p class="p-t-10 m-b-0 text-c-pink">55% From last 28 hours</p> --}}
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <i class="feather icon-users st-icon bg-c-pink txt-lite-color"></i>
                                                        <div class="text-left">
                                                            <h3 class="d-inline-block">
                                                                Rs.{{ number_format($total_sales, 2) }}
                                                            </h3>
                                                            <i class="feather icon-arrow-up text-c-pink f-30 "></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="card bg-c-green text-white widget-visitor-card">
                                                    <div class="card-block-small text-center">
                                                        <h2>{{ $total_users }}</h2>
                                                        <h6>Registered Users</h6>
                                                        <i class="feather icon-user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="card bg-c-blue text-white widget-visitor-card">
                                                    <div class="card-block-small text-center">
                                                        <h2>{{ $total_products }}</h2>
                                                        <h6>Active Products</h6>
                                                        <i class="feather icon-file-text"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="card bg-c-yellow text-white widget-visitor-card">
                                                    <div class="card-block-small text-center">
                                                        <h2>{{ $total_pending_orders }}</h2>
                                                        <h6>Orders Processing in Que</h6>
                                                        <i class="feather icon-award"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="card bg-c-pink text-white widget-visitor-card">
                                                    <div class="card-block-small text-center">
                                                        <h2>{{ $total_out_stock }}</h2>
                                                        <h6>Products out of stock</h6>
                                                        <i class="feather icon-help-circle"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h5><b>Quick Access</b></h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col-xl-3 col-md-6">
                                                <a href="{{ route('admin.dashboard') }}">
                                                    <div class="card">
                                                        <div class="card-block">
                                                            <div class="row align-items-center m-l-0">
                                                                <div class="col-auto">
                                                                    <i class="feather icon-plus f-30 text-c-green"></i>
                                                                </div>
                                                                <div class="col-auto">
                                                                    {{-- <h6 class="text-muted m-b-10"></h6> --}}
                                                                    <h6 class="m-b-0">Create Product</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <a href="/products">
                                                    <div class="card">
                                                        <div class="card-block">
                                                            <div class="row align-items-center m-l-0">
                                                                <div class="col-auto">
                                                                    <i class="feather icon-plus f-30 text-c-pink"></i>
                                                                </div>
                                                                <div class="col-auto">
                                                                    {{-- <h6 class="text-muted m-b-10"></h6> --}}
                                                                    <h6 class="m-b-0">Product List</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <a href="/admin/orders">
                                                    <div class="card">
                                                        <div class="card-block">
                                                            <div class="row align-items-center m-l-0">
                                                                <div class="col-auto">
                                                                    <i class="feather icon-eye f-30 text-c-lite-blue"></i>
                                                                </div>
                                                                <div class="col-auto">
                                                                    {{-- <h6 class="text-muted m-b-10"></h6> --}}
                                                                    <h6 class="m-b-0">View Orders</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>

                                            <div class="col-xl-3 col-md-6">
                                                <a href="/admin/main-banners">
                                                    <div class="card">
                                                        <div class="card-block">
                                                            <div class="row align-items-center m-l-0">
                                                                <div class="col-auto">
                                                                    <i class="feather icon-eye f-30 text-c-blue"></i>
                                                                </div>
                                                                <div class="col-auto">
                                                                    {{-- <h6 class="text-muted m-b-10"></h6> --}}
                                                                    <h6 class="m-b-0">Banners</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>

                                        </div>

                                        <!-- statustic-card  end -->

                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>

                <div id="styleSelector">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- data-table js -->
    <script src="{{ asset('files\bower_components\datatables.net\js\jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('files\bower_components\datatables.net-buttons\js\dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('files\assets\pages\data-table\js\jszip.min.js') }}"></script>
    <script src="{{ asset('files\assets\pages\data-table\js\pdfmake.min.js') }}"></script>
    <script src="{{ asset('files\assets\pages\data-table\js\vfs_fonts.js') }}"></script>
    <script src="{{ asset('files\assets\pages\data-table\extensions\buttons\js\dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('files\assets\pages\data-table\extensions\buttons\js\buttons.flash.min.js') }}"></script>
    <script src="{{ asset('files\assets\pages\data-table\extensions\buttons\js\jszip.min.js') }}"></script>
    <script src="{{ asset('files\assets\pages\data-table\extensions\buttons\js\vfs_fonts.js') }}"></script>
    <script src="{{ asset('files\assets\pages\data-table\extensions\buttons\js\buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('files\bower_components\datatables.net-buttons\js\buttons.print.min.js') }}"></script>
    <script src="{{ asset('files\bower_components\datatables.net-buttons\js\buttons.html5.min.js') }}"></script>
    <script src="{{ asset('files\bower_components\datatables.net-bs4\js\dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('files\bower_components\datatables.net-responsive\js\dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('files\bower_components\datatables.net-responsive-bs4\js\responsive.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('files\assets\pages\data-table\extensions\buttons\js\extension-btns-custom.js') }}"></script>
    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/material.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
    <!-- Chart code -->

    {{-- moment.js --}}
    <script type="text/javascript" src="{{ asset('files\custom\moment\moment-with-locales.js') }}"></script>
@endsection
