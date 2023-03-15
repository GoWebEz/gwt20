@extends('layouts.app')

@section('content')
<div id="root">
  <div class="login-bg py-5 py-lg-0 d-lg-flex align-items-center">
      <div class="container">
          <div class="card shadow">
              <div class="row">
                  <div class="col-12 col-lg-7 pe-lg-0 d-none d-lg-block">
                      <div class="login-bg-img"></div>
                  </div>
                  <div class="col-12 col-lg-5 ps-lg-0">
                      <div class="p-3 px-md-5">
                          <div class="text-center py-3  mt-3 mt-md-4"><img
                                  src="/images/logo.png?3b1f2b20d1cbede4f1281da673189320" alt="logo" class="logo_img">
                          </div>
                          <div class="px-md-3">
                              <div>
                                  <form id="reset-form">
                                    @csrf
                                      <div class="mb-3 email position-relative form-group"><label
                                              class="py-2 fs-6"></label>
                                              <input type="text" placeholder="E-Mail Address" name="email" class="form-control w-md-100 "
                                              data-name="email" value="">
                                              <input type="hidden" placeholder="E-Mail Address" name="_token" class="form-control w-md-100 "
                                              data-name="email" value="">
                                          <div class="position-absolute"></div>
                                      </div>
                                      <div class=" mb-3 new_password position-relative"><label
                                              class="py-2 fs-6"></label>
                                              <input type="password" id="new_password" placeholder="New Password" name="new_password"
                                              class="form-control w-md-100 password " data-name="new_password"
                                              value=""><span class="d-block">
                                                <i class="fa-solid fa-eye-slash eye-icon"></i></span>
                                          <div class="position-absolute"></div>
                                      </div>
                                      <div class="mb-3 confirm_password position-relative form-group"><label
                                              class="py-2 fs-6"></label>
                                              <input type="text"
                                              placeholder="Confirm Password" name="confirm_password"
                                              class="form-control w-md-100 " data-name="confirm_password" value="">
                                          <div class="position-absolute"></div>
                                      </div>
                                      <div class="pt-3 my-3 my-md-4"><button type="submit"
                                              class="w-100  border-0 reset-password buttons btn text-white fs-5  text">Update
                                              Password</button></div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="Toastify"></div>
</div>
@endsection
