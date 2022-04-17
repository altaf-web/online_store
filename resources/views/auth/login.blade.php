@extends('auth.layout.app')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <!-- Authentication card start -->

            <form class="md-float-material form-material" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="text-center">
                    <img src="assets/images/logo.png" alt="logo.png">
                </div>

                <div class="auth-box card">
                    <div class="card-block">
                        <div class="row m-b-20">
                            <div class="col-md-12">
                                <h3 class="text-center">Sign In</h3>
                            </div>
                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />
                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4 alert alert-danger" :errors="$errors" />
                        </div>
                        {{--email--}}
                        <div class="form-group form-primary">
                            <input type="email" name="email" class="form-control" value="{{ old("email") }}">
                            <span class="form-bar"></span>
                            <label class="float-label">Your Email Address</label>
                        </div>
                        {{--password--}}
                        <div class="form-group form-primary">
                            <input type="password" name="password" class="form-control">
                            <span class="form-bar"></span>
                            <label class="float-label">Password</label>
                        </div>
                        {{--Remember-me--}}
                        <div class="row m-t-25 text-left">
                            <div class="col-12">
                                <div class="checkbox-fade fade-in-primary d-">
                                    <label>
                                        <input type="checkbox" value="">
                                        <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                        <span class="text-inverse">{{ __('Remember me') }}</span>
                                    </label>
                                </div>

                                {{--reset-password--}}
                                <div class="forgot-phone text-right f-right">
                                    <a href="{{ route('password.request') }}" class="text-right f-w-600">{{ __('Forgot your password?') }}</a>
                                </div>

                            </div>
                        </div>
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Login-In</button>
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-md-10">
                                <p class="text-inverse text-left m-b-0">Thank you.</p>
                                <p class="text-inverse text-left"><a href="index.html"><b>Back to website</b></a></p>
                            </div>
                            <div class="col-md-2">
                                <img src="assets/images/auth/Logo-small-bottom.png" alt="small-logo.png">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- end of form -->
        </div>
        <!-- end of col-sm-12 -->
    </div>
@endsection
