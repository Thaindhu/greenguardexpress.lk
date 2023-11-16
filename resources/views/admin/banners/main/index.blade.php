@extends('admin.layouts.master')

@section('title')
    Greenguardexpress.lk | Admin | Main Banners
@endsection

@section('styles')
    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('files\bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('files\assets\pages\data-table\css\buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('files\bower_components\datatables.net-responsive-bs4\css\responsive.bootstrap4.min.css') }}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('files\assets\icon\icofont\css\icofont.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- light-box css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('files\bower_components\ekko-lightbox\css\ekko-lightbox.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('files\bower_components\lightbox2\css\lightbox.css') }}">
@endsection

@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <!-- Main-body start -->
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- Page-header start -->
                    <div class="page-header">
                        <div class="row align-items-end">
                            <div class="col-lg-8">
                                <div class="page-header-title">
                                    <div class="d-inline">
                                        <h4>Main Banners</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="page-header-breadcrumb">
                                    <ul class="breadcrumb-title">
                                        <li class="breadcrumb-item">
                                            <a href="/admin"> <i class="feather icon-home"></i> </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">Main Banners</a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page-header end -->

                    <div class="page-body">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Single image lighbox start -->
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <h4 class="sub-title">Main Slider | Main Banners</h4>
                                            </div>
                                            <div class="col-sm-2 text-right">
                                                <a href="{{ route('main_banner.edit') }}"><button
                                                        class="btn btn-inverse mb-3"><i class="fa fa-edit"></i>Edit</button>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Modal static-->

                                        @if ($message = Session::get('success'))
                                            <div class="alert alert-primary icons-alert">
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <i class="icofont icofont-close-line-circled"></i>
                                                </button>
                                                <p><strong>Success!</strong> {{ $message }}
                                                </p>
                                            </div>
                                        @endif
                                        @if ($message = Session::get('error'))
                                            <div class="alert alert-danger icons-alert">
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <i class="icofont icofont-close-line-circled"></i>
                                                </button>
                                                <p><strong>Sorry!</strong> {{ $message }}
                                                </p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-3 col-sm-3 col-xs-12">
                                                <a href="{{ $banners->main_banner_path_1 }}" data-lightbox="roadtrip">
                                                    <img src="{{ $banners->main_banner_path_1 }}" class="img-fluid m-b-10"
                                                        alt="">
                                                </a>
                                                <p>Redirecting to - <a href="{{ $banners->main_banner_1_redirect }}">{{ $banners->main_banner_1_redirect }}</a> </p>
                                            </div>
                                            <div class="col-xl-4 col-lg-3 col-sm-3 col-xs-12">
                                                <a href="{{ $banners->main_banner_path_2 }}" data-lightbox="roadtrip"
                                                    data-title="Lorem ipsum dolor sit amet, consectetur adipiscing lorem impus dolorsit.onsectetur adipiscing.">
                                                    <img src="{{ $banners->main_banner_path_2 }}" class="img-fluid m-b-10"
                                                        alt="">
                                                </a>
                                                <p>Redirecting to - <a href="{{ $banners->main_banner_2_redirect }}">{{ $banners->main_banner_2_redirect }}</a> </p>
                                            </div>
                                            <div class="col-xl-4 col-lg-3 col-sm-3 col-xs-12">
                                                <a href="{{ $banners->main_banner_path_3 }}" data-lightbox="roadtrip"
                                                    data-title="Lorem ipsum dolor sit amet, consectetur adipiscing lorem impus dolorsit.onsectetur adipiscing.">
                                                    <img src="{{ $banners->main_banner_path_3 }}" class="img-fluid m-b-10"
                                                        alt="">
                                                </a>
                                                <p>Redirecting to - <a href="{{ $banners->main_banner_3_redirect }}">{{ $banners->main_banner_3_redirect }}</a> </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single image lighbox end -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Single image lighbox start -->
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="sub-title">Main Slider | Sub Images</h4>
                                    </div>
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-xl-2 col-lg-3 col-sm-3 col-xs-12">
                                                <a href="{{ $banners->banner_image_sm_1 }}" data-lightbox="roadtrip"
                                                    data-title="Lorem ipsum dolor sit amet, consectetur adipiscing lorem impus dolorsit.onsectetur adipiscing.">
                                                    <img src="{{ $banners->banner_image_sm_1 }}" class="img-fluid m-b-10"
                                                        alt="">
                                                </a>
                                                <p>Redirecting to - <a href="{{ $banners->banner_image_sm_1_redirect }}">{{ $banners->banner_image_sm_1_redirect }}</a> </p>
                                            </div>
                                            <div class="col-xl-2 col-lg-3 col-sm-3 col-xs-12">
                                                <a href="{{ $banners->banner_image_sm_2 }}" data-lightbox="roadtrip"
                                                    data-title="Lorem ipsum dolor sit amet, consectetur adipiscing lorem impus dolorsit.onsectetur adipiscing.">
                                                    <img src="{{ $banners->banner_image_sm_2 }}" class="img-fluid m-b-10"
                                                        alt="">
                                                </a>
                                                <p>Redirecting to - <a href="{{ $banners->banner_image_sm_2_redirect }}">{{ $banners->banner_image_sm_2_redirect }}</a> </p>
                                            </div>
                                            <div class="col-xl-2 col-lg-3 col-sm-3 col-xs-12">
                                                <a href="{{ $banners->banner_image_sm_3 }}" data-lightbox="roadtrip"
                                                    data-title="Lorem ipsum dolor sit amet, consectetur adipiscing lorem impus dolorsit.onsectetur adipiscing.">
                                                    <img src="{{ $banners->banner_image_sm_3 }}" class="img-fluid m-b-10"
                                                        alt="">
                                                </a>
                                                <p>Redirecting to - <a href="{{ $banners->banner_image_sm_3_redirect }}">{{ $banners->banner_image_sm_3_redirect }}</a> </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single image lighbox end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="styleSelector">

            </div>
            <div class="loader-block ajx-loader" id="pre-load-div">
                <div class="ajx-loader-cur">
                    <svg id="loader2" viewbox="0 0 100 100">
                        <circle id="circle-loader2" cx="50" cy="50" r="45"></circle>
                    </svg>
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
    <!-- i18next.min.js -->
    <script type="text/javascript" src="{{ asset('files\bower_components\i18next\js\i18next.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('files\bower_components\i18next-xhr-backend\js\i18nextXHRBackend.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('files\bower_components\i18next-browser-languagedetector\js\i18nextBrowserLanguageDetector.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('files\bower_components\jquery-i18next\js\jquery-i18next.min.js') }}">
    </script>
    <!-- Custom js -->
    <script src="{{ asset('files\assets\pages\data-table\js\data-table-custom.js') }}"></script>
    {{-- sweet alerts --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- light-box js -->
    <script type="text/javascript" src="{{ asset('files\bower_components\ekko-lightbox\js\ekko-lightbox.js') }}"></script>
    <script type="text/javascript" src="{{ asset('files\bower_components\lightbox2\js\lightbox.js') }}"></script>
@endsection
