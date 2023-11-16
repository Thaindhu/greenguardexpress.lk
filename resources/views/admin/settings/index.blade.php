@extends('admin.layouts.master')

@section('title')
    Greenguardexpress.lk | Admin | Settings
@endsection

@section('styles')
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('files\assets\icon\icofont\css\icofont.css') }}">
    <!-- Switch component css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('files\bower_components\switchery\css\switchery.min.css') }}">
    <!-- Multi Select css -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('files\bower_components\bootstrap-multiselect\css\bootstrap-multiselect.css') }}">
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
                                        <h4>Settings</h4>
                                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="page-header-breadcrumb">
                                    <ul class="breadcrumb-title">
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('admin.dashboard') }}"> <i class="feather icon-home"></i> </a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('proCategory.index') }}"> Settings </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">edit</a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page-header end -->

                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-primary icons-alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="icofont icofont-close-line-circled"></i>
                                        </button>
                                        <p><strong>Success!</strong> {{ $message }}
                                        </p>
                                    </div>
                                @endif
                                @if ($message = Session::get('error'))
                                    <div class="alert alert-danger icons-alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="icofont icofont-close-line-circled"></i>
                                        </button>
                                        <p><strong>Sorry!</strong> {{ $message }}
                                        </p>
                                    </div>
                                @endif
                            </div>
                            <div class="col-sm-12">
                                <div class="card">

                                    <div class="card-block">
                                        <form action="{{ route('admin.settings.update') }}" method="post" id="form">
                                            @csrf
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label class="col-form-label">Free Deliver order total above</label>
                                                    <input type="text" class="form-control" id="max_order_total"
                                                        name="max_order_total" data-parsley-type="digits"
                                                        placeholder="Ex: Rs.5000"
                                                        value="{{ $settings ? $settings->free_deliver_total : null }}">
                                                </div>
                                                <div class="col-sm-2 mt-30">
                                                    <label class="col-form-label">Active Status</label>
                                                    <input type="checkbox" class="js-single form-control"
                                                        name="is_active_free_deliver"
                                                        {{ $settings && $settings->is_active_free_deliver ? 'checked' : null }}
                                                        value="1">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="col-form-label">Referral Defualt Dis Presentage (%)</label>
                                                    <input type="text" class="form-control" id="ref_default_dis"
                                                        name="ref_default_dis" data-parsley-type="digits"
                                                        placeholder="Ex: 5%"
                                                        value="{{ $settings ? $settings->ref_default_dis : null }}">
                                                </div>
                                            </div>
                                            {{-- <h4 class="sub-title">Taxes & Duties</h4> --}}
                                            <div class="form-group row">
                                                <div class="col-sm-12 text-right mt-5">
                                                    <button type="submit" class="btn btn-inverse"><i
                                                            class="fa fa-save"></i>Save</button>
                                                    <a href="{{ route('proCategory.index') }}" class="btn btn-danger"><i
                                                            class="fa fa-times-circle"></i>Cancel</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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
@endsection



@section('scripts')
    <script type="text/javascript" src="{{ asset('files\custom\parsley\parsley.js') }}"></script>
    <script type="text/javascript" src="{{ asset('files\custom\parsley\parsley.min.js') }}"></script>

    <!-- Switch component js -->
    <script type="text/javascript" src="{{ asset('files\bower_components\switchery\js\switchery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('files\assets\pages\advance-elements\swithces.js') }}"></script>
    <!-- Select 2 js -->
    <script type="text/javascript" src="{{ asset('files\bower_components\select2\js\select2.full.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('files\bower_components\multiselect\js\jquery.multi-select.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('files\assets\js\jquery.quicksearch.js') }}"></script>

    <script>
        $('#form').parsley();
    </script>
@endsection
