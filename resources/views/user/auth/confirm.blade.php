@extends('user.layouts.app')

@section('title')
    greenguardexpress.lk | Forgot password
@endsection

@section('styles')
@endsection

@section('content')
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li><a href="#">Account</a></li>
            <li><a href="#">Registration</a></li>
        </ul>

        <div class="row">
            <div id="content" class="col-sm-12">
                <div class="page-login">

                    <div class="account-border">
                        <div class="row">
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
                            <form action="{{ route('user.account.verify') }}" method="post" id="form">
                                @csrf
                                <div class="col-sm-6 col-sm-offset-3">
                                    <div class="well">
                                        <h2>We have send an one time
                                            password to your mobile. Please use it to verify your account.</h2>

                                        <p><strong>Please enter one time password</strong></p>
                                        <div class="form-group">
                                            <label class="control-label " for="input-email">OTP</label>
                                            <input type="text" data-parsley-required data-parsley-type="digits"
                                                data-parsley-minlength="6" data-parsley-maxlength="6" name="otp"
                                                value="" id="input-otp" class="form-control" />

                                            <input type="text" readonly hidden name="mobile_number"
                                                value="{{ $mobile }}" />
                                            <input type="text" readonly hidden name="password"
                                                value="{{ $pass }}" />
                                        </div>
                                    </div>
                                    <div class="bottom-form">
                                        <input type="submit" value="Validate" class="btn btn-default pull-right" />
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
