@extends('user.layouts.app')

@section('title')
    greenguardexpress.lk | Login
@endsection

@section('styles')
<style>
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
</style>
@endsection

@section('content')
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li><a href="#">Account</a></li>
            <li><a href="#">Login</a></li>
        </ul>

        <div class="row">
            <div id="content" class="col-sm-12">
                <div class="page-login">

                    <div class="account-border">
                        <div class="row">
                            <div class="col-sm-6 new-customer hidden-xs">
                                <div class="well">
                                    <h2><i class="fa fa-file-o" aria-hidden="true"></i> New Customer</h2>
                                    <p>By creating an account you will be able to shop faster, be up to date on an order's
                                        status, and keep track of the orders you have previously made.</p>
                                </div>
                                <div class="bottom-form">
                                    <a href="{{ route('user.register') }}" class="btn btn-default pull-right">Continue</a>
                                </div>
                            </div>

                            <form action="{{ route('user.auth_check') }}" method="post" id="form">
                                @csrf
                                <div class="col-sm-6 customer-login">
                                    <div class="well">
                                        <h2><i class="fa fa-file-text-o" aria-hidden="true"></i> Returning Customer</h2>
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
                                        <p><strong>I am a returning customer</strong></p>
                                        <div class="form-group">
                                            <label class="control-label " for="input-email">Mobile Number</label>
                                            <input type="text" data-parsley-required data-parsley-type="digits"
                                                data-parsley-minlength="10" data-parsley-maxlength="10" name="mobile_number"
                                                value="{{ old('mobile_number') }}" id="input-mobile_number" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label " for="input-password">Password</label>
                                            <input type="password" data-parsley-required name="password"
                                                value="{{ old('password') }}" id="input-password" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="bottom-form">
                                        <a href="/forgot-password" class="forgot">Forgot Password?</a><br>
                                        <a href="/register" class="forgot">Create an Account</a>
                                        <input type="submit" value="Login" class="btn btn-default pull-right" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('files\custom\parsley\parsley.js') }}"></script>
    <script type="text/javascript" src="{{ asset('files\custom\parsley\parsley.min.js') }}"></script>
    <script>
        $('#form').parsley();
    </script>
@endsection
