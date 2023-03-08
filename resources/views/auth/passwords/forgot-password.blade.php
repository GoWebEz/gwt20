@extends('layouts.app')

@section('content')
<div id="root">
    <div class="login-bg py-5 py-lg-0 d-lg-flex align-items-center">
      <div class="container">
        <div class="card shadow">
          <div class="row">
            <div class="col-12 col-lg-7 d-none d-lg-block">
              <div class="login-bg-img"></div>
            </div>
            <div class="col-12 col-lg-5 ps-lg-0 mt-2">
              <div class="p-3 py-md-4 px-md-5">
                <div class="text-center py-3  mt-3 mt-md-4"><a href="#"><img
                      src="/images/logo.png?3b1f2b20d1cbede4f1281da673189320" alt="logo" class="logo_img w-50"></a></div>
                <div class="px-md-3">
                  <form id='forgot-password'>
                    @csrf
                    <div class="mb-2 UserName position-relative form-group"><label class="py-2 fs-6"></label><input
                        type="text" placeholder="Username or E-Mail Address" name="name_email"
                        class="form-control w-md-100 " data-name="forgotName" value="">
                      <div class="position-absolute"></div>
                    </div>
                    <div class="mb-2 Lastname position-relative form-group"><label class="py-2 fs-6"></label><input
                        type="text" placeholder="Lastname" name="last_name" class="form-control w-md-100 "
                        data-name="forgotLastName" value="">
                      <div class="position-absolute"></div>
                    </div>
                    <div class="pt-4 my-3 my-md-4"><button type="submit"
                        class="w-100  bordererrors-0 forgot-password buttons btn text-white fs-6 text">Send Reset Link</button></div>
                    <div class="mt-3 mt-md-4  text-end"><a href="{{ route('login') }}" class="forgot">Back to login</a></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
