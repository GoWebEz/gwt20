@extends('layouts.app')

@section('content')
    @auth
    <div class="body-container">
        <div class="global-landing w-100">
            <div class="container-lg">
                <div class="d-flex align-items-center title">
                    <h3 class="title-text m-0 me-1">Global Setting List</h3>
                    <div class="indicator"></div>
                </div>
                <div
                    class="tab-section d-flex flex-column flex-xl-row justify-content-between mt-4 mb-3 mb-lg-5">
                    <ul class="nav nav-pills" id="myTab" role="tablist">
                        <li class="nav-item " role="presentation"><a
                                class="active active-user text-dark text-decoration-none" id="home-tab"
                                data-bs-toggle="pill" data-bs-target="#active" type="button" role="tab"
                                aria-controls="home" data-name="activeTab" aria-selected="true"><img
                                    src="/images/Settiing-world.svg?d6d678908daaaf9dfb0b53fbba44cb51"
                                    class="mx-1" width="20px">Active global settings</a></li>
                        <li class="nav-item " role="presentation"><a
                                class=" inactive-user text-dark text-decoration-none" id="home-tab"
                                data-bs-toggle="pill" data-bs-target="#inActive" type="button" role="tab"
                                aria-controls="home" data-name="inActiveTab"><img
                                    src="/images/Settiing-world inactive.svg?d42b456b08f0cc44de507bacbcb31a8e"
                                    class="mx-1" width="20px">Inactive global settings</a></li>
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
                        <div class="addDeviceBtn"><button id="add-modal-close"
                                class="btn globalbuttons text-white px-2" data-bs-toggle="modal"
                                data-bs-target="#addglobalModal"><span class="pe-2"><i
                                        class="fa-solid fa-circle-plus text-white"></i></span>Add Global
                                Setting</button>
                            <div class="modal fade" id="addglobalModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" data-bs-backdrop="static"
                                data-bs-keyboard="false" style="display: none;" aria-hidden="true">
                                <div
                                    class=" modal-dialog modal-lg d-flex justify-content-center align-items-center">
                                    <div class=" modal-content text-decoration-none border-0">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Global Setting
                                            </h5><button type="button" class="btn-close text-white"
                                                data-bs-dismiss="modal" id="modal-close"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="row">
                                                    <div class="my-2 col-md-6 position-relative"><label
                                                            class="undefined py-2 fs-6">Key</label><select
                                                            class="form-select form-control "
                                                            name="global_setting_key" data-value="">
                                                            <option value="">Select Key</option>
                                                            <option value="Min-cool">Min-cool</option>
                                                            <option value="Max-cool">Max-cool</option>
                                                            <option value="Min-heat">Min-heat</option>
                                                            <option value="Max-heat">Max-heat</option>
                                                        </select>
                                                        <div class="position-absolute"></div>
                                                    </div>
                                                    <div class="my-2 col-md-6 position-relative form-group">
                                                        <label class="py-2 fs-6">Description</label><input
                                                            type="text" placeholder="Enter Description"
                                                            name="global_description"
                                                            class="form-control w-md-100 " data-name="name"
                                                            value="">
                                                        <div class="position-absolute"></div>
                                                    </div>
                                                    <div class="my-2 col-md-6 position-relative form-group">
                                                        <label class="py-2 fs-6">Value</label><input type="text"
                                                            placeholder="Enter Value" name="global_value"
                                                            class="form-control w-md-100 " data-name="number"
                                                            value="">
                                                        <div class="position-absolute"></div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-end mt-2">
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
                                        <th scope="col">Key </th>
                                        <th scope="col">Description </th>
                                        <th scope="col">Value </th>
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
                                        <th scope="col">Key </th>
                                        <th scope="col">Description </th>
                                        <th scope="col">Value </th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    {{--  --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="editGlobalModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                    <div class=" modal-dialog modal-lg d-flex justify-content-center align-items-center">
                        <div class=" modal-content text-decoration-none border-0">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Global Setting</h5><button
                                    type="button" class="btn-close text-white" data-bs-dismiss="modal"
                                    id="modal-close" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="row">
                                        <div class="my-2 col-md-6 position-relative form-group"><label
                                                class="py-2 fs-6">Key</label><input type="text"
                                                name="global_setting_key" class="form-control w-md-100 "
                                                readonly="" value="">
                                            <div class="position-absolute"></div>
                                        </div>
                                        <div class="my-2 col-md-6 position-relative form-group"><label
                                                class="py-2 fs-6">Description</label><input type="text"
                                                placeholder="Enter Description" name="global_description"
                                                class="form-control w-md-100 " data-name="name" value="">
                                            <div class="position-absolute"></div>
                                        </div>
                                        <div class="my-2 col-md-6 position-relative form-group"><label
                                                class="py-2 fs-6">Value</label><input type="text"
                                                placeholder="Enter Value" name="global_value"
                                                class="form-control w-md-100 " data-name="number" value="">
                                            <div class="position-absolute"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mt-2">
                                        <div class="px-2"><button type="submit"
                                                class="btn buttons px-4 text-white py-1">Update</button></div>
                                        <div class="px-2"><button type="button"
                                                class="btn px-4 text-white py-1 bg-secondary"
                                                data-bs-dismiss="modal" id="updateClear">Cancel</button></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="deleteDeviceModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                    <div class=" modal-dialog modal-lg d-flex justify-content-center align-items-center">
                        <div class=" modal-content text-decoration-none border-0">
                            <div class="modal-body">
                                <div class="w-100 d-flex flex-column align-items-center"><span class="pb-4"><i
                                            class="fa-solid fa-circle-exclamation fa-6x"></i></span>
                                    <h5 class="text-center pb-4"> Are you sure, do you want to inactivate the
                                        global setting "undefined"?</h5>
                                    <div class="d-flex justify-content-center"><button type="button"
                                            class="btn yes-btn text-white px-4 btn-sm fs-5 me-4 py-1">Yes</button><button
                                            type="button" class="btn no-btn text-white px-4 btn-sm fs-5 py-1"
                                            id="delete-modal-close" data-bs-dismiss="modal">No</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="deleteInactiveDeviceModal" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static"
                    data-bs-keyboard="false">
                    <div class=" modal-dialog modal-lg d-flex justify-content-center align-items-center">
                        <div class=" modal-content text-decoration-none border-0">
                            <div class="modal-body">
                                <div class="w-100 d-flex flex-column align-items-center"><span class="pb-4"><i
                                            class="fa-solid fa-circle-exclamation fa-6x"></i></span>
                                    <h5 class="text-center pb-4"> Are you sure, do you want to delete the global
                                        setting "undefined" permanently?</h5>
                                    <div class="d-flex justify-content-center"><button type="button"
                                            class="btn yes-btn text-white px-4 btn-sm fs-5 me-4 py-1">Yes</button><button
                                            type="button" class="btn no-btn text-white px-4 btn-sm fs-5 py-1"
                                            id="Inactivedelete-modal-close" data-bs-dismiss="modal">No</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="UpdateInactiveDeviceModal" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static"
                    data-bs-keyboard="false">
                    <div class=" modal-dialog modal-lg d-flex justify-content-center align-items-center">
                        <div class=" modal-content text-decoration-none border-0">
                            <div class="modal-body">
                                <div class="w-100 d-flex flex-column align-items-center"><span class="pb-4"><i
                                            class="fa-solid fa-circle-exclamation fa-6x"></i></span>
                                    <h5 class="text-center pb-4"> Are you sure, do you want to activate the
                                        global setting ""?</h5>
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
