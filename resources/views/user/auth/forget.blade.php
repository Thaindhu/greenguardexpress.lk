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
            <li><a href="#">Reset Password</a></li>
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

                            <form action="{{ route('user.send.otp') }}" method="post" id="form">
                                @csrf
                                <div class="col-sm-6 col-sm-offset-3">
                                    <div class="well">
                                        <h2><i class="fa fa-file-text-o" aria-hidden="true"></i> Forget Password</h2>

                                        <p><strong>Please enter your mobile number that you used to sign up</strong>
                                        </p>
                                        <div class="form-group">
                                            <label class="control-label " for="input-email">Mobile Number</label>
                                            <input type="text" data-parsley-required data-parsley-type="digits"
                                                data-parsley-minlength="10" data-parsley-maxlength="10" name="mobile_number"
                                                value="{{ old('mobile_number') }}" id="input-mobile_number"
                                                class="form-control" />
                                        </div>
                                    </div>
                                    <div class="bottom-form">
                                        <input type="submit" value="Send OTP" class="btn btn-default pull-right" />
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
