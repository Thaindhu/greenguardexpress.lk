@extends('user.layouts.app')

@section('title')
    Myproduct.lk | Forgot password
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
                            <form action="{{ route('user.reset.passoword') }}" method="post" id="form">
                                @csrf

                                <div class="col-sm-6 col-sm-offset-3">
                                    <div class="well">
                                        <h2><i class="fa fa-file-text-o" aria-hidden="true"></i> Forget Password</h2>

                                        <p><strong>Please enter one time password</strong></p>
                                        <div class="form-group">
                                            <label class="control-label " for="input-email">Password</label>
                                            <input type="password" name="password" data-parsley-required
                                                value="{{ old('password') }}" placeholder="Password" id="input-password"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label " for="input-email">Confirm Password</label>
                                            <input type="password" name="re_password" data-parsley-required
                                                data-parsley-equalto="#input-password" value="{{ old('re_password') }}"
                                                placeholder="Password Confirm" id="input-confirm" class="form-control">
                                        </div>
                                        <input type="text" name="mobile_number" hidden
                                            value="{{ $data['mobile_number'] }}" />
                                        <input type="text" hidden name="otp" value="{{ $data['otp'] }}" />
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
