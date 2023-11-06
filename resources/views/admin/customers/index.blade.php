@extends('admin.layouts.master')

@section('title')
    MyProducts.lk | Admin | Customers
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
                                        <h4>Customers List</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="page-header-breadcrumb">
                                    <ul class="breadcrumb-title">
                                        <li class="breadcrumb-item">
                                            <a href="/admin"> <i class="feather icon-home"></i> </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">All Customers</a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page-header end -->

                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- Individual Column Searching (Text Inputs) start -->
                                <div class="card">
                                    <div class="card-header">

                                        {{-- <button class="btn btn-inverse mb-3" data-toggle="modal"
                                        data-target="#default-Modal" id="addNew"><i class="fa fa-plus"></i>Add
                                        New</button> --}}

                                        <a href="{{ route('proCategory.create') }}"><button class="btn btn-inverse mb-3"><i
                                                    class="fa fa-plus"></i>Add
                                                New</button> </a>
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
                                        <div class="dt-responsive table-responsive">
                                            <table id="basic-btn" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Mobile</th>
                                                        <th>Referral Link</th>
                                                        <th>Address</th>
                                                        <th>Total share Earning</th>
                                                        <th>Total share Refunded</th>
                                                        <th>Withdraw / Used Earnings</th>
                                                        <th>Newsletter</th>
                                                        <th>Status</th>
                                                        <th>Registered on</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($customers as $cust)
                                                        <tr>
                                                            <td>{{ $cust->id }}</td>
                                                            <td>{{ $cust->first_name }} {{ $cust->last_name }}</td>
                                                            <td>{{ $cust->email }}</td>
                                                            <td>{{ $cust->mobile_number }}</td>
                                                            <td>{{ env('APP_URL') }}?ref={{ $cust->share_token }}</td>
                                                            <td>{{ $cust->address_1 }},{{ $cust->address_2 }},{{ $cust->postal_code }}
                                                            </td>
                                                            <td>{{ $cust->total_share_earning ? $cust->total_share_earning : 0 }}
                                                            </td>
                                                            <td>{{ $cust->total_share_refund ? $cust->total_share_refund : 0 }}
                                                            </td>
                                                            <td>{{ $cust->withdraw_share_refund ? $cust->withdraw_share_refund : 0 }}
                                                            </td>
                                                            <td>{{ $cust->newsletter ? 'Subscribed' : 'No' }}</td>
                                                            <th>
                                                                @if (!$cust->is_active)
                                                                    <div class="label-main">
                                                                        <label class="label label-warning">Inactive</label>
                                                                    </div>
                                                                @else
                                                                    <div class="label-main">
                                                                        <label class="label label-success">Active</label>
                                                                    </div>
                                                                @endif
                                                            </th>
                                                            <th>{{ $cust->created_at }}</th>
                                                            <td class="dropdown">
                                                                <button type="button"
                                                                    class="btn btn-primary dropdown-toggle"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false"><i class="fa fa-cog"
                                                                        aria-hidden="true"></i></button>
                                                                <div
                                                                    class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class=" icofont icofont-edit"></i>Edit</a>
                                                                    {{-- <a class="dropdown-item" href="#!"
                                                                        onclick="DelRow({{ $cat->id }})"><i
                                                                            class="icofont icofont-ui-delete"></i>Delete</a> --}}
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Mobile</th>
                                                        <th>Referral Link</th>
                                                        <th>Address</th>
                                                        <th>Total share Earning</th>
                                                        <th>Total share Refunded</th>
                                                        <th>Withdraw / Used Earnings</th>
                                                        <th>Newsletter</th>
                                                        <th>Status</th>
                                                        <th>Registered on</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Individual Column Searching (Text Inputs) end -->
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
    <div class="modal fade" id="default-Modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="{{ route('proCategory.store') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add new Category</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row" id="row-1">
                            <div class="col-sm-12">
                                <label class="col-form-label">Category Name #1</label>
                                <input type="text" name="catName[]" id="cat" class="form-control"
                                    placeholder="Ex: MCB,MCCB" required value="{{ old('catName.0') }}">
                            </div>
                        </div>
                        <div class="text-right">
                            <a href="javascript:void(0)" id="addRow" class="btn btn-success btn-outline-success"><i
                                    class="icofont icofont-ui-add"></i></a>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light ">Save changes</button>
                    </div>
                </div>
            </form>
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

        function test(param) {
            return 'Text';
        }
    </script>
@endsection
