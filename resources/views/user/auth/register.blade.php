@extends('user.layouts.app')

@section('title')
    Myproduct.lk | Sign up
@endsection

@section('styles')
    <!-- Multi Select css -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <!-- Main Container  -->
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li><a href="#">Account</a></li>
            <li><a href="#">Register</a></li>
        </ul>

        <div class="row">
            <div id="content" class="col-sm-12">
                <h2 class="title">Register Account</h2>
                <p>If you already have an account with us, please login at the <a href="{{ route('user.login') }}">login
                        page</a>.</p>
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
                <form action="{{ route('user.store') }}" method="post" class="form-horizontal account-register clearfix"
                    id="form">
                    @csrf
                    <fieldset id="account">
                        <legend>Your Personal Details</legend>
                        <div class="form-group required" style="display: none;">
                            <label class="col-sm-2 control-label">Customer Group</label>
                            <div class="col-sm-10">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="customer_group_id" value="1" checked="checked">
                                        Default
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-firstname">First Name</label>
                            <div class="col-sm-10">
                                <input type="text" data-parsley-required name="first_name"
                                    value="{{ old('first_name') }}" placeholder="First Name" id="input-firstname"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-lastname">Last Name</label>
                            <div class="col-sm-10">
                                <input type="text" required name="last_name" value="{{ old('last_name') }}"
                                    placeholder="Last Name" id="input-lastname" class="form-control">
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-telephone">Mobile Number</label>
                            <div class="col-sm-10">
                                <input type="tel" name="mobile_number" data-parsley-required data-parsley-type="digits"
                                    data-parsley-minlength="10" data-parsley-maxlength="10"
                                    value="{{ old('mobile_number') }}" placeholder="Telephone" id="input-telephone"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" data-parsley-type="email" value="{{ old('email') }}"
                                    placeholder="E-Mail" id="input-email" class="form-control">
                            </div>
                        </div>

                    </fieldset>
                    <fieldset id="address">
                        <legend>Your Address</legend>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-address-1">Address 1</label>
                            <div class="col-sm-10">
                                <input type="text" name="address_1" data-parsley-required value="{{ old('address_1') }}"
                                    placeholder="Address 1" id="input-address-1" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="input-address-2">Address 2</label>
                            <div class="col-sm-10">
                                <input type="text" name="address_2" value="{{ old('address_2') }}"
                                    placeholder="Address 2" id="input-address-2" class="form-control">
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-city">City</label>
                            <div class="col-sm-10">
                                <select data-parsley-required name="city" id="city"
                                    class="js-example-basic-single form-control">
                                    <option value selected disabled>Choose one</option>
                                    @foreach ($cities as $c)
                                        <option {{ old('city') == $c->loc_id ? 'selected' : null }}
                                            value="{{ $c->loc_id }}">{{ $c->loc_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label class="col-sm-2 control-label" for="input-postcode">Post Code</label>
                            <div class="col-sm-10">
                                <input type="text" name="postal_code"
                                    value="{{ old('postal_code') }}" placeholder="Post Code" id="input-postcode"
                                    class="form-control">
                            </div>
                        </div> --}}
                    </fieldset>
                    <fieldset>
                        <legend>Your Password</legend>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-password">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" data-parsley-required
                                    value="{{ old('password') }}" placeholder="Password" id="input-password"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-confirm">Password Confirm</label>
                            <div class="col-sm-10">
                                <input type="password" name="re_password" data-parsley-required
                                    data-parsley-equalto="#input-password" value="{{ old('re_password') }}"
                                    placeholder="Password Confirm" id="input-confirm" class="form-control">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Newsletter</legend>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Subscribe</label>
                            <div class="col-sm-10">
                                <label class="radio-inline">
                                    <input type="radio" name="newsletter" value="1"> Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="newsletter" value="0" checked="checked"> No
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    <div class="buttons pull-right">
                        <div>I have read and agree to the <a href="{{ route('pages.terms') }}" class="agree"><b>Terms &
                                    Conditions</b></a>
                            <input class="box-checkbox" type="checkbox" data-parsley-mincheck="1" required
                                name="agree" value="1"> &nbsp;
                            <input type="submit" value="Continue Sign Up" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- //Main Container -->
@endsection

@section('scripts')
    <!-- Select 2 js -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript" src="{{ asset('files\assets\js\jquery.quicksearch.js') }}"></script>
    <script type="text/javascript" src="{{ asset('files\custom\parsley\parsley.js') }}"></script>
    <script type="text/javascript" src="{{ asset('files\custom\parsley\parsley.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
        $('#form').parsley();
    </script>
@endsection
