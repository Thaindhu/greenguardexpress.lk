@extends('admin.layouts.master')

@section('title')
    MyProducts.lk | Admin | Main Banners
@endsection

@section('styles')
    <!-- Select 2 css -->
    <link rel="stylesheet" href="{{ asset('files\bower_components\select2\css\select2.min.css') }}">
    <!-- Style.css -->
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('files\assets\css\style.css') }}"> --}}
    <!-- Date-Dropper css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('files\bower_components\datedropper\css\datedropper.min.css') }}">
    <!-- Notification.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('files\assets\pages\notification\notification.css') }}">
    <!-- Animate.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('files\bower_components\animate.css\css\animate.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Switch component css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('files\bower_components\switchery\css\switchery.min.css') }}">
    <!-- Multi Select css -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('files\bower_components\bootstrap-multiselect\css\bootstrap-multiselect.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('files\bower_components\multiselect\css\multi-select.css') }}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('files\assets\icon\icofont\css\icofont.css') }}">
    {{-- FIle Upload --}}
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
    {{-- <link href="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.css" rel="stylesheet" /> --}}
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #4680ff;
        }
    </style>
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
                                        <h4>Create Product</h4>
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
                                            <a href="{{ route('product.index') }}"> Products </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">Create</a> </li>
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
                                        <form action="{{ route('product.store') }}" method="post" id="form"
                                            enctype='multipart/form-data'>
                                            @csrf
                                            <h4 class="sub-title">Main Info</h4>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label class="col-form-label">Product Title<span class="required-field">
                                                            *</span></label>
                                                    <input type="text" data-parsley-required class="form-control"
                                                        id="title" name="title" placeholder="Enter here"
                                                        value="{{ old('title') }}">
                                                </div>
                                            <br><br>
                                            <h4 class="sub-title">Product Images</h4>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label class="col-form-label">Product Images <span class="red">(Max
                                                            5
                                                            Images | 600px X 600px)</span></label>
                                                    <input type="file" data-parsley-required class="my-pond"
                                                        id="image" name="images[]" value="{{ old('images[]') }}">
                                                </div>
                                            </div>


                                            <br>
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
    {{-- Image uploader --}}
    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
    <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    {{-- <script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.js"></script> --}}

    <!-- Select 2 js -->
    <script type="text/javascript" src="{{ asset('files\bower_components\select2\js\select2.full.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('files\bower_components\multiselect\js\jquery.multi-select.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('files\assets\js\jquery.quicksearch.js') }}"></script>


    <!-- Switch component js -->
    <script type="text/javascript" src="{{ asset('files\bower_components\switchery\js\switchery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('files\assets\pages\advance-elements\swithces.js') }}"></script>
    {{-- CK editor --}}
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="{{ asset('files\assets\pages\advance-elements\select2-custom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('files\custom\parsley\parsley.js') }}"></script>
    <script type="text/javascript" src="{{ asset('files\custom\parsley\parsley.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('files\custom\product.js') }}"></script>
    <script>
        // $('#main_image').filepond({
        //     allowMultiple: false,
        //     storeAsFile: true,
        //     allowImagePreview: true,
        //     maxFileSize: '750KB',
        //     labelMaxFileSizeExceeded: 'File is too large',
        //     labelMaxFileSize: 'Maximum file size is 750KB',
        //     imagePreviewMaxHeight: 100,
        //     required: true,

        // });
        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginFileValidateSize
            // FilePondPluginImageCrop,
            // FilePondPluginImageEdit,
        );
        // Turn input element into a pond with configuration options
        $(".my-pond").filepond({
            labelIdle: "Upload Product Images",
            allowMultiple: true,
            storeAsFile: true,
            allowImagePreview: true,
            maxFileSize: "750KB",
            labelMaxFileSizeExceeded: "File is too large",
            labelMaxFileSize: "Maximum file size is 750KB",
            maxFiles: 5,
            allowReorder: true,
            imagePreviewMaxHeight: 100,
            checkValidity: true,
            required: true,
        });
    </script>
@endsection
