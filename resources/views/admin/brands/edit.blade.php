@extends('admin.layouts.master')

@section('title')
    MyProducts.lk | Admin | Update Brand
@endsection

@section('styles')
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('files\assets\icon\icofont\css\icofont.css') }}">
    <!-- Switch component css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('files\bower_components\switchery\css\switchery.min.css') }}">
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
                                        <h4>Update Brand</h4>
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
                                            <a href="{{ route('brand.index') }}"> Brands </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">Update</a> </li>
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
                                        <form action="{{ route('brand.update', $brand->id) }}" method="post"
                                            id="form" enctype='multipart/form-data'>
                                            @csrf
                                            @method('put')
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label class="col-form-label">Brand Name <span
                                                            class="red">*</span></label>
                                                    <input type="text" data-parsley-required class="form-control"
                                                        id="brand" name="brand" placeholder="Ex: Electronics"
                                                        value="{{ $brand->title }}">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="col-form-label">Image 01 <span
                                                            class="red">*</span></label>
                                                    <input type="file" class="form-control" id="image_1" name="image_1"
                                                        value="">
                                                    <span>Prev. Image - <a
                                                            href="{{ $brand->image1_path }}">{{ $brand->image1_path }}</a>
                                                    </span>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="col-form-label">Image 02 <span
                                                            class="red">*</span></label>
                                                    <input type="file" class="form-control" id="image_2" name="image_2"
                                                        value="{{ old('image_2') }}">
                                                    <span>Prev. Image - <a
                                                            href="{{ $brand->image1_path }}">{{ $brand->image1_path }}</a>
                                                    </span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="col-form-label">Description</label>
                                                    <textarea name="description" id="description" class="form-control" cols="30" rows="5">{{ $brand->description }}</textarea>
                                                </div>
                                                <div class="col-sm-3 mt-30">
                                                    <label class="col-form-label">Active Status</label>
                                                    <input type="checkbox" class="js-single form-control" name="status"
                                                        checked="" value="1">
                                                </div>
                                            </div><br>
                                            {{-- <h4 class="sub-title">Taxes & Duties</h4> --}}
                                            <div class="form-group row">
                                                <div class="col-sm-12 text-right mt-5">
                                                    <button type="submit" class="btn btn-inverse"><i
                                                            class="fa fa-save"></i>Update</button>
                                                    <a href="{{ route('brand.index') }}" class="btn btn-danger"><i
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

    <script>
        $('#form').parsley();
        // $(document).ready(function() {
        //         $('#brand').focus();
        //     });
    </script>
@endsection
