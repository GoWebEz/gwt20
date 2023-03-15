<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GWT2ENERGY') }}</title>
    <!-- Bootstrap Css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <!-- Fonts Family -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;700&amp;family=Poppins:ital,wght@0,100;0,400;0,500;1,100;1,300;1,600;1,700&amp;family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,500;1,900&amp;display=swap"
    rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Toastr -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>
    <div class="loader-container d-none">
        <span class="loader">
            
        </span>
        {{-- <h3 class="text-white"> Loading...</h3 class="text-white"> --}}
    </div>
    
    <div id="app" class="master-container">
        @auth
        <div>
            <header>
                <div class="landing-page-image">
                    <div class="image-container d-flex justify-content-md-between ">
                        <div class="gwt-logo d-flex align-items-center justify-content-start"><a class=""
                                href="/home"><img src="/images/logo.png?3b1f2b20d1cbede4f1281da673189320"></a></div>
                        <div class="flash-content d-flex align-items-center justify-content-end">
                            <h3 class="mb-0 text-white me-2 me-xl-3">SAVE ENERGY</h3><img
                                src="/images/energy.png?ffaf91e3e2baac328b2b99bbc678fea4">
                        </div>
                        <div
                            class="group-content d-none d-md-block d-flex align-items-center justify-content-center me-2 me-lg-0">
                            <img src="/images/group img.png?7cfbc3fd8cdef3f5487a6137c1c4328a">
                        </div>
                    </div>
                </div>
                <nav class="navbar navbar-expand-lg bg-light">
                    <div class="container-fluid"><button class="navbar-toggler" type="button"
                            data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
                            aria-controls="navbarTogglerDemo01" aria-expanded="false"
                            aria-label="Toggle navigation"><span class="navbar-toggler-icon"><i
                                    class="fa-solid fa-bars text-black"></i></span></button>
                        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                            <ul class="navbar-nav  px-2 main_menu">
                                <li class="nav-item py-md-1 my-2 my-lg-0 px-3    mx-lg-1 "><a
                                        class="nav-link  text-lg-center text-dark" href="/home"><span
                                            class="pe-2"><i class="fa-solid fa-house"></i></span>HOME</a></li>
                                <li class="nav-item py-md-1 my-2 my-lg-0 py-md-1 px-3    mx-lg-1 "><a
                                        class="nav-link  text-lg-center text-dark" href="/water-consumption"><span
                                            class="pe-2"><img
                                                src="/images/water black.png?e81219ed68ce21bc37c2198c763cb04f"
                                                class="menu-image"></span>WATER
                                        CONSERVATION</a></li>
                                <li class="nav-item py-md-1 px-3 py-md-1 my-2 my-lg-0   mx-lg-1 "><a
                                        class="nav-link  text-lg-center text-dark"
                                        href="/temperature-maintenance"><span class="pe-2"><img
                                                src="/images/energy black.png?fd73d1a0634981b984d160c2f4d0f6c6"
                                                class="menu-image"></span>ENERGY MANAGEMENT</a></li>
                                <li class="nav-item py-md-1 px-3   mx-lg-1 activeMenu"><span
                                        class="nav-link text-white"><span class="pe-2"><i
                                                class="fa-solid fa-lock"></i></span>ADMIN</span>
                                    <ul class="dropdown shadow">
                                        <li class="activeMenu"><a class="text-dark active" href="/admin/user">Users</a></li>
                                        <li class=""><a class="text-dark" href="/admin/client">Clients</a></li>
                                        <li class=""><a class="text-dark" href="/admin/device">Devices</a>
                                        </li>
                                        <li class=""><a class="text-dark" href="/admin/location">Locations</a>
                                        </li>
                                        <li class=""><a class="text-dark"
                                                href="/admin/designation" aria-current="page">Designations</a>
                                        </li>
                                        <li class=""><a class="text-dark" href="/admin/user-location">User
                                                Locations</a></li>
                                        <li class=""><a class="text-dark" href="/admin/global-setting">Global
                                                Settings</a></li>
                                        <li class=""><a class="text-dark" href="/admin/deviceRefreshLogs">Device
                                                Refresh Logs</a></li>
                                        <li class=""><a class="text-dark"
                                                href="/admin/waterConservationApiLogs">Water Conservation Api
                                                Logs</a></li>
                                        <li class=""><a class="text-dark"
                                                href="/admin/deviceModeSetpointLogs">Device Mode Setpoint
                                                Logs</a></li>
                                        <li><a class="text-dark" data-bs-toggle="modal"
                                                data-bs-target="#changePasswordModal"
                                                id="change-pwd-modal-close">Change Password</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item py-md-1 px-3 py-md-1 my-2 my-lg-0  mx-lg-1">
                                    <a class="nav-link text-lg-center text-black " href="{{ route('logout') }}"><span class="pe-2"><i
                                                class="fa-solid fa-arrow-right-from-bracket"></i></span>LOGOUT</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
        </div>
        @endauth
        {{-- <main class=""> --}}
            @yield('content')
        {{-- </main> --}}
        @auth
            <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
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
            <footer>
                <div class="footer-container text-center mb-0">
                    <div class="footer-content  py-3">
                        <p class="text-white mb-0">Copyright © 2022 - 2024 GWT2Energy </p>
                    </div>
                </div>
            </footer>
        @endauth
    </div>
    
    
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
     integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
     crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
     integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
     crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
     {{-- <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script> --}}
     
     <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script src="{{ asset('js/auth.js') }}"></script>
</body>
</html>
