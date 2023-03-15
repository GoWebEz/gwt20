@extends('layouts.app')

@section('content')
    @auth
    <div class="body-container">
        <div class="user-location device-landing w-100">
            <div class="container-lg">
                <div class="d-flex align-items-center title">
                    <h3 class="title-text m-0 me-1">User Location List</h3>
                    <div class="indicator"></div>
                </div>
                <div
                    class="tab-section d-flex flex-column flex-xl-row justify-content-between mt-4 mb-3 mb-lg-5">
                    <ul class="nav nav-pills" id="myTab" role="tablist">
                        <li class="nav-item " role="presentation"><a
                                class="active active-user text-dark text-decoration-none" id="home-tab"
                                data-bs-toggle="pill" data-bs-target="#active" type="button" role="tab"
                                aria-controls="home" data-name="activeTab" aria-selected="true"><svg width="32"
                                    height="22" viewBox="0 0 32 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M15.5791 0.0137941C14.5481 0.168177 13.6012 0.833968 13.1524 1.71994C12.6004 2.80952 12.6847 3.86229 13.4056 4.88175C13.655 5.2346 14.2145 5.70024 14.6271 5.89825C15.5601 6.34625 16.3696 6.34539 17.3296 5.89546C18.2072 5.48418 18.8738 4.7057 19.1065 3.82023C19.5214 2.24147 18.5233 0.594053 16.861 0.113818C16.565 0.0283372 15.853 -0.0272425 15.5791 0.0137941ZM13.123 7.0184C12.3964 7.22958 12.1184 7.34049 11.3724 7.71653C10.6946 8.05825 9.95571 8.55333 9.47537 8.98755L9.15154 9.28029L10.8496 10.9365C11.7835 11.8473 12.5596 12.5926 12.5743 12.5926C12.589 12.5926 12.7732 12.4665 12.9836 12.3125C13.9662 11.5931 15.3178 11.2308 16.4997 11.3698C17.5827 11.4972 18.2506 11.7718 19.3062 12.5235C19.4274 12.6099 19.4296 12.6079 21.1506 10.9359L22.8736 9.26184L22.6752 9.0897C22.0092 8.51184 20.965 7.85281 20.1251 7.48038C19.6785 7.28226 18.5895 6.9169 18.3634 6.88924C18.2397 6.87408 18.0845 7.00452 17.1586 7.90158C16.5279 8.5126 16.0556 8.9313 15.9971 8.9313C15.9384 8.9313 15.4614 8.50792 14.8226 7.88886C14.2309 7.31552 13.7359 6.84754 13.7223 6.84886C13.7089 6.85018 13.4392 6.92646 13.123 7.0184ZM7.71951 10.9468C6.53935 12.694 5.93652 14.8007 6.00529 16.9376C6.04689 18.2308 6.30593 19.249 6.89987 20.4539C7.41627 21.5014 7.89253 22.1516 11.7386 27.0596C12.7248 28.3182 13.9524 29.8924 14.4666 30.5579C15.005 31.2549 15.4722 31.81 15.5686 31.8672C15.8325 32.0238 16.0345 32.04 16.2999 31.9258C16.4982 31.8404 16.6232 31.7105 17.0993 31.0948C17.4097 30.6933 18.6752 29.0721 19.9116 27.4919C22.7402 23.8766 24.1966 21.9693 24.5406 21.4299C25.15 20.4742 25.6246 19.3059 25.849 18.2088C25.9917 17.5111 26.0455 16.0924 25.9569 15.3596C25.8092 14.1377 25.4653 12.9865 24.9532 12.0008C24.6529 11.4226 24.0989 10.5585 24.0285 10.5585C24.0089 10.5585 23.2008 11.3291 22.2326 12.2708L20.4724 13.9832L20.5932 14.2159C21.1258 15.2415 21.2039 16.7112 20.788 17.8813C20.0239 20.0309 17.7778 21.4342 15.4971 21.1869C14.6975 21.1002 14.1221 20.9161 13.444 20.5302C11.7262 19.5524 10.7554 17.7046 10.9568 15.7958C11.0134 15.2587 11.0958 14.944 11.3339 14.3557L11.4949 13.9578L9.74229 12.2523L7.98967 10.5468L7.71951 10.9468Z"
                                        fill="#1B932A"></path>
                                </svg>Active User Locations</a></li>
                        <li class="nav-item " role="presentation"><a
                                class=" inactive-user text-dark text-decoration-none" id="home-tab"
                                data-bs-toggle="pill" data-bs-target="#inActive" type="button" role="tab"
                                aria-controls="home" data-name="inActiveTab" aria-selected="false"><svg
                                    width="32" height="22" viewBox="0 0 32 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M15.5791 0.0137941C14.5481 0.168177 13.6012 0.833968 13.1524 1.71994C12.6004 2.80952 12.6847 3.86229 13.4056 4.88175C13.655 5.2346 14.2145 5.70024 14.6271 5.89825C15.5601 6.34625 16.3696 6.34539 17.3296 5.89546C18.2072 5.48418 18.8738 4.7057 19.1065 3.82023C19.5214 2.24147 18.5233 0.594053 16.861 0.113818C16.565 0.0283372 15.853 -0.0272425 15.5791 0.0137941ZM13.123 7.0184C12.3964 7.22958 12.1184 7.34049 11.3724 7.71653C10.6946 8.05825 9.95571 8.55333 9.47537 8.98755L9.15154 9.28029L10.8496 10.9365C11.7835 11.8473 12.5596 12.5926 12.5743 12.5926C12.589 12.5926 12.7732 12.4665 12.9836 12.3125C13.9662 11.5931 15.3178 11.2308 16.4997 11.3698C17.5827 11.4972 18.2506 11.7718 19.3062 12.5235C19.4274 12.6099 19.4296 12.6079 21.1506 10.9359L22.8736 9.26184L22.6752 9.0897C22.0092 8.51184 20.965 7.85281 20.1251 7.48038C19.6785 7.28226 18.5895 6.9169 18.3634 6.88924C18.2397 6.87408 18.0845 7.00452 17.1586 7.90158C16.5279 8.5126 16.0556 8.9313 15.9971 8.9313C15.9384 8.9313 15.4614 8.50792 14.8226 7.88886C14.2309 7.31552 13.7359 6.84754 13.7223 6.84886C13.7089 6.85018 13.4392 6.92646 13.123 7.0184ZM7.71951 10.9468C6.53935 12.694 5.93652 14.8007 6.00529 16.9376C6.04689 18.2308 6.30593 19.249 6.89987 20.4539C7.41627 21.5014 7.89253 22.1516 11.7386 27.0596C12.7248 28.3182 13.9524 29.8924 14.4666 30.5579C15.005 31.2549 15.4722 31.81 15.5686 31.8672C15.8325 32.0238 16.0345 32.04 16.2999 31.9258C16.4982 31.8404 16.6232 31.7105 17.0993 31.0948C17.4097 30.6933 18.6752 29.0721 19.9116 27.4919C22.7402 23.8766 24.1966 21.9693 24.5406 21.4299C25.15 20.4742 25.6246 19.3059 25.849 18.2088C25.9917 17.5111 26.0455 16.0924 25.9569 15.3596C25.8092 14.1377 25.4653 12.9865 24.9532 12.0008C24.6529 11.4226 24.0989 10.5585 24.0285 10.5585C24.0089 10.5585 23.2008 11.3291 22.2326 12.2708L20.4724 13.9832L20.5932 14.2159C21.1258 15.2415 21.2039 16.7112 20.788 17.8813C20.0239 20.0309 17.7778 21.4342 15.4971 21.1869C14.6975 21.1002 14.1221 20.9161 13.444 20.5302C11.7262 19.5524 10.7554 17.7046 10.9568 15.7958C11.0134 15.2587 11.0958 14.944 11.3339 14.3557L11.4949 13.9578L9.74229 12.2523L7.98967 10.5468L7.71951 10.9468Z"
                                        fill="#FF0000"></path>
                                    <rect x="4" y="1.81018" width="0.712941" height="36.2005"
                                        transform="rotate(-37.2448 4 1.81018)" fill="white"></rect>
                                    <rect x="4.42932" y="1.46094" width="0.76167" height="36.2236"
                                        transform="rotate(-37.2448 4.42932 1.46094)" fill="#FF0000"></rect>
                                </svg>Inactive User Locations</a></li>
                    </ul>
                    <div
                        class="features-section d-flex justify-content-between flex-wrap align-items-center mt-3 mt-xl-0">
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
                        <div class="addUserLocationBtn"><button id="add-modal-close"
                                class="btn addUserLocation-btn buttons text-white px-2" data-bs-toggle="modal"
                                data-bs-target="#addUserLocationModal"><span class="pe-2"><i
                                        class="fa-solid fa-circle-plus text-white"></i></span>Add User
                                Location</button>
                            <div class="modal fade" id="addUserLocationModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static"
                                data-bs-keyboard="false">
                                <div
                                    class="alertStyle modal-dialog modal-lg d-flex justify-content-center align-items-center">
                                    <div class=" modal-content text-decoration-none border-0">
                                        <div class="modal-body">
                                            <div class="w-100 d-flex flex-column align-items-center"><span
                                                    class="pb-4"><i
                                                        class="fa-solid fa-circle-exclamation fa-6x"></i></span>
                                                <h5 class="text-center pb-4">You have added location to all the
                                                    users. So, please add new users to add locations to them.
                                                </h5>
                                                <div class="d-flex justify-content-center"><button type="button"
                                                        class="btn yes-btn text-white px-4 btn-sm fs-5"
                                                        data-bs-dismiss="modal">Back</button></div>
                                            </div>
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
                                        <th scope="col">Username </th>
                                        <th scope="col">Location Code </th>
                                        <th scope="col">Location Name </th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    {{--  --}}
                                </tbody>
                            </table>
                        </div>
                        <div class="paginate-container d-flex flex-column flex-sm-row justify-content-between align-items-center">
                            <div class=" entries-text  d-flex justify-content-start align-items-center pb-2 pb-sm-0  undefined">
                                {{--  --}}
                            </div>
                            <div class="pagination-container d-flex justify-content-center justify-content-sm-end align-items-center">
                                {{--  --}}
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade undefined" id="inActive" role="tabpanel"
                        aria-labelledby="home-tab">
                        <div class="table-container table-responsive-xxl">
                            <table class="table align-middle table-borderless mb-0">
                                <thead class="thead">
                                    <tr class="">
                                        <th scope="col">Username </th>
                                        <th scope="col">Location Code </th>
                                        <th scope="col">Location Name </th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="tableDataModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                    <div class=" modal-dialog modal-lg d-flex justify-content-center align-items-center">
                        <div class=" modal-content text-decoration-none border-0">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">View undefined's Location</h5>
                                <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                                    id="modal-close" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <div class="table-container table-responsive-xxl">
                                        <table class="table align-middle table-borderless mb-0">
                                            <thead class="thead">
                                                <tr class="text-white">
                                                    <th>Location Code</th>
                                                    <th>Location Name</th>
                                                </tr>
                                            </thead>
                                            <tbody class="tbody"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="editUserLocationModal" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static"
                    data-bs-keyboard="false">
                    <div class=" modal-dialog modal-lg d-flex justify-content-center align-items-center">
                        <div class=" modal-content text-decoration-none border-0">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit 's Location</h5><button
                                    type="button" class="btn-close text-white" data-bs-dismiss="modal"
                                    id="modal-close" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-12 my-2">
                                            <div class="d-flex multi-select-container">
                                                <div class="select-container position-relative"><label
                                                        class="py-2 label position-absolute">Available
                                                        Locations</label><select multiple="" id="left_select"
                                                        name="left_select" class="left-select form-select"
                                                        size="5">
                                                        <option value="1">AA101 (Bayweb)</option>
                                                        <option value="22">AA1012 (Water Watch)</option>
                                                        <option value="5">AA102 (Bayweb)</option>
                                                        <option value="13">PX0879 (Water Watch)</option>
                                                        <option value="14">PX1008 (Water Watch)</option>
                                                        <option value="16">PX1135 (Water Watch)</option>
                                                        <option value="10">PX1680 (Water Watch)</option>
                                                        <option value="11">PX1919 (Water Watch)</option>
                                                        <option value="12">PX2058 (Water Watch)</option>
                                                        <option value="19">PX2090 (Water Watch)</option>
                                                        <option value="9">PX2470 (Water Watch)</option>
                                                        <option value="18">PX2726 (Water Watch)</option>
                                                        <option value="17">PX3270 (Water Watch)</option>
                                                        <option value="25">PX3307 (Water Watch)</option>
                                                        <option value="15">PX819 (Water Watch)</option>
                                                        <option value="20">RR318 (Bayweb)</option>
                                                        <option value="21">RR319 (Bayweb)</option>
                                                        <option value="2">RR707 (Water Watch)</option>
                                                        <option value="7">RR708 (Bayweb)</option>
                                                        <option value="6">RR710 (Water Watch)</option>
                                                        <option value="4">SP107 (Water Watch)</option>
                                                        <option value="3">SP108 (Bayweb)</option>
                                                    </select>
                                                    <div class="position-absolute d-sm-none d-block"></div>
                                                </div>
                                                <div
                                                    class="multi-select-controls d-flex flex-column align-items-center mx-2">
                                                    <button type="button"
                                                        class="btn buttons mb-2 text-white">&gt;&gt;</button><button
                                                        type="button"
                                                        class="btn buttons mb-2 px-2 text-white">&gt;</button><button
                                                        type="button"
                                                        class="btn buttons mb-2 px-2 text-white">&lt;</button><button
                                                        type="button"
                                                        class="btn buttons text-white">&lt;&lt;</button></div>
                                                <div class="select-container position-relative"><label
                                                        class="py-2 label position-absolute">Assigned
                                                        Locations</label><select multiple=""
                                                        name="location_code" id="location_code" size="5"
                                                        class="form-control right-select "></select>
                                                    <div class="position-absolute d-none d-sm-block"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mt-4">
                                        <div class="px-2"><button type="submit"
                                                class="btn buttons px-4 text-white py-1">Update</button></div>
                                        <div class="px-2"><button type="button"
                                                class="btn px-4 text-white  py-1 bg-secondary"
                                                id="edit-modal-close" data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="deleteUserLocationModal" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static"
                    data-bs-keyboard="false">
                    <div class=" modal-dialog modal-lg d-flex justify-content-center align-items-center">
                        <div class=" modal-content text-decoration-none border-0">
                            <div class="modal-body">
                                <div class="w-100 d-flex flex-column align-items-center"><span class="pb-4"><i
                                            class="fa-solid fa-circle-exclamation fa-6x"></i></span>
                                    <h5 class="text-center pb-4">Are you sure, do you want to inactivate the
                                        user location "undefined"?</h5>
                                    <div class="d-flex justify-content-center"><button type="button"
                                            class="btn yes-btn text-white px-4 btn-sm fs-5 me-4 py-1">Yes</button><button
                                            type="button" class="btn no-btn text-white px-4 btn-sm fs-5 py-1"
                                            id="delete-modal-close" data-bs-dismiss="modal">No</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="deleteInActiveUserLocationModal" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static"
                    data-bs-keyboard="false">
                    <div class=" modal-dialog modal-lg d-flex justify-content-center align-items-center">
                        <div class=" modal-content text-decoration-none border-0">
                            <div class="modal-body">
                                <div class="w-100 d-flex flex-column align-items-center"><span class="pb-4"><i
                                            class="fa-solid fa-circle-exclamation fa-6x"></i></span>
                                    <h5 class="text-center pb-4">Are you sure, do you want to delete the user
                                        location "undefined"
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
                <div class="modal fade" id="activateUserLocationModal" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static"
                    data-bs-keyboard="false">
                    <div class=" modal-dialog modal-lg d-flex justify-content-center align-items-center">
                        <div class=" modal-content text-decoration-none border-0">
                            <div class="modal-body">
                                <div class="w-100 d-flex flex-column align-items-center"><span class="pb-4"><i
                                            class="fa-solid fa-circle-exclamation fa-6x"></i></span>
                                    <h5 class="text-center pb-4"> Are you sure, do you want to activate the user
                                        location ""?</h5>
                                    <div class="d-flex justify-content-center"><button type="button"
                                            class="btn yes-btn text-white px-4 btn-sm fs-5 me-4 py-1">Yes</button><button
                                            type="button" class="btn no-btn text-white px-4 btn-sm fs-5 py-1"
                                            id="activate-modal-close" data-bs-dismiss="modal">No</button></div>
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
