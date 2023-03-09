@extends('layouts.app')

@section('content')
@auth
<div class="body-container">
    <div class="landing-home d-flex align-items-center text-center w-100">
        <div class="container landing-home-container">
            <div class="d-md-flex  align-items-center justify-content-around py-5">
                <div>
                    <div class="white-card mx-auto">
                        <div class="card-bg"><img
                                src="/images/waterIcon.png?3194b4b9918fbad37643deae7336fbdf"
                                class="home-icons"></div>
                    </div>
                    <p class="content-text py-4 mb-0">WATER<br>CONSERVATION</p>
                    <div class=""><a href="/water-consumption"><button
                                class="btn buttons text-white px-4 py-2">View More</button></a></div>
                </div>
                <div class="mt-5 mt-md-0">
                    <div class="white-card mx-auto">
                        <div class="card-bg"><img src="/images/temIcon.png?72cc00907c535f2c3be00bd8f875d35b"
                                class="home-icons"></div>
                    </div>
                    <p class="content-text py-4 mb-0">ENERGY<br>MANAGEMENT</p>
                    <div class=""><a href="/temperature-maintenance"><button
                                class="btn buttons text-white px-4 py-2">View More</button></a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        data-bs-backdrop="static" data-bs-keyboard="false" style="display: none;" aria-hidden="true">
        <div class=" modal-dialog modal-lg d-flex justify-content-center align-items-center">
            <div class=" modal-content text-decoration-none border-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Password</h5><button type="button"
                        class="btn-close text-white" data-bs-dismiss="modal" id="modal-close"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="my-2  col-md-6 position-relative"><label
                                    class="undefined py-2 fs-6">User Name</label><select
                                    class="form-select form-control " name="user_name" data-value="">
                                    <option value="">Select User Name</option>
                                    <option value="sakthi">sakthi</option>
                                </select>
                                <div class="position-absolute"></div>
                            </div>
                            <div class="my-2  col-md-6 position-relative form-group"><label
                                    class="py-2 fs-6">Email Address</label><input type="text"
                                    placeholder="Enter Email Address" name="email"
                                    class="form-control w-md-100 " readonly="" value="">
                                <div class="position-absolute"></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4 mt-md-4 mt-lg-3">
                            <div class="px-2"><button type="submit"
                                    class="btn buttons px-4 text-white py-1">Send Mail</button></div>
                            <div class="px-2"><button type="button"
                                    class="btn bg-secondary px-4 text-white py-1"
                                    data-bs-dismiss="modal">Cancel</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endauth
@endsection
