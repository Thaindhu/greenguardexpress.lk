@extends('user.layouts.app')

@section('title')
    Myproduct.lk | My Account
@endsection

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        .alert-danger,
        .alert-success {
            display: inline-block;
            width: 100%;
            border-radius: 0;
        }

        .alert {
            border-radius: 0;
        }

        .alert-danger {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-primary {
            color: #3c763d !important;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }
    </style>
@endsection

@section('content')
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li><a href="#">Account</a></li>
            <li><a href="#">My Account</a></li>
        </ul>

        <div class="row">
            @include('user.layouts.profile_sidebar')
            <!--Middle Part Start-->
            <div class="col-sm-9" id="content">
                <h2 class="title">My Account</h2>
                <p class="lead">Hello, <strong>{{ $profile->first_name }}!</strong> - To update your account information.
                </p>
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
                <form action="{{ route('user.update.profile') }}" id="form" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <fieldset id="personal-details">
                                <legend>Personal Details</legend>
                                <div class="form-group required">
                                    <label for="input-firstname" class="control-label">First Name</label>
                                    <input type="text" data-parsley-required class="form-control" id="input-firstname"
                                        placeholder="First Name" value="{{ $profile->first_name }}" name="first_name">
                                </div>
                                <div class="form-group required">
                                    <label for="input-lastname" class="control-label">Last Name</label>
                                    <input type="text" data-parsley-required class="form-control" id="input-lastname"
                                        placeholder="Last Name" value="{{ $profile->last_name }}" name="last_name">
                                </div>
                                <div class="form-group required">
                                    <label for="input-email" class="control-label">E-Mail</label>
                                    <input type="email" data-parsley-type="email" class="form-control" id="input-email"
                                        placeholder="E-Mail" value="{{ $profile->email }}" name="email">
                                </div>
                                <div class="form-group required">
                                    <label for="input-telephone" class="control-label">Phone</label>
                                    <input type="tel" data-parsley-required data-parsley-type="digits" readonly
                                        data-parsley-minlength="10" data-parsley-maxlength="10" class="form-control"
                                        id="input-telephone" placeholder="Telephone" value="{{ $profile->mobile_number }}"
                                        name="phone">
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Newsletter</legend>
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-3 col-xs-3 control-label">Subscribe</label>
                                    <div class="col-md-10 col-sm-9 col-xs-9">
                                        <label class="radio-inline">
                                            <input type="radio" value="1"
                                                {{ $profile->newsletter ? 'checked' : null }} name="newsletter"> Yes
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" {{ !$profile->newsletter ? 'checked' : null }}
                                                value="0" name="newsletter"> No
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                            <br>
                        </div>

                        <div class="col-sm-6">
                            <fieldset id="address">
                                <legend>Shipping Details</legend>
                                <div class="form-group required">
                                    <label for="input-address-1" class="control-label">Address 1</label>
                                    <input type="text" data-parsley-required class="form-control" id="input-address-1"
                                        placeholder="Address 1" value="{{ $profile->address_1 }}" name="address_1">
                                </div>
                                <div class="form-group required">
                                    <label for="input-address-1" class="control-label">Address 2</label>
                                    <input type="text" class="form-control" id="input-address-1" placeholder="Address 1"
                                        value="{{ $profile->address_2 }}" name="address_2">
                                </div>
                                <div class="form-group required">
                                    <label for="input-city" class="control-label">City</label>
                                    <select data-parsley-required name="city" id="city"
                                        class="form-control js-example-basic-single">
                                        <option value selected disabled>Choose one</option>
                                        @foreach ($cities as $c)
                                            <option {{ $profile->city_id == $c->loc_id ? 'selected' : null }}
                                                value="{{ $c->loc_id }}">{{ $c->loc_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <div class="form-group">
                                    <label for="input-postcode" class="control-label">Post
                                        Code</label>
                                    <input type="text" class="form-control" id="input-postcode"
                                        placeholder="Post Code" value="{{ $profile->postal_code }}" name="postal_code">
                                </div> --}}
                                <div class="form-group required">
                                    <label for="input-telephone" class="control-label">Referral Link</label>
                                    <input type="tel" data-parsley-required readonly class="form-control"
                                        id="input-telephone" placeholder="Telephone"
                                        value="{{ env('APP_URL') }}?ref={{ $profile->share_token }}" name="phone">
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="buttons clearfix">
                        <div class="pull-right">
                            <input type="submit" class="btn btn-md btn-primary" value="Save Changes">
                        </div>
                    </div>
                </form>
                <form action="{{ route('user.update.pass') }}" id="form_pass" method="post">
                    @csrf
                    <div class="row" id="#password">
                        <legend>Change Password</legend>
                        @if ($message = Session::get('success-pass'))
                            <div class="alert alert-primary icons-alert">
                                <p><strong>Success!</strong> {{ $message }}
                                </p>
                            </div>
                        @endif
                        @if ($message = Session::get('error-pass'))
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
                        <div class="col-sm-4">
                            <fieldset>
                                <div class="form-group required">
                                    <label for="input-password" class="control-label">Old Password</label>
                                    <input type="password" data-parsley-required class="form-control" id="input-password"
                                        placeholder="Old Password" value="" name="old_password">
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-sm-4">
                            <fieldset>
                                <div class="form-group required">
                                    <label for="input-password" class="control-label">New Password</label>
                                    <input type="password" data-parsley-required class="form-control" id="new_password"
                                        placeholder="New Password" value="" name="password">
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-sm-4">
                            <fieldset>
                                <div class="form-group required">
                                    <label for="input-confirm" class="control-label">New Password Confirm</label>
                                    <input type="password" data-parsley-required data-parsley-equalto="#new_password"
                                        class="form-control" id="input-confirm" placeholder="New Password Confirm"
                                        value="" name="new_confirm">
                                </div>
                            </fieldset>
                        </div>


                        {{-- <div class="col-sm-6">
                                <fieldset id="shipping-address">
                                    <legend>Shipping Address</legend>
                                    <div class="form-group required">
                                        <label for="input-address-1" class="control-label">Address 1</label>
                                        <input type="text" class="form-control" id="input-address-1"
                                            placeholder="Address 1" value="{{ $profile->address_1 }}" name="address_1">
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-address-1" class="control-label">Address 2</label>
                                        <input type="text" class="form-control" id="input-address-1"
                                            placeholder="Address 1" value="{{ $profile->address_2 }}" name="address_2">
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-city" class="control-label">City</label>
                                        <select data-parsley-required name="city" id="city" class="form-control">
                                            <option value selected disabled>Choose one</option>
                                            @foreach ($cities as $c)
                                                <option {{ $profile->city_id == $c->loc_id ? 'selected' : null }}
                                                    value="{{ $c->loc_id }}">{{ $c->loc_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-postcode" class="control-label">Post Code</label>
                                        <input type="text" class="form-control" id="input-postcode"
                                            placeholder="Post Code" value="{{ $profile->postal_code }}" name="postcode">
                                    </div>
                                </fieldset>
                            </div> --}}
                    </div>
                    <div class="buttons clearfix">
                        <div class="pull-right">
                            <input type="submit" class="btn btn-md btn-primary" value="Update Password">
                        </div>
                    </div>
                </form>
            </div>
            <!--Middle Part End-->

        </div>
    </div>
@endsection

@section('scripts')
    <!-- Select 2 js -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript" src="{{ asset('files\custom\parsley\parsley.js') }}"></script>
    <script type="text/javascript" src="{{ asset('files\custom\parsley\parsley.min.js') }}"></script>
    <script>
        $('.js-example-basic-single').select2();
        $('#form').parsley();
        $('#form_pass').parsley();
    </script>
@endsection
