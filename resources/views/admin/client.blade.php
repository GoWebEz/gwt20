@extends('layouts.app')

@section('content')
    @auth
    <div class="body-container">
        <div class="landing w-100">
            <div class="container-lg">
                <div class="d-flex align-items-center title">
                    <h3 class="title-text m-0 me-1">Client List</h3>
                    <div class="indicator"></div>
                </div>
                <div
                    class="tab-section d-flex flex-column flex-lg-row justify-content-between mt-4 mb-3 mb-lg-5">
                    <ul class="nav nav-pills" id="myTab" role="tablist">
                        <li class="nav-item " role="presentation"><a
                                class="active active-client text-dark text-decoration-none" id="home-tab"
                                data-bs-toggle="pill" data-bs-target="#active" type="button" role="tab"
                                aria-controls="home" data-name="activeTab" aria-selected="true"><img
                                    src="/images/active user svg.svg?c49278f60f328d79a5386aa49c427907"
                                    class="mx-1" width="17px">Active Clients</a></li>
                        <li class="nav-item " role="presentation"><a
                                class=" inactive-client text-dark text-decoration-none" id="home-tab"
                                data-bs-toggle="pill" data-bs-target="#inActive" type="button" role="tab"
                                aria-controls="home" data-name="inActiveTab" aria-selected="false"><img
                                    src="/images/inactive user.svg?9c40c0835cfeda17dbdb18e1a0da2394"
                                    class="mx-1" width="20px">Inactive Clients</a></li>
                    </ul>
                    <div
                        class="features-section d-flex justify-content-between flex-wrap align-items-center mt-3 mt-lg-0">
                        <div class="d-flex field-container flex-wrap">
                            <div
                                class="d-flex search bg-white rounded position-relative my-sm-3 my-lg-0 me-sm-3">
                                <input type="text" placeholder="Search" value=""><svg
                                    class="search-svg position-absolute" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 30 30">
                                    <path
                                        d="M 13 3 C 7.4889971 3 3 7.4889971 3 13 C 3 18.511003 7.4889971 23 13 23 C 15.396508 23 17.597385 22.148986 19.322266 20.736328 L 25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969 L 20.736328 19.322266 C 22.148986 17.597385 23 15.396508 23 13 C 23 7.4889971 18.511003 3 13 3 z M 13 5 C 17.430123 5 21 8.5698774 21 13 C 21 17.430123 17.430123 21 13 21 C 8.5698774 21 5 17.430123 5 13 C 5 8.5698774 8.5698774 5 13 5 z">
                                    </path>
                                </svg></div>
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
                        <div class="addClientBtn"><button id="add-modal-close"
                                class="btn add-client-btn text-white px-2" data-bs-toggle="modal"
                                data-bs-target="#addClientModal"><span class="pe-2"><i
                                        class="fa-solid fa-circle-plus text-white"></i></span>Add
                                Client</button>
                            <div class="modal fade" id="addClientModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static"
                                data-bs-keyboard="false">
                                <div
                                    class=" modal-dialog modal-lg d-flex justify-content-center align-items-center">
                                    <div class=" modal-content text-decoration-none border-0">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Client</h5>
                                            <button type="button" class="btn-close text-white"
                                                data-bs-dismiss="modal" id="modal-close"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="row">
                                                    <div class="my-2  col-md-6 position-relative form-group">
                                                        <label class="py-2 fs-6">Client Name</label><input
                                                            type="text" placeholder="Enter Client Name"
                                                            name="client_name" class="form-control w-md-100 "
                                                            data-name="name" value="">
                                                        <div class="position-absolute"></div>
                                                    </div>
                                                    <div class="my-2 col-md-6 col-lg-3 position-relative"><label
                                                            class="undefined py-2 fs-6">Measurement</label><select
                                                            class="form-select form-control " name="measurement"
                                                            data-value="">
                                                            <option value="">Select Measurement</option>
                                                            <option value="US Gallons">US Gallons</option>
                                                            <option value="Liters">Liters</option>
                                                        </select>
                                                        <div class="position-absolute"></div>
                                                    </div>
                                                    <div class="col-lg-3"></div>
                                                    <div
                                                        class="my-0 my-md-2 my-lg-2 col-md-6 col-lg-3  position-relative form-group">
                                                        <label class="py-2 fs-6">Start Up Hour</label><span
                                                            class="rc-time-picker form-control w-md-100 "><input
                                                                class="rc-time-picker-input" type="text"
                                                                placeholder="Enter Start Up Hour"
                                                                name="start_up_hour" value=""><span
                                                                class="rc-time-picker-icon"></span></span>
                                                        <div class="position-absolute"></div>
                                                    </div>
                                                    <div
                                                        class="my-2 col-md-6 col-lg-3  position-relative form-group">
                                                        <label class="py-2 fs-6">Opening Hour</label><span
                                                            class="rc-time-picker form-control w-md-100 "><input
                                                                class="rc-time-picker-input" type="text"
                                                                placeholder="Enter Opening Hour"
                                                                name="opening_hour" value=""><span
                                                                class="rc-time-picker-icon"></span></span>
                                                        <div class="position-absolute"></div>
                                                    </div>
                                                    <div
                                                        class="my-2 col-md-6 col-lg-3  position-relative form-group">
                                                        <label class="py-2 fs-6">Closing Hour</label><span
                                                            class="rc-time-picker form-control w-md-100 "><input
                                                                class="rc-time-picker-input" type="text"
                                                                placeholder="Enter Closing Hour"
                                                                name="closing_hour" value=""><span
                                                                class="rc-time-picker-icon"></span></span>
                                                        <div class="position-absolute"></div>
                                                    </div>
                                                    <div
                                                        class="my-0 my-md-2 my-lg-2 col-md-6 col-lg-3  position-relative form-group">
                                                        <label class="py-2 fs-6">Shut Down Hour</label><span
                                                            class="rc-time-picker form-control w-md-100 "><input
                                                                class="rc-time-picker-input" type="text"
                                                                placeholder="Enter Shut Down Hour"
                                                                name="shut_down_hour" value=""><span
                                                                class="rc-time-picker-icon"></span></span>
                                                        <div class="position-absolute"></div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-end mt-4 mt-md-4 mt-lg-3">
                                                    <div class="px-2"><button type="submit"
                                                            class="btn buttons px-4 text-white py-1">Save</button>
                                                    </div>
                                                    <div class="px-2"><button type="button"
                                                            class="btn bg-secondary px-4 text-white py-1">Clear</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="active" role="tabpanel"
                        aria-labelledby="home-tab">
                        <div class="table-container table-responsive-xxl">
                            <table class="table align-middle table-borderless mb-0">
                                <thead class="thead">
                                    <tr class="">
                                        <th scope="col">Name </th>
                                        <th scope="col">Start Up || Opening || Closing || Shut Down Hours </th>
                                        <th scope="col">Measurement </th>
                                        <th scope="col">Cost Per US Gallons/Liters </th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                {{--  --}}
                                </tbody>
                            </table>
                        </div>
                        <div class="paginate-container d-flex flex-column flex-sm-row justify-content-between align-items-center">
                            {{--  --}}
                        </div>
                    </div>
                    <div class="tab-pane fade undefined" id="inActive" role="tabpanel"
                        aria-labelledby="home-tab">
                        <div class="table-container table-responsive-xxl">
                            <table class="table align-middle table-borderless mb-0">
                                <thead class="thead">
                                    <tr class="">
                                        <th scope="col">Name </th>
                                        <th scope="col">Start Up || Opening || Closing || Shut Down Hours </th>
                                        <th scope="col">Measurement </th>
                                        <th scope="col">Cost Per US Gallons/Liters </th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    {{--  --}}
                                </tbody>
                            </table>
                        </div>
                        <div class="paginate-container d-flex flex-column flex-sm-row justify-content-between align-items-center">
                            {{--  --}}
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="editClientModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                    <div class=" modal-dialog modal-lg d-flex justify-content-center align-items-center">
                        <div class=" modal-content text-decoration-none border-0">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Client</h5><button
                                    type="button" class="btn-close text-white" data-bs-dismiss="modal"
                                    id="modal-close" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="row">
                                        <div class="my-2  col-md-6 position-relative form-group"><label
                                                class="py-2 fs-6">Client Name</label><input type="text"
                                                placeholder="Enter Client Name" name="client_name"
                                                class="form-control w-md-100 " data-name="name" value="">
                                            <div class="position-absolute"></div>
                                        </div>
                                        <div class="my-2 col-md-6 col-lg-3 position-relative"><label
                                                class="undefined py-2 fs-6">Measurement</label><select
                                                class="form-select form-control " name="measurement"
                                                data-value="">
                                                <option value="">Select Measurement</option>
                                                <option value="US Gallons">US Gallons</option>
                                                <option value="Liters">Liters</option>
                                            </select>
                                            <div class="position-absolute"></div>
                                        </div>
                                        <div class="col-lg-3"></div>
                                        <div
                                            class="my-0 my-md-2 my-lg-2 col-md-6 col-lg-3  position-relative form-group">
                                            <label class="py-2 fs-6">Start Up Hour</label><span
                                                class="rc-time-picker form-control w-md-100 "><input
                                                    class="rc-time-picker-input" type="text"
                                                    placeholder="Enter Start Up Hour" name="start_up_hour"
                                                    value=""><span class="rc-time-picker-icon"></span></span>
                                            <div class="position-absolute"></div>
                                        </div>
                                        <div class="my-2 col-md-6 col-lg-3  position-relative form-group"><label
                                                class="py-2 fs-6">Opening Hour</label><span
                                                class="rc-time-picker form-control w-md-100 "><input
                                                    class="rc-time-picker-input" type="text"
                                                    placeholder="Enter Opening Hour" name="opening_hour"
                                                    value=""><span class="rc-time-picker-icon"></span></span>
                                            <div class="position-absolute"></div>
                                        </div>
                                        <div class="my-2 col-md-6 col-lg-3  position-relative form-group"><label
                                                class="py-2 fs-6">Closing Hour</label><span
                                                class="rc-time-picker form-control w-md-100 "><input
                                                    class="rc-time-picker-input" type="text"
                                                    placeholder="Enter Closing Hour" name="closing_hour"
                                                    value=""><span class="rc-time-picker-icon"></span></span>
                                            <div class="position-absolute"></div>
                                        </div>
                                        <div
                                            class="my-0 my-md-2 my-lg-2 col-md-6 col-lg-3  position-relative form-group">
                                            <label class="py-2 fs-6">Shut Down Hour</label><span
                                                class="rc-time-picker form-control w-md-100 "><input
                                                    class="rc-time-picker-input" type="text"
                                                    placeholder="Enter Shut Down Hour" name="shut_down_hour"
                                                    value=""><span class="rc-time-picker-icon"></span></span>
                                            <div class="position-absolute"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mt-2 mt-md-4 mt-lg-3">
                                        <div class="px-2"><button type="submit"
                                                class="btn buttons px-4 text-white py-1">Update</button></div>
                                        <div class="px-2"><button type="button" id="updateClear"
                                                data-bs-dismiss="modal"
                                                class="btn py-1 bg-secondary px-4 text-white">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="deleteClientModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                    <div class=" modal-dialog modal-lg d-flex justify-content-center align-items-center">
                        <div class=" modal-content text-decoration-none border-0">
                            <div class="modal-body">
                                <div class="w-100 d-flex flex-column align-items-center"><span class="pb-4"><i
                                            class="fa-solid fa-circle-exclamation fa-6x"></i></span>
                                    <h5 class="text-center pb-4">Are you sure, do you want to inactivate the
                                        "undefined"?</h5>
                                    <div class="d-flex justify-content-center"><button type="button"
                                            class="btn px-4 btn-sm text-white yes-btn fs-5 me-4 py-1">Yes</button><button
                                            type="button" class="btn px-4 btn-sm text-white no-btn fs-5 py-1"
                                            id="delete-modal-close" data-bs-dismiss="modal">No</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="permanentDeleteClientModal" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static"
                    data-bs-keyboard="false">
                    <div class=" modal-dialog modal-lg d-flex justify-content-center align-items-center">
                        <div class=" modal-content text-decoration-none border-0">
                            <div class="modal-body">
                                <div class="w-100 d-flex flex-column align-items-center"><span class="pb-4"><i
                                            class="fa-solid fa-circle-exclamation fa-6x"></i></span>
                                    <h5 class="text-center pb-4"> Are you sure, do you want to delete the client
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
                <div class="modal fade" id="UpdateInactiveClientModal" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static"
                    data-bs-keyboard="false">
                    <div class=" modal-dialog modal-lg d-flex justify-content-center align-items-center">
                        <div class=" modal-content text-decoration-none border-0">
                            <div class="modal-body">
                                <div class="w-100 d-flex flex-column align-items-center"><span class="pb-4"><i
                                            class="fa-solid fa-circle-exclamation fa-6x"></i></span>
                                    <h5 class="text-center pb-4"> Are you sure, do you want to activate the
                                        client ""?</h5>
                                    <div class="d-flex justify-content-center"><button type="button"
                                            class="btn yes-btn text-white px-4 btn-sm fs-5 me-4 py-1">Yes</button><button
                                            type="button" class="btn no-btn text-white px-4 btn-sm fs-5 py-1"
                                            id="Inactive-modal-close" data-bs-dismiss="modal">No</button></div>
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
