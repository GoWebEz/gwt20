@extends('layouts.app')

@section('content')
    @auth
    <div class="body-container">
        <div class="location-container container-lg w-100">
            <div class="d-flex align-items-center title">
                <h3 class="title-text m-0 me-1">Location List</h3>
                <div class="indicator"></div>
            </div>
            <div class="tab-section d-flex flex-column flex-xl-row justify-content-between mt-4 mb-3 mb-lg-5">
                <ul class="nav nav-pills" id="myTab" role="tablist">
                    <li class="nav-item " role="presentation"><a
                            class="active active-user text-dark text-decoration-none" id="home-tab"
                            data-bs-toggle="pill" data-bs-target="#active" type="button" role="tab"
                            aria-controls="home" data-name="activeTab" aria-selected="true"><img
                                src="/images/location.svg?4d1411359aaf6b645538161a548bb8ba" class="mx-1"
                                width="21px">Active Locations</a></li>
                    <li class="nav-item " role="presentation"><a
                            class=" inactive-user text-dark text-decoration-none" id="home-tab"
                            data-bs-toggle="pill" data-bs-target="#inActive" type="button" role="tab"
                            aria-controls="home" data-name="inActiveTab" aria-selected="false"><img
                                src="/images/location-inactive.svg?025f9e4612fcc32e2e5ebacff0f4e8c2"
                                class="mx-1" width="20px">Inactive Locations</a></li>
                </ul>
                <div
                    class="features-section d-flex justify-content-between flex-wrap align-items-center mt-3 mt-lg-4 mt-xl-0">
                    <div class="d-flex field-container flex-wrap">
                        <div
                            class="d-flex search bg-white category-select-dropdown rounded position-relative my-sm-3 my-lg-0 me-sm-3 border-0">
                            <select class="category-select px-1 ">
                                <option>Select Category</option>
                                <option value="Bayweb">Bayweb</option>
                                <option value="Water Watch">Water Watch</option>
                            </select>
                        </div>
                        <div class="d-flex search bg-white rounded position-relative my-sm-3 my-lg-0 me-sm-3">
                            <input type="text" placeholder="Search" value=""><svg
                                class="search-svg position-absolute" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 30 30">
                                <path
                                    d="M 13 3 C 7.4889971 3 3 7.4889971 3 13 C 3 18.511003 7.4889971 23 13 23 C 15.396508 23 17.597385 22.148986 19.322266 20.736328 L 25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969 L 20.736328 19.322266 C 22.148986 17.597385 23 15.396508 23 13 C 23 7.4889971 18.511003 3 13 3 z M 13 5 C 17.430123 5 21 8.5698774 21 13 C 21 17.430123 17.430123 21 13 21 C 8.5698774 21 5 17.430123 5 13 C 5 8.5698774 8.5698774 5 13 5 z">
                                </path>
                            </svg>
                        </div>
                        <div
                            class="d-flex align-items-center select-box me-2 me-sm-3 my-1 my-lg-0 mb-1 mb-lg-0 justify-content-center">
                            <span class="me-2 entires-text">Show</span>
                            <div class="entires-select-option"><select class="" name="entires_count"
                                    data-value="10">
                                    <option class="d-none" value="">Select </option>
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                    <option value="50">50</option>
                                </select></div><span class="ms-2 entires-text">entries</span>
                        </div>
                    </div>
                    <div class="addLocationBtn"><button id="add-modal-close"
                            class="btn text-nowrap add-btn buttons text-white px-2" data-bs-toggle="modal"
                            data-bs-target="#addLocationModal"><span class="pe-2"><i
                                    class="fa-solid fa-circle-plus text-white"></i></span>Add Location</button>
                        <div class="modal fade" id="addLocationModal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static"
                            data-bs-keyboard="false">
                            <div
                                class=" modal-dialog modal-lg d-flex justify-content-center align-items-center">
                                <div class=" modal-content text-decoration-none border-0">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Location</h5><button
                                            type="button" class="btn-close text-white" data-bs-dismiss="modal"
                                            id="modal-close" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="row">
                                                <div class="my-2  col-md-6 position-relative"><label
                                                        class="undefined py-2 fs-6">Category</label><select
                                                        class="form-select form-control " name="category_name"
                                                        data-value="">
                                                        <option value="">Select Category</option>
                                                        <option value="Bayweb">Bayweb</option>
                                                        <option value="Water Watch">Water Watch</option>
                                                    </select>
                                                    <div class="position-absolute"></div>
                                                </div>
                                                <div class="my-2 col-md-6 position-relative form-group"><label
                                                        class="py-2 fs-6">Location Code</label><input
                                                        type="text" placeholder="Enter Location Code"
                                                        name="location_code" class="form-control w-md-100 "
                                                        data-name="notAllowSpecial" value="">
                                                    <div class="position-absolute"></div>
                                                </div>
                                                <div class="my-2 col-md-6 position-relative form-group"><label
                                                        class="py-2 fs-6">Location Name</label><input
                                                        type="text" placeholder="Enter Location Name"
                                                        name="location_name" class="form-control w-md-100 "
                                                        value="">
                                                    <div class="position-absolute"></div>
                                                </div>
                                                <div class="my-2 col-md-6 position-relative form-group"><label
                                                        class="py-2 fs-6">Primary E-mail</label><input
                                                        type="text" placeholder="Enter Primary E-mail"
                                                        name="primary_email" class="form-control w-md-100 "
                                                        data-name="email" value="">
                                                    <div class="position-absolute"></div>
                                                </div>
                                                <div class="my-2 col-md-6 position-relative form-group"><label
                                                        class="py-2 fs-6">Secondary E-mail</label><input
                                                        type="text" placeholder="Enter Secondary E-mail"
                                                        name="secondary_email" class="form-control w-md-100 "
                                                        data-name="email" value="">
                                                    <div class="position-absolute"></div>
                                                </div>
                                                <div class=" my-2 col-md-6 col-lg-3 position-relative"><label
                                                        class="undefined py-2 fs-6">State</label><select
                                                        class="form-select form-control " name="state"
                                                        data-value="">
                                                        <option value="">Select State</option>
                                                    </select>
                                                    <div class="position-absolute"></div>
                                                </div>
                                                <div class="my-2 col-md-6 col-lg-3 position-relative"><label
                                                        class="undefined py-2 fs-6">City</label><select
                                                        class="form-select form-control " name="city"
                                                        data-value="">
                                                        <option value="">Select City</option>
                                                    </select>
                                                    <div class="position-absolute"></div>
                                                </div>
                                                <div
                                                    class="my-2 col-md-6 col-lg-4 position-relative form-group">
                                                    <label class="py-2 fs-6">ZMW</label><input type="text"
                                                        placeholder="Enter ZMW" name="ZMW"
                                                        class="form-control w-md-100 " disabled="" value="">
                                                    <div class="position-absolute"></div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end mt-3">
                                                <div class="px-2"><button type="submit"
                                                        class="btn buttons px-4 text-white py-1">Save</button>
                                                </div>
                                                <div class="px-2"><button type="button" id="addCancel"
                                                        class="btn bg-secondary px-4 text-white py-1">Clear</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="ViewLocationModal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static"
                            data-bs-keyboard="false">
                            <div
                                class=" modal-dialog modal-lg d-flex justify-content-center align-items-center">
                                <div class="viewContent modal-content text-decoration-none border-0">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">View undefined's Location
                                        </h5><button type="button" class="btn-close text-white"
                                            data-bs-dismiss="modal" id="modal-close"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="viewLocation">
                                            <div class="row align-items-start">
                                                <div class="col-lg-6">
                                                    <div class="d-flex py-2 justify-content-between">
                                                        <div class="col-4 me-4  viewRefreshHead">
                                                            <p class="fw-bold">Location Code:</p>
                                                        </div>
                                                        <div class="col-8">
                                                            <p></p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex py-2 justify-content-between">
                                                        <div class="col-4 me-4 viewRefreshHead">
                                                            <p class="fw-bold">Location Name:</p>
                                                        </div>
                                                        <div class="col-8">
                                                            <p></p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex py-2 justify-content-between">
                                                        <div class="col-4 me-4 viewRefreshHead">
                                                            <p class="fw-bold">Client Name:</p>
                                                        </div>
                                                        <div class="col-8">
                                                            <p>-</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex py-2 justify-content-between">
                                                        <div class="col-4 me-4 viewRefreshHead">
                                                            <p class="fw-bold">Primary Email:</p>
                                                        </div>
                                                        <div class="col-8">
                                                            <p>-</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex py-2 justify-content-between">
                                                        <div class="col-4 me-4 viewRefreshHead">
                                                            <p class="fw-bold"> Secondary Email:</p>
                                                        </div>
                                                        <div class="col-8">
                                                            <p>-</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex py-2 justify-content-between">
                                                        <div class="col-4 me-4 viewRefreshHead">
                                                            <p class="fw-bold">State Name:</p>
                                                        </div>
                                                        <div class="col-8">
                                                            <p></p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex py-2 justify-content-between">
                                                        <div class="col-4 me-4 viewRefreshHead">
                                                            <p class="fw-bold">City:</p>
                                                        </div>
                                                        <div class="col-8">
                                                            <p></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="d-flex py-2 justify-content-between">
                                                        <div class="col-5 me-4 viewRefreshHead">
                                                            <p class="fw-bold">ZMW:</p>
                                                        </div>
                                                        <div class="col-7">
                                                            <p></p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex py-2 justify-content-between">
                                                        <div class="col-5 me-4 viewRefreshHead">
                                                            <p class="fw-bold">Start Up Hour:</p>
                                                        </div>
                                                        <div class="col-7">
                                                            <p></p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex py-2 justify-content-between">
                                                        <div class="col-5 me-4 viewRefreshHead">
                                                            <p class="fw-bold">Opening Hour:</p>
                                                        </div>
                                                        <div class="col-7">
                                                            <p></p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex py-2 justify-content-between">
                                                        <div class="col-5 me-4 viewRefreshHead">
                                                            <p class="fw-bold">Closing Hour:</p>
                                                        </div>
                                                        <div class="col-7">
                                                            <p></p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex py-2 justify-content-between">
                                                        <div class="col-5 me-4 viewRefreshHead">
                                                            <p class="fw-bold">Shut Down Hour:</p>
                                                        </div>
                                                        <div class="col-7">
                                                            <p></p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex py-2 justify-content-between">
                                                        <div class="col-5 me-4 viewRefreshHead">
                                                            <p class="fw-bold">Measurement:</p>
                                                        </div>
                                                        <div class="col-7">
                                                            <p></p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex py-2 justify-content-between">
                                                        <div class="col-5 me-4 viewRefreshHead">
                                                            <p class="fw-bold">Cost Per Liters:</p>
                                                        </div>
                                                        <div class="col-7">
                                                            <p></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 text-end"><button type="button"
                                                        data-bs-dismiss="modal"
                                                        class="btn text-white px-4 py-1 bg-secondary">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="active" role="tabpanel" aria-labelledby="home-tab">
                    <div class="table-container table-responsive-xxl">
                        <table class="table align-middle table-borderless mb-0">
                            <thead class="thead">
                                <tr class="">
                                    <th scope="col">Location Code </th>
                                    <th scope="col">Location Name </th>
                                    <th scope="col">Primary Email </th>
                                    <th scope="col">Secondary Email </th>
                                    <th scope="col">State </th>
                                    <th scope="col">City </th>
                                    <th scope="col">ZMW </th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                {{-- <tr class="text-center">
                                    <td role="false" value="location_code" data-bs-toggle="false"
                                        data-bs-target="false" title="">AA101</td>
                                    <td role="false" value="location_name" data-bs-toggle="false"
                                        data-bs-target="false" title="">Texas</td>
                                    <td role="false" value="primary_email" data-bs-toggle="false"
                                        data-bs-target="false" title="">sm@gmail.com</td>
                                    <td role="false" value="secondary_email" data-bs-toggle="false"
                                        data-bs-target="false" title="">NA</td>
                                    <td role="false" value="state_name" data-bs-toggle="false"
                                        data-bs-target="false" title="">Alabama</td>
                                    <td role="false" value="city" data-bs-toggle="false" data-bs-target="false"
                                        title="">Alabaster</td>
                                    <td role="false" value="ZMW" data-bs-toggle="false" data-bs-target="false"
                                        title="">35007.1.99999</td>
                                    <td>
                                        <div class="d-flex justify-content-center"><button
                                                class="icon btn shadow-none d-flex justify-content-center align-items-center me-2"
                                                data-bs-toggle="modal" data-bs-placement="top"
                                                title="Click here to edit Texas"
                                                data-bs-target="#editLocationModal"><svg width="13" height="18"
                                                    viewBox="0 0 25 25" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.336 13.8404L10.686 14.0764H10.684L10.92 12.4264L21.058 2.29236C21.1502 2.19685 21.2606 2.12067 21.3826 2.06826C21.5046 2.01585 21.6358 1.98826 21.7686 1.98711C21.9014 1.98596 22.0331 2.01126 22.156 2.06154C22.2789 2.11182 22.3905 2.18607 22.4844 2.27996C22.5783 2.37386 22.6525 2.48551 22.7028 2.60841C22.7531 2.7313 22.7784 2.86298 22.7773 2.99576C22.7761 3.12854 22.7485 3.25976 22.6961 3.38176C22.6437 3.50377 22.5675 3.61411 22.472 3.70636L12.336 13.8404ZM24.5368 1.84987C24.3859 1.48576 24.1648 1.15496 23.886 0.876359V0.87836C23.3234 0.315946 22.5605 0 21.765 0C20.9695 0 20.2066 0.315946 19.644 0.87836L9.272 11.2484C9.11925 11.4016 9.0203 11.6002 8.99 11.8144L8.518 15.1144C8.49591 15.2682 8.50996 15.425 8.55904 15.5724C8.60812 15.7198 8.69087 15.8538 8.80074 15.9636C8.9106 16.0735 9.04455 16.1562 9.19197 16.2053C9.33938 16.2544 9.49621 16.2684 9.65 16.2464L12.95 15.7744C13.1645 15.7435 13.3631 15.6438 13.516 15.4904L23.886 5.12036C24.1648 4.84176 24.3859 4.51096 24.5368 4.14685C24.6877 3.78275 24.7654 3.39249 24.7654 2.99836C24.7654 2.60423 24.6877 2.21397 24.5368 1.84987ZM22.2929 12.0492C22.1054 12.2368 22 12.4911 22 12.7563V22.7563H2V2.75635H12C12.2652 2.75635 12.5196 2.65099 12.7071 2.46345C12.8946 2.27592 13 2.02156 13 1.75635C13 1.49113 12.8946 1.23678 12.7071 1.04924C12.5196 0.861705 12.2652 0.756348 12 0.756348H1C0.734784 0.756348 0.48043 0.861705 0.292893 1.04924C0.105357 1.23678 0 1.49113 0 1.75635V23.7563C0 24.0216 0.105357 24.2759 0.292893 24.4635C0.48043 24.651 0.734784 24.7563 1 24.7563H23C23.2652 24.7563 23.5196 24.651 23.7071 24.4635C23.8946 24.2759 24 24.0216 24 23.7563V12.7563C24 12.4911 23.8946 12.2368 23.7071 12.0492C23.5196 11.8617 23.2652 11.7563 23 11.7563C22.7348 11.7563 22.4804 11.8617 22.2929 12.0492Z"
                                                        fill="#0E38CE"></path>
                                                </svg></button><button type="submit"
                                                class="icon btn shadow-none d-flex justify-content-center align-items-center"
                                                data-bs-toggle="modal" title="Click here to inactivate Texas"
                                                data-bs-target="#deleteLocationModal"><img
                                                    src="/images/location-inactive.svg?025f9e4612fcc32e2e5ebacff0f4e8c2"
                                                    alt="Icon" width="55%"></button></div>
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <td role="false" value="location_code" data-bs-toggle="false"
                                        data-bs-target="false" title="">SP108</td>
                                    <td role="false" value="location_name" data-bs-toggle="false"
                                        data-bs-target="false" title="">New York</td>
                                    <td role="false" value="primary_email" data-bs-toggle="false"
                                        data-bs-target="false" title="">NA</td>
                                    <td role="false" value="secondary_email" data-bs-toggle="false"
                                        data-bs-target="false" title="">NA</td>
                                    <td role="false" value="state_name" data-bs-toggle="false"
                                        data-bs-target="false" title="">New York</td>
                                    <td role="false" value="city" data-bs-toggle="false" data-bs-target="false"
                                        title="">Doolins Crossing</td>
                                    <td role="false" value="ZMW" data-bs-toggle="false" data-bs-target="false"
                                        title="">13602.2.99999</td>
                                    <td>
                                        <div class="d-flex justify-content-center"><button
                                                class="icon btn shadow-none d-flex justify-content-center align-items-center me-2"
                                                data-bs-toggle="modal" data-bs-placement="top"
                                                title="Click here to edit New York"
                                                data-bs-target="#editLocationModal"><svg width="13" height="18"
                                                    viewBox="0 0 25 25" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.336 13.8404L10.686 14.0764H10.684L10.92 12.4264L21.058 2.29236C21.1502 2.19685 21.2606 2.12067 21.3826 2.06826C21.5046 2.01585 21.6358 1.98826 21.7686 1.98711C21.9014 1.98596 22.0331 2.01126 22.156 2.06154C22.2789 2.11182 22.3905 2.18607 22.4844 2.27996C22.5783 2.37386 22.6525 2.48551 22.7028 2.60841C22.7531 2.7313 22.7784 2.86298 22.7773 2.99576C22.7761 3.12854 22.7485 3.25976 22.6961 3.38176C22.6437 3.50377 22.5675 3.61411 22.472 3.70636L12.336 13.8404ZM24.5368 1.84987C24.3859 1.48576 24.1648 1.15496 23.886 0.876359V0.87836C23.3234 0.315946 22.5605 0 21.765 0C20.9695 0 20.2066 0.315946 19.644 0.87836L9.272 11.2484C9.11925 11.4016 9.0203 11.6002 8.99 11.8144L8.518 15.1144C8.49591 15.2682 8.50996 15.425 8.55904 15.5724C8.60812 15.7198 8.69087 15.8538 8.80074 15.9636C8.9106 16.0735 9.04455 16.1562 9.19197 16.2053C9.33938 16.2544 9.49621 16.2684 9.65 16.2464L12.95 15.7744C13.1645 15.7435 13.3631 15.6438 13.516 15.4904L23.886 5.12036C24.1648 4.84176 24.3859 4.51096 24.5368 4.14685C24.6877 3.78275 24.7654 3.39249 24.7654 2.99836C24.7654 2.60423 24.6877 2.21397 24.5368 1.84987ZM22.2929 12.0492C22.1054 12.2368 22 12.4911 22 12.7563V22.7563H2V2.75635H12C12.2652 2.75635 12.5196 2.65099 12.7071 2.46345C12.8946 2.27592 13 2.02156 13 1.75635C13 1.49113 12.8946 1.23678 12.7071 1.04924C12.5196 0.861705 12.2652 0.756348 12 0.756348H1C0.734784 0.756348 0.48043 0.861705 0.292893 1.04924C0.105357 1.23678 0 1.49113 0 1.75635V23.7563C0 24.0216 0.105357 24.2759 0.292893 24.4635C0.48043 24.651 0.734784 24.7563 1 24.7563H23C23.2652 24.7563 23.5196 24.651 23.7071 24.4635C23.8946 24.2759 24 24.0216 24 23.7563V12.7563C24 12.4911 23.8946 12.2368 23.7071 12.0492C23.5196 11.8617 23.2652 11.7563 23 11.7563C22.7348 11.7563 22.4804 11.8617 22.2929 12.0492Z"
                                                        fill="#0E38CE"></path>
                                                </svg></button><button type="submit"
                                                class="icon btn shadow-none d-flex justify-content-center align-items-center"
                                                data-bs-toggle="modal" title="Click here to inactivate New York"
                                                data-bs-target="#deleteLocationModal"><img
                                                    src="/images/location-inactive.svg?025f9e4612fcc32e2e5ebacff0f4e8c2"
                                                    alt="Icon" width="55%"></button></div>
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <td role="false" value="location_code" data-bs-toggle="false"
                                        data-bs-target="false" title="">AA102</td>
                                    <td role="false" value="location_name" data-bs-toggle="false"
                                        data-bs-target="false" title="">new yark</td>
                                    <td role="false" value="primary_email" data-bs-toggle="false"
                                        data-bs-target="false" title="">aaa@gmail.com</td>
                                    <td role="false" value="secondary_email" data-bs-toggle="false"
                                        data-bs-target="false" title="">bbb@gmail.com</td>
                                    <td role="false" value="state_name" data-bs-toggle="false"
                                        data-bs-target="false" title="">Alabama</td>
                                    <td role="false" value="city" data-bs-toggle="false" data-bs-target="false"
                                        title="">Auburn</td>
                                    <td role="false" value="ZMW" data-bs-toggle="false" data-bs-target="false"
                                        title="">36830.1.99999</td>
                                    <td>
                                        <div class="d-flex justify-content-center"><button
                                                class="icon btn shadow-none d-flex justify-content-center align-items-center me-2"
                                                data-bs-toggle="modal" data-bs-placement="top"
                                                title="Click here to edit new yark"
                                                data-bs-target="#editLocationModal"><svg width="13" height="18"
                                                    viewBox="0 0 25 25" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.336 13.8404L10.686 14.0764H10.684L10.92 12.4264L21.058 2.29236C21.1502 2.19685 21.2606 2.12067 21.3826 2.06826C21.5046 2.01585 21.6358 1.98826 21.7686 1.98711C21.9014 1.98596 22.0331 2.01126 22.156 2.06154C22.2789 2.11182 22.3905 2.18607 22.4844 2.27996C22.5783 2.37386 22.6525 2.48551 22.7028 2.60841C22.7531 2.7313 22.7784 2.86298 22.7773 2.99576C22.7761 3.12854 22.7485 3.25976 22.6961 3.38176C22.6437 3.50377 22.5675 3.61411 22.472 3.70636L12.336 13.8404ZM24.5368 1.84987C24.3859 1.48576 24.1648 1.15496 23.886 0.876359V0.87836C23.3234 0.315946 22.5605 0 21.765 0C20.9695 0 20.2066 0.315946 19.644 0.87836L9.272 11.2484C9.11925 11.4016 9.0203 11.6002 8.99 11.8144L8.518 15.1144C8.49591 15.2682 8.50996 15.425 8.55904 15.5724C8.60812 15.7198 8.69087 15.8538 8.80074 15.9636C8.9106 16.0735 9.04455 16.1562 9.19197 16.2053C9.33938 16.2544 9.49621 16.2684 9.65 16.2464L12.95 15.7744C13.1645 15.7435 13.3631 15.6438 13.516 15.4904L23.886 5.12036C24.1648 4.84176 24.3859 4.51096 24.5368 4.14685C24.6877 3.78275 24.7654 3.39249 24.7654 2.99836C24.7654 2.60423 24.6877 2.21397 24.5368 1.84987ZM22.2929 12.0492C22.1054 12.2368 22 12.4911 22 12.7563V22.7563H2V2.75635H12C12.2652 2.75635 12.5196 2.65099 12.7071 2.46345C12.8946 2.27592 13 2.02156 13 1.75635C13 1.49113 12.8946 1.23678 12.7071 1.04924C12.5196 0.861705 12.2652 0.756348 12 0.756348H1C0.734784 0.756348 0.48043 0.861705 0.292893 1.04924C0.105357 1.23678 0 1.49113 0 1.75635V23.7563C0 24.0216 0.105357 24.2759 0.292893 24.4635C0.48043 24.651 0.734784 24.7563 1 24.7563H23C23.2652 24.7563 23.5196 24.651 23.7071 24.4635C23.8946 24.2759 24 24.0216 24 23.7563V12.7563C24 12.4911 23.8946 12.2368 23.7071 12.0492C23.5196 11.8617 23.2652 11.7563 23 11.7563C22.7348 11.7563 22.4804 11.8617 22.2929 12.0492Z"
                                                        fill="#0E38CE"></path>
                                                </svg></button><button type="submit"
                                                class="icon btn shadow-none d-flex justify-content-center align-items-center"
                                                data-bs-toggle="modal" title="Click here to inactivate new yark"
                                                data-bs-target="#deleteLocationModal"><img
                                                    src="/images/location-inactive.svg?025f9e4612fcc32e2e5ebacff0f4e8c2"
                                                    alt="Icon" width="55%"></button></div>
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <td role="false" value="location_code" data-bs-toggle="false"
                                        data-bs-target="false" title="">RR708</td>
                                    <td role="false" value="location_name" data-bs-toggle="false"
                                        data-bs-target="false" title="">Indian Lake</td>
                                    <td role="false" value="primary_email" data-bs-toggle="false"
                                        data-bs-target="false" title="">NA</td>
                                    <td role="false" value="secondary_email" data-bs-toggle="false"
                                        data-bs-target="false" title="">NA</td>
                                    <td role="false" value="state_name" data-bs-toggle="false"
                                        data-bs-target="false" title="">Tennessee</td>
                                    <td role="false" value="city" data-bs-toggle="false" data-bs-target="false"
                                        title="">Nashville</td>
                                    <td role="false" value="ZMW" data-bs-toggle="false" data-bs-target="false"
                                        title="">37201.1.99999</td>
                                    <td>
                                        <div class="d-flex justify-content-center"><button
                                                class="icon btn shadow-none d-flex justify-content-center align-items-center me-2"
                                                data-bs-toggle="modal" data-bs-placement="top"
                                                title="Click here to edit Indian Lake"
                                                data-bs-target="#editLocationModal"><svg width="13" height="18"
                                                    viewBox="0 0 25 25" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.336 13.8404L10.686 14.0764H10.684L10.92 12.4264L21.058 2.29236C21.1502 2.19685 21.2606 2.12067 21.3826 2.06826C21.5046 2.01585 21.6358 1.98826 21.7686 1.98711C21.9014 1.98596 22.0331 2.01126 22.156 2.06154C22.2789 2.11182 22.3905 2.18607 22.4844 2.27996C22.5783 2.37386 22.6525 2.48551 22.7028 2.60841C22.7531 2.7313 22.7784 2.86298 22.7773 2.99576C22.7761 3.12854 22.7485 3.25976 22.6961 3.38176C22.6437 3.50377 22.5675 3.61411 22.472 3.70636L12.336 13.8404ZM24.5368 1.84987C24.3859 1.48576 24.1648 1.15496 23.886 0.876359V0.87836C23.3234 0.315946 22.5605 0 21.765 0C20.9695 0 20.2066 0.315946 19.644 0.87836L9.272 11.2484C9.11925 11.4016 9.0203 11.6002 8.99 11.8144L8.518 15.1144C8.49591 15.2682 8.50996 15.425 8.55904 15.5724C8.60812 15.7198 8.69087 15.8538 8.80074 15.9636C8.9106 16.0735 9.04455 16.1562 9.19197 16.2053C9.33938 16.2544 9.49621 16.2684 9.65 16.2464L12.95 15.7744C13.1645 15.7435 13.3631 15.6438 13.516 15.4904L23.886 5.12036C24.1648 4.84176 24.3859 4.51096 24.5368 4.14685C24.6877 3.78275 24.7654 3.39249 24.7654 2.99836C24.7654 2.60423 24.6877 2.21397 24.5368 1.84987ZM22.2929 12.0492C22.1054 12.2368 22 12.4911 22 12.7563V22.7563H2V2.75635H12C12.2652 2.75635 12.5196 2.65099 12.7071 2.46345C12.8946 2.27592 13 2.02156 13 1.75635C13 1.49113 12.8946 1.23678 12.7071 1.04924C12.5196 0.861705 12.2652 0.756348 12 0.756348H1C0.734784 0.756348 0.48043 0.861705 0.292893 1.04924C0.105357 1.23678 0 1.49113 0 1.75635V23.7563C0 24.0216 0.105357 24.2759 0.292893 24.4635C0.48043 24.651 0.734784 24.7563 1 24.7563H23C23.2652 24.7563 23.5196 24.651 23.7071 24.4635C23.8946 24.2759 24 24.0216 24 23.7563V12.7563C24 12.4911 23.8946 12.2368 23.7071 12.0492C23.5196 11.8617 23.2652 11.7563 23 11.7563C22.7348 11.7563 22.4804 11.8617 22.2929 12.0492Z"
                                                        fill="#0E38CE"></path>
                                                </svg></button><button type="submit"
                                                class="icon btn shadow-none d-flex justify-content-center align-items-center"
                                                data-bs-toggle="modal"
                                                title="Click here to inactivate Indian Lake"
                                                data-bs-target="#deleteLocationModal"><img
                                                    src="/images/location-inactive.svg?025f9e4612fcc32e2e5ebacff0f4e8c2"
                                                    alt="Icon" width="55%"></button></div>
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <td role="false" value="location_code" data-bs-toggle="false"
                                        data-bs-target="false" title="">RR318</td>
                                    <td role="false" value="location_name" data-bs-toggle="false"
                                        data-bs-target="false" title="">The Crossing</td>
                                    <td role="false" value="primary_email" data-bs-toggle="false"
                                        data-bs-target="false" title="">thecrossing@redrobin.com</td>
                                    <td role="false" value="secondary_email" data-bs-toggle="false"
                                        data-bs-target="false" title="">gm318@redrobin.com</td>
                                    <td role="false" value="state_name" data-bs-toggle="false"
                                        data-bs-target="false" title="">New York</td>
                                    <td role="false" value="city" data-bs-toggle="false" data-bs-target="false"
                                        title="">Albany</td>
                                    <td role="false" value="ZMW" data-bs-toggle="false" data-bs-target="false"
                                        title="">31701.1.99999</td>
                                    <td>
                                        <div class="d-flex justify-content-center"><button
                                                class="icon btn shadow-none d-flex justify-content-center align-items-center me-2"
                                                data-bs-toggle="modal" data-bs-placement="top"
                                                title="Click here to edit The Crossing"
                                                data-bs-target="#editLocationModal"><svg width="13" height="18"
                                                    viewBox="0 0 25 25" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.336 13.8404L10.686 14.0764H10.684L10.92 12.4264L21.058 2.29236C21.1502 2.19685 21.2606 2.12067 21.3826 2.06826C21.5046 2.01585 21.6358 1.98826 21.7686 1.98711C21.9014 1.98596 22.0331 2.01126 22.156 2.06154C22.2789 2.11182 22.3905 2.18607 22.4844 2.27996C22.5783 2.37386 22.6525 2.48551 22.7028 2.60841C22.7531 2.7313 22.7784 2.86298 22.7773 2.99576C22.7761 3.12854 22.7485 3.25976 22.6961 3.38176C22.6437 3.50377 22.5675 3.61411 22.472 3.70636L12.336 13.8404ZM24.5368 1.84987C24.3859 1.48576 24.1648 1.15496 23.886 0.876359V0.87836C23.3234 0.315946 22.5605 0 21.765 0C20.9695 0 20.2066 0.315946 19.644 0.87836L9.272 11.2484C9.11925 11.4016 9.0203 11.6002 8.99 11.8144L8.518 15.1144C8.49591 15.2682 8.50996 15.425 8.55904 15.5724C8.60812 15.7198 8.69087 15.8538 8.80074 15.9636C8.9106 16.0735 9.04455 16.1562 9.19197 16.2053C9.33938 16.2544 9.49621 16.2684 9.65 16.2464L12.95 15.7744C13.1645 15.7435 13.3631 15.6438 13.516 15.4904L23.886 5.12036C24.1648 4.84176 24.3859 4.51096 24.5368 4.14685C24.6877 3.78275 24.7654 3.39249 24.7654 2.99836C24.7654 2.60423 24.6877 2.21397 24.5368 1.84987ZM22.2929 12.0492C22.1054 12.2368 22 12.4911 22 12.7563V22.7563H2V2.75635H12C12.2652 2.75635 12.5196 2.65099 12.7071 2.46345C12.8946 2.27592 13 2.02156 13 1.75635C13 1.49113 12.8946 1.23678 12.7071 1.04924C12.5196 0.861705 12.2652 0.756348 12 0.756348H1C0.734784 0.756348 0.48043 0.861705 0.292893 1.04924C0.105357 1.23678 0 1.49113 0 1.75635V23.7563C0 24.0216 0.105357 24.2759 0.292893 24.4635C0.48043 24.651 0.734784 24.7563 1 24.7563H23C23.2652 24.7563 23.5196 24.651 23.7071 24.4635C23.8946 24.2759 24 24.0216 24 23.7563V12.7563C24 12.4911 23.8946 12.2368 23.7071 12.0492C23.5196 11.8617 23.2652 11.7563 23 11.7563C22.7348 11.7563 22.4804 11.8617 22.2929 12.0492Z"
                                                        fill="#0E38CE"></path>
                                                </svg></button><button type="submit"
                                                class="icon btn shadow-none d-flex justify-content-center align-items-center"
                                                data-bs-toggle="modal"
                                                title="Click here to inactivate The Crossing"
                                                data-bs-target="#deleteLocationModal"><img
                                                    src="/images/location-inactive.svg?025f9e4612fcc32e2e5ebacff0f4e8c2"
                                                    alt="Icon" width="55%"></button></div>
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <td role="false" value="location_code" data-bs-toggle="false"
                                        data-bs-target="false" title="">RR319</td>
                                    <td role="false" value="location_name" data-bs-toggle="false"
                                        data-bs-target="false" title="">Latham</td>
                                    <td role="false" value="primary_email" data-bs-toggle="false"
                                        data-bs-target="false" title="">latham@redrobin.com</td>
                                    <td role="false" value="secondary_email" data-bs-toggle="false"
                                        data-bs-target="false" title="">gm319@redrobin.com</td>
                                    <td role="false" value="state_name" data-bs-toggle="false"
                                        data-bs-target="false" title="">Ohio</td>
                                    <td role="false" value="city" data-bs-toggle="false" data-bs-target="false"
                                        title="">Columbus</td>
                                    <td role="false" value="ZMW" data-bs-toggle="false" data-bs-target="false"
                                        title="">47201.1.99999</td>
                                    <td>
                                        <div class="d-flex justify-content-center"><button
                                                class="icon btn shadow-none d-flex justify-content-center align-items-center me-2"
                                                data-bs-toggle="modal" data-bs-placement="top"
                                                title="Click here to edit Latham"
                                                data-bs-target="#editLocationModal"><svg width="13" height="18"
                                                    viewBox="0 0 25 25" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.336 13.8404L10.686 14.0764H10.684L10.92 12.4264L21.058 2.29236C21.1502 2.19685 21.2606 2.12067 21.3826 2.06826C21.5046 2.01585 21.6358 1.98826 21.7686 1.98711C21.9014 1.98596 22.0331 2.01126 22.156 2.06154C22.2789 2.11182 22.3905 2.18607 22.4844 2.27996C22.5783 2.37386 22.6525 2.48551 22.7028 2.60841C22.7531 2.7313 22.7784 2.86298 22.7773 2.99576C22.7761 3.12854 22.7485 3.25976 22.6961 3.38176C22.6437 3.50377 22.5675 3.61411 22.472 3.70636L12.336 13.8404ZM24.5368 1.84987C24.3859 1.48576 24.1648 1.15496 23.886 0.876359V0.87836C23.3234 0.315946 22.5605 0 21.765 0C20.9695 0 20.2066 0.315946 19.644 0.87836L9.272 11.2484C9.11925 11.4016 9.0203 11.6002 8.99 11.8144L8.518 15.1144C8.49591 15.2682 8.50996 15.425 8.55904 15.5724C8.60812 15.7198 8.69087 15.8538 8.80074 15.9636C8.9106 16.0735 9.04455 16.1562 9.19197 16.2053C9.33938 16.2544 9.49621 16.2684 9.65 16.2464L12.95 15.7744C13.1645 15.7435 13.3631 15.6438 13.516 15.4904L23.886 5.12036C24.1648 4.84176 24.3859 4.51096 24.5368 4.14685C24.6877 3.78275 24.7654 3.39249 24.7654 2.99836C24.7654 2.60423 24.6877 2.21397 24.5368 1.84987ZM22.2929 12.0492C22.1054 12.2368 22 12.4911 22 12.7563V22.7563H2V2.75635H12C12.2652 2.75635 12.5196 2.65099 12.7071 2.46345C12.8946 2.27592 13 2.02156 13 1.75635C13 1.49113 12.8946 1.23678 12.7071 1.04924C12.5196 0.861705 12.2652 0.756348 12 0.756348H1C0.734784 0.756348 0.48043 0.861705 0.292893 1.04924C0.105357 1.23678 0 1.49113 0 1.75635V23.7563C0 24.0216 0.105357 24.2759 0.292893 24.4635C0.48043 24.651 0.734784 24.7563 1 24.7563H23C23.2652 24.7563 23.5196 24.651 23.7071 24.4635C23.8946 24.2759 24 24.0216 24 23.7563V12.7563C24 12.4911 23.8946 12.2368 23.7071 12.0492C23.5196 11.8617 23.2652 11.7563 23 11.7563C22.7348 11.7563 22.4804 11.8617 22.2929 12.0492Z"
                                                        fill="#0E38CE"></path>
                                                </svg></button><button type="submit"
                                                class="icon btn shadow-none d-flex justify-content-center align-items-center"
                                                data-bs-toggle="modal" title="Click here to inactivate Latham"
                                                data-bs-target="#deleteLocationModal"><img
                                                    src="/images/location-inactive.svg?025f9e4612fcc32e2e5ebacff0f4e8c2"
                                                    alt="Icon" width="55%"></button></div>
                                    </td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                    <div class="paginate-container d-flex flex-column flex-sm-row justify-content-between align-items-center">
                       {{--  --}}
                    </div>
                </div>
                <div class="tab-pane fade undefined" id="inActive" role="tabpanel" aria-labelledby="home-tab">
                    <div class="table-container table-responsive-xxl">
                        <table class="table align-middle table-borderless mb-0">
                            <thead class="thead">
                                <tr class="">
                                    <th scope="col">Location Code </th>
                                    <th scope="col">Location Name </th>
                                    <th scope="col">Primary Email </th>
                                    <th scope="col">Secondary Email </th>
                                    <th scope="col">State </th>
                                    <th scope="col">City </th>
                                    <th scope="col">ZMW </th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                {{-- <tr class="recordNotFound mt-3 text-nowrap">
                                    <td colspan="8" class="text-center noRecordFound">
                                        <h5 class="text-nowrap">No records found</h5>
                                    </td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="editLocationModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                <div class=" modal-dialog modal-lg d-flex justify-content-center align-items-center">
                    <div class=" modal-content text-decoration-none border-0">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Location</h5><button
                                type="button" class="btn-close text-white" data-bs-dismiss="modal"
                                id="modal-close" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row">
                                    <div class="my-2  col-md-6 position-relative form-group"><label
                                            class="py-2 fs-6">Category</label><input type="text"
                                            placeholder="Enter category name" name="category_name"
                                            class="form-control w-md-100 " readonly="" value="">
                                        <div class="position-absolute"></div>
                                    </div>
                                    <div class="my-2 col-md-6 position-relative form-group"><label
                                            class="py-2 fs-6">Location Code</label><input type="text"
                                            placeholder="Enter Location Code" name="location_code"
                                            class="form-control w-md-100 " data-name="notAllowSpecial" value="">
                                        <div class="position-absolute"></div>
                                    </div>
                                    <div class="my-2 col-md-6 position-relative form-group"><label
                                            class="py-2 fs-6">Location Name</label><input type="text"
                                            placeholder="Enter Location Name" name="location_name"
                                            class="form-control w-md-100 " value="">
                                        <div class="position-absolute"></div>
                                    </div>
                                    <div class="my-2 col-md-6 position-relative form-group"><label
                                            class="py-2 fs-6">Primary E-mail</label><input type="text"
                                            placeholder="Enter Primary E-mail" name="primary_email"
                                            class="form-control w-md-100 " data-name="email" value="">
                                        <div class="position-absolute"></div>
                                    </div>
                                    <div class="my-2 col-md-6 position-relative form-group"><label
                                            class="py-2 fs-6">Secondary E-mail</label><input type="text"
                                            placeholder="Enter Secondary E-mail" name="secondary_email"
                                            class="form-control w-md-100 " data-name="email" value="">
                                        <div class="position-absolute"></div>
                                    </div>
                                    <div class=" my-2 col-md-6 col-lg-3 position-relative"><label
                                            class="undefined py-2 fs-6">State</label><select
                                            class="form-select form-control " name="state" data-value="">
                                            <option value="">Select State</option>
                                        </select>
                                        <div class="position-absolute"></div>
                                    </div>
                                    <div class="my-2 col-md-6 col-lg-3 position-relative"><label
                                            class="undefined py-2 fs-6">City</label><select
                                            class="form-select form-control " name="city" data-value="">
                                            <option value="">Select City</option>
                                        </select>
                                        <div class="position-absolute"></div>
                                    </div>
                                    <div class="my-2 col-md-6 col-lg-4 position-relative form-group"><label
                                            class="py-2 fs-6">ZMW</label><input type="text"
                                            placeholder="Enter ZMW" name="ZMW" class="form-control w-md-100 "
                                            disabled="" readonly="" value="">
                                        <div class="position-absolute"></div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-2">
                                    <div class="px-2"><button type="submit"
                                            class="btn buttons px-4 text-white py-1">Update</button></div>
                                    <div class="px-2"><button type="button" id="updateCancel"
                                            data-bs-dismiss="modal"
                                            class="btn px-4 text-white py-1 bg-secondary">Cancel</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="deleteLocationModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                <div class=" modal-dialog modal-lg d-flex justify-content-center align-items-center">
                    <div class=" modal-content text-decoration-none border-0">
                        <div class="modal-body">
                            <div class="w-100 d-flex flex-column align-items-center"><span class="pb-4"><i
                                        class="fa-solid fa-circle-exclamation fa-6x"></i></span>
                                <h5 class="text-center pb-4"> Are you sure, do you want to inactivate the
                                    location "undefined"?</h5>
                                <div class="d-flex justify-content-center"><button type="button"
                                        class="btn yes-btn text-white px-4 btn-sm fs-5 me-4 py-1">Yes</button><button
                                        type="button" class="btn no-btn text-white px-4 btn-sm fs-5 py-1"
                                        id="delete-location-close" data-bs-dismiss="modal">No</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="editActiveLocationModal" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static"
                data-bs-keyboard="false">
                <div class=" modal-dialog modal-lg d-flex justify-content-center align-items-center">
                    <div class=" modal-content text-decoration-none border-0">
                        <div class="modal-body">
                            <div class="w-100 d-flex flex-column align-items-center"><span class="pb-4"><i
                                        class="fa-solid fa-circle-exclamation fa-6x"></i></span>
                                <h5 class="text-center pb-4"> Are you sure, do you want to activate the location
                                    ""?</h5>
                                <div class="d-flex justify-content-center"><button type="button"
                                        class="btn yes-btn text-white px-4 btn-sm fs-5 me-4 py-1">Yes</button><button
                                        type="button" class="btn no-btn text-white px-4 btn-sm fs-5 py-1"
                                        id="Inactive-modal-close" data-bs-dismiss="modal">No</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="deletePermanentLocationModal" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static"
                data-bs-keyboard="false">
                <div class=" modal-dialog modal-lg d-flex justify-content-center align-items-center">
                    <div class=" modal-content text-decoration-none border-0">
                        <div class="modal-body">
                            <div class="w-100 d-flex flex-column align-items-center"><span class="pb-4"><i
                                        class="fa-solid fa-circle-exclamation fa-6x"></i></span>
                                <h5 class="text-center pb-4"> Are you sure, do you want to delete the location
                                    "undefined"
                                    permanently?</h5>
                                <div class="d-flex justify-content-center"><button type="button"
                                        class="btn px-4 btn-sm yes-btn text-white fs-5 me-4 py-1">Yes</button><button
                                        type="button" class="btn px-4 btn-sm no-btn text-white fs-5 py-1"
                                        id="delete-permanentmodal-close" data-bs-dismiss="modal">No</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endauth
@endsection
