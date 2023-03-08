@extends('layouts.app')

@section('content')
<div id="root">
    <div class="login-bg py-5 py-lg-0 d-lg-flex align-items-center">
        <div class="container">
            <div class="card shadow">
                <div class="row">
                    <div class="col-12 col-lg-7 d-none d-lg-block">
                        <div class="login-bg-img">

                        </div>
                    </div>
                    <div class="col-12 col-lg-5 ps-lg-0 mt-2">
                        <div class="p-3 py-md-4 px-md-5">
                            <div class="text-center py-3  mt-3 mt-md-4">
                                <a href="#"><img src="{{ asset('images/logo.png') }}" alt="logo"
                                        class="logo_img w-50">
                                </a>
                            </div>
                            <div class="px-md-3">
                                <div>
                                    <form id="login-form">
                                        @csrf
                                        <div class="mb-2 UserName position-relative form-group">
                                            <label class="py-2 fs-6"></label>
                                            <input type="text" placeholder="Username" name="user_name"
                                                class="form-control w-md-100 user-name" data-name="userName" value="">
                                            <div class="position-absolute"></div>
                                            <small class="error_empty"></small>
                                        </div>
                                        <div class=" mb-2 password position-relative">
                                            <label class="py-2 fs-6"></label>
                                                <input type="password"
                                                placeholder="Password" name="password"
                                                class="form-control w-md-100 password" data-name="password"
                                                value=""><span class="d-block"><i
                                                    class="fa-solid fa-eye-slash eye-icon"></i></span>
                                                    <div class="position-absolute"></div>
                                                    <small id="error_empty"></small>
                                        </div>
                                        <div class="pt-4 my-3 my-md-4">
                                            <button type="submit" class="w-100 bordererrors-0 buttons btn text-white fs-6 text login">Login</button>
                                        </div>
                                    </form>
                                    <div class="text-end px-md-3 pt-md-2"><a href="{{ route('forgot-password') }}" class="forgot text-decoration-none">Forgot
                                            Password?</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
