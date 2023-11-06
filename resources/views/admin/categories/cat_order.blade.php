@extends('admin.layouts.master')

@section('title')
    MyProducts.lk | Admin | Category Order
@endsection

@section('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                                        <h4>Product Category Order</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="page-header-breadcrumb">
                                    <ul class="breadcrumb-title">
                                        <li class="breadcrumb-item">
                                            <a href="/admin"> <i class="feather icon-home"></i> </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">All Product Categories</a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page-header end -->

                    <div class="page-body">
                        <div class="row">
                            <div class="col-lg-6 col-xl-6 m-auto">
                                <!-- Draggable Multiple List card start -->
                                <div class="card">
                                    <div class="card-header">
                                        {{-- <h5 class="card-header-text">Set category order</h5> --}}
                                        <div class="form-group row">
                                            <div class="col-sm-12 text-right">
                                                <button type="button" id="btnUpdate" class="btn btn-inverse"><i
                                                        class="fa fa-save"></i>Update</button>
                                                <a href="{{ route('proCategory.index') }}" class="btn btn-danger"><i
                                                        class="fa fa-times-circle"></i>Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-block p-b-0">
                                        <div class="row">
                                            <div class="col-md-12" id="draggableMultiple">
                                                @foreach ($cats as $item)
                                                    <div class="sortable-moves" cat-id="{{ $item->id }}">
                                                        <img class="img-fluid p-absolute" src="{{ $item->image1_path }}"
                                                            alt="">
                                                        <h6 class="m-l-20">{{ $item->title }}</h6>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Draggable Multiple List card end -->
                            </div>

                            <!-- Container-fluid ends -->
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
    <!-- jquery sortable js -->

    <script src="{{ asset('files\assets\pages\sortable-custom.js') }}"></script>
    {{-- sweet alerts --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function DelRow(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // alert(id);
                    var data = {
                        "id": id
                    };
                    $.ajax({
                        url: '/admin/categories/' + id,
                        type: 'DELETE',
                        beforeSend: function() {
                            $('#pre-load-div').show();
                        },
                        success: function(response) {
                            // console.log(response)
                            if (response.status) {
                                swalWithBootstrapButtons.fire(
                                    'Deleted!',
                                    response.message,
                                    'success'
                                ).then((result) => {
                                    location.reload();
                                });
                            } else {
                                swalWithBootstrapButtons.fire(
                                    'Sorry',
                                    response.message,
                                    'error'
                                )
                            }
                            $('#pre-load-div').hide();

                        },
                        error: function(res) {
                            $('#pre-load-div').hide();
                            swalWithBootstrapButtons.fire(
                                'Sorry',
                                res.message,
                                'error'
                            )
                        }
                    });
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            })
        }

        $('#btnUpdate').click(function(e) {
            e.preventDefault();
            setOrder();
        });

        function setOrder() {
            var obj = [];
            var order_id = 1;
            $(".sortable-moves").each(function() {
                // console.log($(this).attr("cat-id"));
                var data = {
                    cat_id: $(this).attr("cat-id"),
                    order_id: order_id
                }
                order_id++;
                obj.push(data);
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "Do you want to change the order?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, change it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({

                        url: '/admin/categories/order/set',
                        type: 'POST',
                        data: {
                            cat_order: obj
                        },
                        beforeSend: function() {
                            $('#pre-load-div').show();
                        },
                        success: function(response) {
                            if (response.status) {
                                swalWithBootstrapButtons.fire(
                                    'Success!',
                                    response.message,
                                    'success'
                                ).then((result) => {
                                    // location.reload();
                                });
                            } else {
                                swalWithBootstrapButtons.fire(
                                    'Sorry',
                                    response.message,
                                    'error'
                                )
                            }
                            $('#pre-load-div').hide();

                        },
                        error: function(res) {
                            $('#pre-load-div').hide();
                            swalWithBootstrapButtons.fire(
                                'Sorry',
                                res.message,
                                'error'
                            )

                        }
                    });
                }
            })
            // console.log(obj);
        }
    </script>
@endsection
