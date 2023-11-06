@extends('admin.layouts.master')

@section('title')
    MyProducts.lk | Admin | Add Category
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
                                        <h4>Add Category</h4>
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
                                            <a href="{{ route('proCategory.index') }}"> Category </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">Add</a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page-header end -->

                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">

                                    <div class="card-block">
                                        <form action="{{ route('proCategory.store') }}" method="post" id="form"
                                            enctype='multipart/form-data'>
                                            @csrf
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label class="col-form-label">Category Name <span
                                                            class="red">*</span></label>
                                                    <input type="text" data-parsley-required class="form-control"
                                                        id="catName" name="catName" placeholder="Ex: Electronics"
                                                        value="{{ old('catName') }}">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="col-form-label">Description</label>
                                                    <textarea name="description" id="description" class="form-control" cols="30" rows="5"></textarea>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="col-form-label">Image 01 <span
                                                            class="red">*</span></label>
                                                    <input type="file" data-parsley-required class="form-control"
                                                        id="image_1" name="image_1" value="{{ old('image_1') }}">
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="col-form-label">Image 02 <span
                                                            class="red">*</span></label>
                                                    <input type="file" class="form-control" id="image_2" name="image_2"
                                                        value="{{ old('image_2') }}">
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="col-form-label">Icon<span class="red">*</span></label>
                                                    <input type="file" class="form-control" id="icon" name="icon"
                                                        value="{{ old('icon') }}">
                                                </div>

                                                <div class="col-sm-2 mt-30">
                                                    <label class="col-form-label">Active Status</label>
                                                    <input type="checkbox" class="js-single form-control" name="status"
                                                        checked="" value="1">
                                                </div>
                                                <div class="col-sm-6 m-t-40">
                                                    {{-- <h4 class="sub-title">Featured Options</h4> --}}
                                                    <div class="border-checkbox-section">
                                                        <div class="border-checkbox-group border-checkbox-group-primary">
                                                            <input class="border-checkbox" value="1" type="checkbox"
                                                                id="is_hot" name="is_hot">
                                                            <label class="border-checkbox-label" for="is_hot">Hot
                                                                Category</label>
                                                        </div>
                                                        <div class="border-checkbox-group border-checkbox-group-success">
                                                            <input class="border-checkbox" value="1" type="checkbox"
                                                                id="is_collection" name="is_collection">
                                                            <label class="border-checkbox-label"
                                                                for="is_collection">Collection</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><br>
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
        // $(document).ready(function() {
        //         $('#catName').focus();
        //     });
    </script>
@endsection
