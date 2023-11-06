@extends('admin.layouts.master')

@section('title')
    MyProducts.lk | Admin | Edit Product
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
    <!-- light-box css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('files\bower_components\ekko-lightbox\css\ekko-lightbox.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('files\bower_components\lightbox2\css\lightbox.css') }}">
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
                                        <h4>Edit Product</h4>
                                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="page-header-breadcrumb">
                                    <ul class="breadcrumb-title">
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('admin.dashboard') }}"> <i class="feather icon-home"></i>
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('product.index') }}"> Products </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">Edit</a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page-header end -->

                    <div class="page-body">
                        <div class="row">
                            <h2 class="title">Checkout</h2>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-primary icons-alert">
                                    <p><strong>Success!</strong> {{ $message }}
                                    </p>
                                </div>
                            @endif
                            @if ($message = Session::get('error'))
                                <div class="alert alert-danger icons-alert">
                                    <p><strong>Sorry!</strong> {{ $message }}
                                    </p>
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-block">
                                        <form action="{{ route('product.update', $product->id) }}" method="post"
                                            id="form" enctype='multipart/form-data'>
                                            @csrf
                                            @method('put')
                                            <h4 class="sub-title">Main Info</h4>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label class="col-form-label">Product Title<span class="required-field">
                                                            *</span></label>
                                                    <input type="text" data-parsley-required class="form-control"
                                                        id="title" name="title" placeholder="Enter here"
                                                        value="{{ $product->title }}">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="col-form-label">Category<span class="required-field">
                                                            *</span></label>
                                                    <select class="js-example-basic-single"
                                                        value="{{ old('category_id') }}" name="category_id"
                                                        id="category_id" required data-parsley-required>
                                                        <option value disabled selected>Choose one</option>
                                                        @foreach ($cats as $cat)
                                                            <option value="{{ $cat->id }}">
                                                                {{ $cat->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="col-form-label">Sub Category<span class="required-field">
                                                            *</span></label>
                                                    <select class="js-example-basic-single"
                                                        value="{{ old('sub_category_id') }}" name="sub_category_id"
                                                        id="sub_category_id" required data-parsley-required>
                                                        {{-- <option value disabled selected>Choose one</option> --}}
                                                        {{-- @foreach ($subcats as $cat)
                                                            <option value="{{ $cat->id }}">
                                                                {{ $cat->title }}
                                                            </option>
                                                        @endforeach --}}
                                                    </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="col-form-label">Brand</label>
                                                    <select class="js-example-basic-single" value="{{ old('brand_id') }}"
                                                        name="brand_id" id="brand_id">
                                                        <option value disabled selected>Choose one</option>
                                                        @foreach ($brands as $cat)
                                                            <option value="{{ $cat->id }}">
                                                                {{ $cat->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                {{-- <div class="col-sm-3">
                                                    <label class="col-form-label">Sub Category Name <span
                                                            class="red">*</span></label>
                                                    <input type="text" data-parsley-required class="form-control"
                                                        id="SubCatName" name="SubCatName" placeholder="Ex: Electronics"
                                                        value="{{ old('SubCatName') }}">
                                                </div> --}}


                                                <div class="col-sm-2 mt-30">
                                                    <label class="col-form-label">Active Status</label>
                                                    <input type="checkbox" class="js-single form-control" id="is_active"
                                                        name="is_active" {{ $product->is_active == 1 ? 'checked' : 'unchecked' }}>
                                                </div>
                                                <div class="col-sm-12 col-xl-7 m-t-40">
                                                    {{-- <h4 class="sub-title">Featured Options</h4> --}}
                                                    <div class="border-checkbox-section">
                                                        <div class="border-checkbox-group border-checkbox-group-primary">
                                                            <input class="border-checkbox" value="1" type="checkbox"
                                                                id="is_featured" name="is_featured"
                                                                {{ $product->is_featured == 1 ? 'checked' : 'unchecked' }}>
                                                            <label class="border-checkbox-label"
                                                                for="is_featured">Featured Product</label>
                                                        </div>
                                                        <div class="border-checkbox-group border-checkbox-group-success">
                                                            <input class="border-checkbox" value="1" type="checkbox"
                                                                id="is_new" name="is_new"
                                                                {{ $product->is_new == 1 ? 'checked' : 'unchecked' }}>
                                                            <label class="border-checkbox-label" for="is_new">New
                                                                Product</label>
                                                        </div>
                                                        <div class="border-checkbox-group border-checkbox-group-info">
                                                            <input class="border-checkbox" value="1" type="checkbox"
                                                                id="is_hot_sell" name="is_hot_sell"
                                                                {{ $product->is_hot_sell == 1 ? 'checked' : 'unchecked' }}>
                                                            <label class="border-checkbox-label" for="is_hot_sell">Hot
                                                                Selling Product</label>
                                                        </div>
                                                        <div class="border-checkbox-group border-checkbox-group-danger">
                                                            <input class="border-checkbox" value="0" type="checkbox"
                                                                id="is_available" name="is_available"
                                                                {{ $product->is_available == 0 ? 'checked' : 'unchecked' }}>
                                                            <label class="border-checkbox-label" for="is_available">Out of
                                                                Stock</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><br><br>
                                            <h4 class="sub-title">Descriptions</h4>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label class="col-form-label">Small Description</label>
                                                    <textarea name="small_description" id="small_description" data-parsley-required class="form-control" cols="30"
                                                        rows="5">{{ $product->small_description }}</textarea>
                                                </div>
                                                <div class="col-sm-12">
                                                    <label class="col-form-label">Long Description</label>
                                                    <textarea name="description" id="description" class="form-control" cols="30" rows="10"
                                                        placeholder="Optional">{{ $product->description }}</textarea>
                                                </div>
                                            </div>
                                            <br><br>
                                            <h4 class="sub-title">Stock & Pricing</h4>
                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <label class="col-form-label">Available Qty<span
                                                            class="required-field">
                                                            *</span></label>
                                                    <input type="text" data-parsley-required data-parsley-type="number"
                                                        class="form-control" id="stock" name="stock"
                                                        placeholder="Enter here" value="{{ $product->stock }}">
                                                </div>

                                                <div class="col-sm-4">
                                                    <label class="col-form-label">Maximum Order Qty<span
                                                            class="required-field">
                                                            *</span></label>
                                                    <input type="text" data-parsley-required data-parsley-type="number"
                                                        class="form-control" id="max_order_qty" name="max_order_qty"
                                                        placeholder="Enter here" value="{{ $product->max_order_qty }}">
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="col-form-label">Weight (g)<span class="required-field">
                                                            *</span></label>
                                                    <input type="text" data-parsley-required data-parsley-type="number"
                                                        class="form-control" id="weight" name="weight"
                                                        placeholder="Enter here" value="{{ $product->weight }}">
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="col-form-label">Actual Price (Rs.)<span
                                                            class="required-field">
                                                            *</span></label>
                                                    <input type="text" data-parsley-required data-parsley-type="number"
                                                        class="form-control" id="price" name="price"
                                                        placeholder="Enter here" value="{{ $product->price }}">
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="col-form-label">Discount Pre %</label>
                                                    <input type="text" data-parsley-type="number" class="form-control"
                                                        id="discount_pre" name="discount_pre" data-parsley-min="0"
                                                        data-parsley-max="100" placeholder="Enter here"
                                                        value="{{ $product->discount_pre }}">
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="col-form-label">Discount (Rs.)</label>
                                                    <input type="text" data-parsley-type="number" readonly
                                                        class="form-control" id="discount_price" name="discount_price"
                                                        placeholder="Enter here" value="{{ $product->discount_price }}">
                                                </div>
                                            </div>
                                            <br><br>
                                            <h4 class="sub-title">Product Variations</h4>

                                            <div class="form-group row" id="price_veri_div">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label">Type<span class="required-field">
                                                            *</span></label>
                                                    <input type="text" class="form-control" id="type"
                                                        name="type" placeholder="Ex: Color, Size"
                                                        value="{{ old('type') }}">
                                                </div>
                                                <div class="col-sm-12 col-xl-8 m-b-30">
                                                    <label class="col-form-label">Values</label>
                                                    <select class="js-example-tags col-sm-12" multiple="multiple"
                                                        name="varies[]" id="varies">
                                                    </select>
                                                </div>
                                                <div class="col-sm-1">
                                                    <a href="javascript:void(0)" id="addrow"
                                                        class="btn btn-primary btn-add-task waves-effect waves-light mt-40"><i
                                                            class="fa fa-plus"></i>Add</a>
                                                </div><br>

                                                <div class="col-sm-12">
                                                    <textarea name="variations" id="variations" class="form-control" cols="30" rows="5">
                                                        {{ $product->variations }}
                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="product_veri_section">
                                                {{-- <div class="card" id="product_veri_card">
                                                    <div class="card-header">
                                                        <h5>Sales Analytics</h5>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li><i class="feather icon-trash-2 trash-card"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="form-group row" id="price_veri_div">
                                                            <label class="col-sm-1 col-form-label">Red :</label>
                                                            <div class="col-sm-2">
                                                                <input type="number" class="form-control"
                                                                    placeholder="Price">
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <input type="number" class="form-control"
                                                                    placeholder="Dis. Price">
                                                            </div>
                                                            <div class="col-sm-1">
                                                                <input type="number" class="form-control"
                                                                    placeholder="Dis. Pre %">
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <input type="number" class="form-control"
                                                                    placeholder="Ava. Qty">
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <input type="number" class="form-control"
                                                                    placeholder="Available Qty">
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <input type="number" class="form-control"
                                                                    placeholder="Qty">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            </div>



                                            <br><br>
                                            <h4 class="sub-title">Product Images</h4>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label class="col-form-label">Product Images <span class="red">(Max
                                                            4
                                                            Images | 600px X 600px)</span></label>
                                                    <input type="file" data-parsley-required class="my-pond"
                                                        id="image" name="images[]" value="{{ old('images[]') }}">
                                                </div>
                                            </div>
                                            {{-- <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h5>Previous Images</h5>

                                                        </div>
                                                        <div class="card-block">
                                                            <div class="row">
                                                                <div class="col-xl-2 col-lg-3 col-sm-3 col-xs-12">
                                                                    <a href="{{ $product->image1_path }}"
                                                                        data-lightbox="example-set">
                                                                        <img src="{{ $product->image1_path }}"
                                                                            class="img-fluid m-b-10" alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="col-xl-2 col-lg-3 col-sm-3 col-xs-12">
                                                                    <a href="{{ $product->image2_path }}"
                                                                        data-lightbox="example-set">
                                                                        <img src="{{ $product->image2_path }}"
                                                                            class="img-fluid m-b-10" alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="col-xl-2 col-lg-3 col-sm-3 col-xs-12">
                                                                    <a href="{{ $product->image3_path }}"
                                                                        data-lightbox="example-set">
                                                                        <img src="{{ $product->image3_path }}"
                                                                            class="img-fluid m-b-10" alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="col-xl-2 col-lg-3 col-sm-3 col-xs-12">
                                                                    <a href="{{ $product->image4_path }}"
                                                                        data-lightbox="example-set">
                                                                        <img src="{{ $product->image4_path }}"
                                                                            class="img-fluid m-b-10" alt="">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}


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

    <!-- light-box js -->
    <script type="text/javascript" src="{{ asset('files\bower_components\ekko-lightbox\js\ekko-lightbox.js') }}"></script>
    <script type="text/javascript" src="{{ asset('files\bower_components\lightbox2\js\lightbox.js') }}"></script>
    <script>
        var variations = @json($product->variations);
        var subcategories = @json($subcats);
        var subcat_id = "{{ $product->sub_category_id }}";
        var category_id = "{{ $product->category_id }}";
        // console.log()
        if (variations) edit_variations(variations);
        $("#category_id").val("{{ $product->category_id }}").trigger("change");
        subcats(category_id, subcat_id);
        $("#brand").val("{{ $product->brand }}").trigger("change");
        var image_1 = "{{ $product->image1_path }}";
        var image_2 = "{{ $product->image2_path }}";
        var image_3 = "{{ $product->image3_path }}";
        var image_4 = "{{ $product->image4_path }}";

        var image_1_name = "{{ url('/uploads/products/' . basename($product->image1_path)) }}";
        var image_2_name = "{{ url('/uploads/products/' . basename($product->image2_path)) }}";
        var image_3_name = "{{ url('/uploads/products/' . basename($product->image3_path)) }}";
        var image_4_name = "{{ url('/uploads/products/' . basename($product->image4_path)) }}";
        var FilePondImages = []
        if (image_1) {
            var mainObj = {};
            mainObj['source'] = image_1_name;
            FilePondImages.push(mainObj);
        }
        if (image_2) {
            var mainObj = {};
            mainObj['source'] = image_2_name;
            FilePondImages.push(mainObj);
        }
        if (image_3) {
            var mainObj = {};
            mainObj['source'] = image_3_name;
            FilePondImages.push(mainObj);
        }
        if (image_4) {
            var mainObj = {};
            mainObj['source'] = image_4_name;
            FilePondImages.push(mainObj);
        }

        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginFileValidateSize
            // FilePondPluginImageCrop,
            // FilePondPluginImageEdit,
        );
        // console.log(FilePondImages)


        // Turn input element into a pond with configuration options
        $(".my-pond").filepond({
            labelIdle: "Upload Product Images",
            allowMultiple: true,
            storeAsFile: true,
            allowImagePreview: true,
            maxFileSize: "750KB",
            labelMaxFileSizeExceeded: "File is too large",
            labelMaxFileSize: "Maximum file size is 750KB",
            maxFiles: 4,
            allowReorder: true,
            imagePreviewMaxHeight: 100,
            checkValidity: true,
            required: true,
            files: FilePondImages,

        });

        $('#category_id').change(function(e) {
            // alert(this.value);
            subcats(this.value, null);
        });

        function subcats(cat_id, sub_cat_id) {
            $('#sub_category_id').empty();
            var newOption = new Option('Select one', null, false, false);
            $('#sub_category_id').append(newOption).find(':selected').attr('disabled', 'disabled');

            subcategories.forEach(el => {
                if (el.category_id == cat_id) {
                    newOption = new Option(el.title, el.id, false, false);
                    $('#sub_category_id').append(newOption);
                }
            });
            if (sub_cat_id) {
                // console.log(sub_cat_id)
                $("#sub_category_id").val(sub_cat_id).trigger("change");
            }
        }
    </script>
@endsection
