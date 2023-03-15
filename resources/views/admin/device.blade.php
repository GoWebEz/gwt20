@extends('layouts.app')

@section('content')
    @auth
    <div class="body-container">
        <div class="device-landing w-100">
            <div class="container-lg">
                <div class="d-flex align-items-center title">
                    <h3 class="title-text m-0 me-1">Device List</h3>
                    <div class="indicator"></div>
                </div>
                <div
                    class="tab-section d-flex flex-column flex-lg-row justify-content-between mt-4 mb-3 mb-lg-5">
                    <ul class="nav nav-pills" id="myTab" role="tablist">
                        <li class="nav-item " role="presentation"><a
                                class="active active-user text-dark text-decoration-none" id="home-tab"
                                data-bs-toggle="pill" data-bs-target="#active" type="button" role="tab"
                                aria-controls="home" data-name="activeTab" aria-selected="true"><img
                                    src="/images/device.svg?972b82220ddeda45c0c34b38fc9e5589"
                                    width="22px">Active Devices</a></li>
                        <li class="nav-item " role="presentation"><a
                                class=" inactive-user text-dark text-decoration-none" id="home-tab"
                                data-bs-toggle="pill" data-bs-target="#inActive" type="button" role="tab"
                                aria-controls="home" data-name="inActiveTab" aria-selected="false"><img
                                    src="/images/device -inactive.svg?26151424de50979db109a79b511167a7"
                                    width="22px">Inactive Devices</a></li>
                    </ul>
                    <div
                        class="features-section d-flex justify-content-between flex-wrap align-items-center mt-3 mt-lg-0">
                        <div class="d-flex field-container flex-wrap">
                            <div
                                class="d-flex justify-content-end search bg-white rounded position-relative my-sm-3 my-lg-0 me-sm-3 border-0">
                                <select class="category-select px-1">
                                    <option>Select Category</option>
                                    <option value="Bayweb">Bayweb</option>
                                    <option value="Water Watch">Water Watch</option>
                                </select></div>
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
                        <div class="addDeviceBtn mt-2 mt-lg-0"><button id="add-modal-close"
                                class="btn addDevice-btn buttons text-white px-2" data-bs-toggle="modal"
                                data-bs-target="#addDeviceModal"><span class="pe-2"><i
                                        class="fa-solid fa-circle-plus text-white"></i></span>Add
                                Device</button>
                            <div class="modal fade" id="addDeviceModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static"
                                data-bs-keyboard="false">
                                <div
                                    class=" modal-dialog modal-lg d-flex justify-content-center align-items-center">
                                    <div class=" modal-content text-decoration-none border-0">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Device</h5>
                                            <button type="button" class="btn-close text-white"
                                                data-bs-dismiss="modal" id="modal-close"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="row">
                                                    <div class="my-2  col-md-6 position-relative form-group">
                                                        <label class="py-2 fs-6">Category</label><input
                                                            type="text" placeholder="Bayweb"
                                                            name="category_name" class="form-control w-md-100 "
                                                            readonly="" value="">
                                                        <div class="position-absolute"></div>
                                                    </div>
                                                    <div class="my-2  col-md-6 position-relative form-group">
                                                        <label class="py-2 fs-6">Device Id</label><input
                                                            type="text" placeholder="Enter device Id"
                                                            name="device_id" class="form-control w-md-100 "
                                                            data-name="notAllowSpecial" value="">
                                                        <div class="position-absolute"></div>
                                                    </div>
                                                    <div class="my-2  col-md-6 position-relative form-group">
                                                        <label class="py-2 fs-6">Key Code</label><input
                                                            type="text" placeholder="Enter key code"
                                                            name="key_code" class="form-control w-md-100 "
                                                            data-name="notAllowSpecial" value="">
                                                        <div class="position-absolute"></div>
                                                    </div>
                                                    <div class="my-2  col-md-6 position-relative form-group">
                                                        <label class="py-2 fs-6">Device Name</label><input
                                                            type="text" placeholder="Enter device name"
                                                            name="device_name" class="form-control w-md-100 "
                                                            data-name="notAllowSpecial" value="">
                                                        <div class="position-absolute"></div>
                                                    </div>
                                                    <div class="my-2  col-md-6 position-relative"><label
                                                            class="undefined py-2 fs-6">Location
                                                            Code</label><select
                                                            class="form-select form-control "
                                                            name="location_code" data-value="">
                                                            <option value="">Select Location Code</option>
                                                        </select>
                                                        <div class="position-absolute"></div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-end mt-2">
                                                    <div class="px-2"><button type="submit"
                                                            class="btn buttons px-4 text-white py-1">Save</button>
                                                    </div>
                                                    <div class="px-2"><button type="button"
                                                            class="btn bg-secondary px-4 text-white py-1"
                                                            data-bs-dismiss="modal">Close</button></div>
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
                                        <th scope="col">Device Id </th>
                                        <th scope="col">Key Code </th>
                                        <th scope="col">Device Name </th>
                                        <th scope="col">Location </th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    {{-- <tr class="text-center">
                                        <td role="false" value="device_id" data-bs-toggle="false"
                                            data-bs-target="false" title="">9AA427A4</td>
                                        <td role="false" value="key_code" data-bs-toggle="false"
                                            data-bs-target="false" title="">82C0EB9A</td>
                                        <td role="false" value="device_name" data-bs-toggle="false"
                                            data-bs-target="false" title="WEBSAT">WEBSAT<span
                                                class="text-primary"></span></td>
                                        <td role="false" value="location_code" data-bs-toggle="false"
                                            data-bs-target="false" title="">AA101</td>
                                        <td>
                                            <div class="d-flex justify-content-center"><button
                                                    class="icon btn shadow-none d-flex justify-content-center align-items-center me-2"
                                                    data-bs-toggle="modal" data-bs-placement="top"
                                                    title="Click here to edit WEBSAT"
                                                    data-bs-target="#editDeviceModal" id="edit-modal-close"><svg
                                                        width="13" height="18" viewBox="0 0 25 25" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M12.336 13.8404L10.686 14.0764H10.684L10.92 12.4264L21.058 2.29236C21.1502 2.19685 21.2606 2.12067 21.3826 2.06826C21.5046 2.01585 21.6358 1.98826 21.7686 1.98711C21.9014 1.98596 22.0331 2.01126 22.156 2.06154C22.2789 2.11182 22.3905 2.18607 22.4844 2.27996C22.5783 2.37386 22.6525 2.48551 22.7028 2.60841C22.7531 2.7313 22.7784 2.86298 22.7773 2.99576C22.7761 3.12854 22.7485 3.25976 22.6961 3.38176C22.6437 3.50377 22.5675 3.61411 22.472 3.70636L12.336 13.8404ZM24.5368 1.84987C24.3859 1.48576 24.1648 1.15496 23.886 0.876359V0.87836C23.3234 0.315946 22.5605 0 21.765 0C20.9695 0 20.2066 0.315946 19.644 0.87836L9.272 11.2484C9.11925 11.4016 9.0203 11.6002 8.99 11.8144L8.518 15.1144C8.49591 15.2682 8.50996 15.425 8.55904 15.5724C8.60812 15.7198 8.69087 15.8538 8.80074 15.9636C8.9106 16.0735 9.04455 16.1562 9.19197 16.2053C9.33938 16.2544 9.49621 16.2684 9.65 16.2464L12.95 15.7744C13.1645 15.7435 13.3631 15.6438 13.516 15.4904L23.886 5.12036C24.1648 4.84176 24.3859 4.51096 24.5368 4.14685C24.6877 3.78275 24.7654 3.39249 24.7654 2.99836C24.7654 2.60423 24.6877 2.21397 24.5368 1.84987ZM22.2929 12.0492C22.1054 12.2368 22 12.4911 22 12.7563V22.7563H2V2.75635H12C12.2652 2.75635 12.5196 2.65099 12.7071 2.46345C12.8946 2.27592 13 2.02156 13 1.75635C13 1.49113 12.8946 1.23678 12.7071 1.04924C12.5196 0.861705 12.2652 0.756348 12 0.756348H1C0.734784 0.756348 0.48043 0.861705 0.292893 1.04924C0.105357 1.23678 0 1.49113 0 1.75635V23.7563C0 24.0216 0.105357 24.2759 0.292893 24.4635C0.48043 24.651 0.734784 24.7563 1 24.7563H23C23.2652 24.7563 23.5196 24.651 23.7071 24.4635C23.8946 24.2759 24 24.0216 24 23.7563V12.7563C24 12.4911 23.8946 12.2368 23.7071 12.0492C23.5196 11.8617 23.2652 11.7563 23 11.7563C22.7348 11.7563 22.4804 11.8617 22.2929 12.0492Z"
                                                            fill="#0E38CE"></path>
                                                    </svg></button><button type="submit"
                                                    class="icon btn shadow-none d-flex justify-content-center align-items-center"
                                                    data-bs-toggle="modal"
                                                    title="Click here to inactivate WEBSAT"
                                                    data-bs-target="#deleteDeviceModal"><img
                                                        src="/images/device -inactive.svg?26151424de50979db109a79b511167a7"
                                                        alt="Icon" width="55%"></button></div>
                                        </td>
                                    </tr>
                                    <tr class="text-center">
                                        <td role="false" value="device_id" data-bs-toggle="false"
                                            data-bs-target="false" title="">6CE18DE6</td>
                                        <td role="false" value="key_code" data-bs-toggle="false"
                                            data-bs-target="false" title="">A82598D2</td>
                                        <td role="false" value="device_name" data-bs-toggle="false"
                                            data-bs-target="false" title="RR318 RTU1 BAR">RR318 RTU1 BAR<span
                                                class="text-primary"></span></td>
                                        <td role="false" value="location_code" data-bs-toggle="false"
                                            data-bs-target="false" title="">AA101</td>
                                        <td>
                                            <div class="d-flex justify-content-center"><button
                                                    class="icon btn shadow-none d-flex justify-content-center align-items-center me-2"
                                                    data-bs-toggle="modal" data-bs-placement="top"
                                                    title="Click here to edit RR318 RTU1 BAR"
                                                    data-bs-target="#editDeviceModal" id="edit-modal-close"><svg
                                                        width="13" height="18" viewBox="0 0 25 25" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M12.336 13.8404L10.686 14.0764H10.684L10.92 12.4264L21.058 2.29236C21.1502 2.19685 21.2606 2.12067 21.3826 2.06826C21.5046 2.01585 21.6358 1.98826 21.7686 1.98711C21.9014 1.98596 22.0331 2.01126 22.156 2.06154C22.2789 2.11182 22.3905 2.18607 22.4844 2.27996C22.5783 2.37386 22.6525 2.48551 22.7028 2.60841C22.7531 2.7313 22.7784 2.86298 22.7773 2.99576C22.7761 3.12854 22.7485 3.25976 22.6961 3.38176C22.6437 3.50377 22.5675 3.61411 22.472 3.70636L12.336 13.8404ZM24.5368 1.84987C24.3859 1.48576 24.1648 1.15496 23.886 0.876359V0.87836C23.3234 0.315946 22.5605 0 21.765 0C20.9695 0 20.2066 0.315946 19.644 0.87836L9.272 11.2484C9.11925 11.4016 9.0203 11.6002 8.99 11.8144L8.518 15.1144C8.49591 15.2682 8.50996 15.425 8.55904 15.5724C8.60812 15.7198 8.69087 15.8538 8.80074 15.9636C8.9106 16.0735 9.04455 16.1562 9.19197 16.2053C9.33938 16.2544 9.49621 16.2684 9.65 16.2464L12.95 15.7744C13.1645 15.7435 13.3631 15.6438 13.516 15.4904L23.886 5.12036C24.1648 4.84176 24.3859 4.51096 24.5368 4.14685C24.6877 3.78275 24.7654 3.39249 24.7654 2.99836C24.7654 2.60423 24.6877 2.21397 24.5368 1.84987ZM22.2929 12.0492C22.1054 12.2368 22 12.4911 22 12.7563V22.7563H2V2.75635H12C12.2652 2.75635 12.5196 2.65099 12.7071 2.46345C12.8946 2.27592 13 2.02156 13 1.75635C13 1.49113 12.8946 1.23678 12.7071 1.04924C12.5196 0.861705 12.2652 0.756348 12 0.756348H1C0.734784 0.756348 0.48043 0.861705 0.292893 1.04924C0.105357 1.23678 0 1.49113 0 1.75635V23.7563C0 24.0216 0.105357 24.2759 0.292893 24.4635C0.48043 24.651 0.734784 24.7563 1 24.7563H23C23.2652 24.7563 23.5196 24.651 23.7071 24.4635C23.8946 24.2759 24 24.0216 24 23.7563V12.7563C24 12.4911 23.8946 12.2368 23.7071 12.0492C23.5196 11.8617 23.2652 11.7563 23 11.7563C22.7348 11.7563 22.4804 11.8617 22.2929 12.0492Z"
                                                            fill="#0E38CE"></path>
                                                    </svg></button><button type="submit"
                                                    class="icon btn shadow-none d-flex justify-content-center align-items-center"
                                                    data-bs-toggle="modal"
                                                    title="Click here to inactivate RR318 RTU1 BAR"
                                                    data-bs-target="#deleteDeviceModal"><img
                                                        src="/images/device -inactive.svg?26151424de50979db109a79b511167a7"
                                                        alt="Icon" width="55%"></button></div>
                                        </td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>
                        <div
                            class="paginate-container d-flex flex-column flex-sm-row justify-content-between align-items-center">
                            {{-- <div
                                class=" entries-text  d-flex justify-content-start align-items-center pb-2 pb-sm-0  undefined">
                                Showing 1 to 2 of 2 Entries</div>
                            <div
                                class="pagination-container d-flex justify-content-center justify-content-sm-end align-items-center">
                                <ul class="pagination align-items-center border-0 mb-0">
                                    <li class="previous-btn  page-item disabled"><a
                                            class="previous-btn d-flex justify-content-center align-items-center page-link"><i
                                                class="fa-solid fa-angles-left"></i></a></li>
                                    <li class="previous-btn  page-item disabled"><a
                                            class="previous-btn d-flex justify-content-center align-items-center page-link"><i
                                                class="fa-solid fa-chevron-left"></i></a></li>
                                    <li class="page-item active card-show"><a
                                            class="page-link d-flex justify-content-center align-items-center">1</a>
                                    </li>
                                    <li class="next-btn page-item disabled"><a
                                            class="next-btn d-flex justify-content-center align-items-center page-link"><i
                                                class="fa-solid fa-chevron-right"></i></a></li>
                                    <li class="next-btn page-item disabled"><a
                                            class="next-btn d-flex justify-content-center align-items-center page-link"><i
                                                class="fa-solid fa-angles-right"></i></a></li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                    <div class="tab-pane fade undefined" id="inActive" role="tabpanel"
                        aria-labelledby="home-tab">
                        <div class="table-container table-responsive-xxl">
                            <table class="table align-middle table-borderless mb-0">
                                <thead class="thead">
                                    <tr class="">
                                        <th scope="col">Device Id </th>
                                        <th scope="col">Key Code </th>
                                        <th scope="col">Device Name </th>
                                        <th scope="col">Location </th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    {{-- <tr class="text-center">
                                        <td role="false" value="device_id" data-bs-toggle="false"
                                            data-bs-target="false" title="">5024C266</td>
                                        <td role="false" value="key_code" data-bs-toggle="false"
                                            data-bs-target="false" title="">EB3DCD3C</td>
                                        <td role="false" value="device_name" data-bs-toggle="false"
                                            data-bs-target="false" title="RR319 RTU1 BAR">RR319 RTU1 BAR<span
                                                class="text-primary"></span></td>
                                        <td role="false" value="location_code" data-bs-toggle="false"
                                            data-bs-target="false" title="">RR319</td>
                                        <td>
                                            <div class="d-flex justify-content-center"><button
                                                    class="icon btn shadow-none d-flex justify-content-center align-items-center me-2"
                                                    data-bs-toggle="modal" data-bs-placement="top"
                                                    title="Click here to activate RR319 RTU1 BAR"
                                                    data-bs-target="#UpdateInactiveDeviceModal"
                                                    id="edit-modal-close"><img
                                                        src="/images/device.svg?972b82220ddeda45c0c34b38fc9e5589"
                                                        alt="Icon" width="55%"></button><button type="submit"
                                                    class="icon btn shadow-none d-flex justify-content-center align-items-center"
                                                    data-bs-toggle="modal"
                                                    title="Click here to delete RR319 RTU1 BAR"
                                                    data-bs-target="#deleteInactiveDeviceModal"><svg width="15"
                                                        height="16" viewBox="0 0 30 32" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M14.6173 1.10225e-08C15.9291 -8.58813e-05 17.1912 0.501814 18.1448 1.40274C19.0983 2.30367 19.6709 3.53532 19.7452 4.84504L19.7531 5.1358H28.0494C28.3497 5.13589 28.6387 5.24997 28.8581 5.45497C29.0776 5.65997 29.211 5.94062 29.2315 6.24021C29.2519 6.53979 29.1579 6.83598 28.9684 7.06892C28.7789 7.30186 28.5081 7.45418 28.2106 7.49511L28.0494 7.50617H26.7915L24.7688 28.081C24.6675 29.1067 24.2048 30.0631 23.4635 30.7792C22.7222 31.4953 21.7504 31.9247 20.7218 31.9905L20.4437 32H8.79092C7.75974 32 6.76218 31.6333 5.9765 30.9654C5.19083 30.2976 4.66824 29.3721 4.50212 28.3544L4.46578 28.0794L2.44148 7.50617H1.18519C0.898785 7.50616 0.622077 7.40244 0.406233 7.2142C0.190389 7.02595 0.0500121 6.76591 0.0110617 6.48217L0 6.32099C1.20777e-05 6.03459 0.103732 5.75788 0.291978 5.54204C0.480224 5.32619 0.740261 5.18581 1.024 5.14686L1.18519 5.1358H9.48148C9.48148 3.7737 10.0226 2.46739 10.9857 1.50424C11.9489 0.541092 13.2552 1.10225e-08 14.6173 1.10225e-08ZM24.4101 7.50617H4.82291L6.82509 27.8471C6.86942 28.301 7.06943 28.7255 7.39117 29.0487C7.71291 29.3719 8.13656 29.5738 8.59022 29.6201L8.79092 29.6296H20.4437C21.3918 29.6296 22.1962 28.958 22.3795 28.0462L22.4111 27.8471L24.4085 7.50617H24.4101ZM17.3827 11.8519C17.6691 11.8519 17.9458 11.9556 18.1617 12.1438C18.3775 12.3321 18.5179 12.5921 18.5568 12.8759L18.5679 13.037V24.0988C18.5678 24.3991 18.4537 24.6881 18.2487 24.9075C18.0437 25.1269 17.7631 25.2604 17.4635 25.2808C17.1639 25.3013 16.8677 25.2073 16.6348 25.0178C16.4019 24.8283 16.2495 24.5574 16.2086 24.26L16.1975 24.0988V13.037C16.1975 12.7227 16.3224 12.4213 16.5447 12.199C16.7669 11.9767 17.0684 11.8519 17.3827 11.8519ZM11.8519 11.8519C12.1383 11.8519 12.415 11.9556 12.6308 12.1438C12.8467 12.3321 12.987 12.5921 13.026 12.8759L13.037 13.037V24.0988C13.0369 24.3991 12.9229 24.6881 12.7179 24.9075C12.5129 25.1269 12.2322 25.2604 11.9326 25.2808C11.6331 25.3013 11.3369 25.2073 11.1039 25.0178C10.871 24.8283 10.7187 24.5574 10.6777 24.26L10.6667 24.0988V13.037C10.6667 12.7227 10.7915 12.4213 11.0138 12.199C11.2361 11.9767 11.5375 11.8519 11.8519 11.8519ZM14.6173 2.37037C13.9233 2.3704 13.2546 2.63138 12.7441 3.10152C12.2335 3.57166 11.9184 4.21657 11.8613 4.90825L11.8519 5.1358H17.3827C17.3827 4.40236 17.0914 3.69897 16.5727 3.18035C16.0541 2.66173 15.3507 2.37037 14.6173 2.37037Z"
                                                            fill="#FF0000"></path>
                                                    </svg></button></div>
                                        </td>
                                    </tr>
                                    <tr class="text-center">
                                        <td role="false" value="device_id" data-bs-toggle="false"
                                            data-bs-target="false" title="">65F382DE</td>
                                        <td role="false" value="key_code" data-bs-toggle="false"
                                            data-bs-target="false" title="">E1D810B6</td>
                                        <td role="false" value="device_name" data-bs-toggle="false"
                                            data-bs-target="false" title="WEB API TSTAT 2">WEB API TSTAT 2<span
                                                class="text-primary"></span></td>
                                        <td role="false" value="location_code" data-bs-toggle="false"
                                            data-bs-target="false" title="">SP108</td>
                                        <td>
                                            <div class="d-flex justify-content-center"><button
                                                    class="icon btn shadow-none d-flex justify-content-center align-items-center me-2"
                                                    data-bs-toggle="modal" data-bs-placement="top"
                                                    title="Click here to activate WEB API TSTAT 2"
                                                    data-bs-target="#UpdateInactiveDeviceModal"
                                                    id="edit-modal-close"><img
                                                        src="/images/device.svg?972b82220ddeda45c0c34b38fc9e5589"
                                                        alt="Icon" width="55%"></button><button type="submit"
                                                    class="icon btn shadow-none d-flex justify-content-center align-items-center"
                                                    data-bs-toggle="modal"
                                                    title="Click here to delete WEB API TSTAT 2"
                                                    data-bs-target="#deleteInactiveDeviceModal"><svg width="15"
                                                        height="16" viewBox="0 0 30 32" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M14.6173 1.10225e-08C15.9291 -8.58813e-05 17.1912 0.501814 18.1448 1.40274C19.0983 2.30367 19.6709 3.53532 19.7452 4.84504L19.7531 5.1358H28.0494C28.3497 5.13589 28.6387 5.24997 28.8581 5.45497C29.0776 5.65997 29.211 5.94062 29.2315 6.24021C29.2519 6.53979 29.1579 6.83598 28.9684 7.06892C28.7789 7.30186 28.5081 7.45418 28.2106 7.49511L28.0494 7.50617H26.7915L24.7688 28.081C24.6675 29.1067 24.2048 30.0631 23.4635 30.7792C22.7222 31.4953 21.7504 31.9247 20.7218 31.9905L20.4437 32H8.79092C7.75974 32 6.76218 31.6333 5.9765 30.9654C5.19083 30.2976 4.66824 29.3721 4.50212 28.3544L4.46578 28.0794L2.44148 7.50617H1.18519C0.898785 7.50616 0.622077 7.40244 0.406233 7.2142C0.190389 7.02595 0.0500121 6.76591 0.0110617 6.48217L0 6.32099C1.20777e-05 6.03459 0.103732 5.75788 0.291978 5.54204C0.480224 5.32619 0.740261 5.18581 1.024 5.14686L1.18519 5.1358H9.48148C9.48148 3.7737 10.0226 2.46739 10.9857 1.50424C11.9489 0.541092 13.2552 1.10225e-08 14.6173 1.10225e-08ZM24.4101 7.50617H4.82291L6.82509 27.8471C6.86942 28.301 7.06943 28.7255 7.39117 29.0487C7.71291 29.3719 8.13656 29.5738 8.59022 29.6201L8.79092 29.6296H20.4437C21.3918 29.6296 22.1962 28.958 22.3795 28.0462L22.4111 27.8471L24.4085 7.50617H24.4101ZM17.3827 11.8519C17.6691 11.8519 17.9458 11.9556 18.1617 12.1438C18.3775 12.3321 18.5179 12.5921 18.5568 12.8759L18.5679 13.037V24.0988C18.5678 24.3991 18.4537 24.6881 18.2487 24.9075C18.0437 25.1269 17.7631 25.2604 17.4635 25.2808C17.1639 25.3013 16.8677 25.2073 16.6348 25.0178C16.4019 24.8283 16.2495 24.5574 16.2086 24.26L16.1975 24.0988V13.037C16.1975 12.7227 16.3224 12.4213 16.5447 12.199C16.7669 11.9767 17.0684 11.8519 17.3827 11.8519ZM11.8519 11.8519C12.1383 11.8519 12.415 11.9556 12.6308 12.1438C12.8467 12.3321 12.987 12.5921 13.026 12.8759L13.037 13.037V24.0988C13.0369 24.3991 12.9229 24.6881 12.7179 24.9075C12.5129 25.1269 12.2322 25.2604 11.9326 25.2808C11.6331 25.3013 11.3369 25.2073 11.1039 25.0178C10.871 24.8283 10.7187 24.5574 10.6777 24.26L10.6667 24.0988V13.037C10.6667 12.7227 10.7915 12.4213 11.0138 12.199C11.2361 11.9767 11.5375 11.8519 11.8519 11.8519ZM14.6173 2.37037C13.9233 2.3704 13.2546 2.63138 12.7441 3.10152C12.2335 3.57166 11.9184 4.21657 11.8613 4.90825L11.8519 5.1358H17.3827C17.3827 4.40236 17.0914 3.69897 16.5727 3.18035C16.0541 2.66173 15.3507 2.37037 14.6173 2.37037Z"
                                                            fill="#FF0000"></path>
                                                    </svg></button></div>
                                        </td>
                                    </tr>
                                    <tr class="text-center">
                                        <td role="false" value="device_id" data-bs-toggle="false"
                                            data-bs-target="false" title="">9D94667D</td>
                                        <td role="false" value="key_code" data-bs-toggle="false"
                                            data-bs-target="false" title="">1055180B</td>
                                        <td role="false" value="device_name" data-bs-toggle="false"
                                            data-bs-target="false" title="BU4572 RTU1 FOH">BU4572 RTU1 FOH<span
                                                class="text-primary"></span></td>
                                        <td role="false" value="location_code" data-bs-toggle="false"
                                            data-bs-target="false" title="">AA102</td>
                                        <td>
                                            <div class="d-flex justify-content-center"><button
                                                    class="icon btn shadow-none d-flex justify-content-center align-items-center me-2"
                                                    data-bs-toggle="modal" data-bs-placement="top"
                                                    title="Click here to activate BU4572 RTU1 FOH"
                                                    data-bs-target="#UpdateInactiveDeviceModal"
                                                    id="edit-modal-close"><img
                                                        src="/images/device.svg?972b82220ddeda45c0c34b38fc9e5589"
                                                        alt="Icon" width="55%"></button><button type="submit"
                                                    class="icon btn shadow-none d-flex justify-content-center align-items-center"
                                                    data-bs-toggle="modal"
                                                    title="Click here to delete BU4572 RTU1 FOH"
                                                    data-bs-target="#deleteInactiveDeviceModal"><svg width="15"
                                                        height="16" viewBox="0 0 30 32" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M14.6173 1.10225e-08C15.9291 -8.58813e-05 17.1912 0.501814 18.1448 1.40274C19.0983 2.30367 19.6709 3.53532 19.7452 4.84504L19.7531 5.1358H28.0494C28.3497 5.13589 28.6387 5.24997 28.8581 5.45497C29.0776 5.65997 29.211 5.94062 29.2315 6.24021C29.2519 6.53979 29.1579 6.83598 28.9684 7.06892C28.7789 7.30186 28.5081 7.45418 28.2106 7.49511L28.0494 7.50617H26.7915L24.7688 28.081C24.6675 29.1067 24.2048 30.0631 23.4635 30.7792C22.7222 31.4953 21.7504 31.9247 20.7218 31.9905L20.4437 32H8.79092C7.75974 32 6.76218 31.6333 5.9765 30.9654C5.19083 30.2976 4.66824 29.3721 4.50212 28.3544L4.46578 28.0794L2.44148 7.50617H1.18519C0.898785 7.50616 0.622077 7.40244 0.406233 7.2142C0.190389 7.02595 0.0500121 6.76591 0.0110617 6.48217L0 6.32099C1.20777e-05 6.03459 0.103732 5.75788 0.291978 5.54204C0.480224 5.32619 0.740261 5.18581 1.024 5.14686L1.18519 5.1358H9.48148C9.48148 3.7737 10.0226 2.46739 10.9857 1.50424C11.9489 0.541092 13.2552 1.10225e-08 14.6173 1.10225e-08ZM24.4101 7.50617H4.82291L6.82509 27.8471C6.86942 28.301 7.06943 28.7255 7.39117 29.0487C7.71291 29.3719 8.13656 29.5738 8.59022 29.6201L8.79092 29.6296H20.4437C21.3918 29.6296 22.1962 28.958 22.3795 28.0462L22.4111 27.8471L24.4085 7.50617H24.4101ZM17.3827 11.8519C17.6691 11.8519 17.9458 11.9556 18.1617 12.1438C18.3775 12.3321 18.5179 12.5921 18.5568 12.8759L18.5679 13.037V24.0988C18.5678 24.3991 18.4537 24.6881 18.2487 24.9075C18.0437 25.1269 17.7631 25.2604 17.4635 25.2808C17.1639 25.3013 16.8677 25.2073 16.6348 25.0178C16.4019 24.8283 16.2495 24.5574 16.2086 24.26L16.1975 24.0988V13.037C16.1975 12.7227 16.3224 12.4213 16.5447 12.199C16.7669 11.9767 17.0684 11.8519 17.3827 11.8519ZM11.8519 11.8519C12.1383 11.8519 12.415 11.9556 12.6308 12.1438C12.8467 12.3321 12.987 12.5921 13.026 12.8759L13.037 13.037V24.0988C13.0369 24.3991 12.9229 24.6881 12.7179 24.9075C12.5129 25.1269 12.2322 25.2604 11.9326 25.2808C11.6331 25.3013 11.3369 25.2073 11.1039 25.0178C10.871 24.8283 10.7187 24.5574 10.6777 24.26L10.6667 24.0988V13.037C10.6667 12.7227 10.7915 12.4213 11.0138 12.199C11.2361 11.9767 11.5375 11.8519 11.8519 11.8519ZM14.6173 2.37037C13.9233 2.3704 13.2546 2.63138 12.7441 3.10152C12.2335 3.57166 11.9184 4.21657 11.8613 4.90825L11.8519 5.1358H17.3827C17.3827 4.40236 17.0914 3.69897 16.5727 3.18035C16.0541 2.66173 15.3507 2.37037 14.6173 2.37037Z"
                                                            fill="#FF0000"></path>
                                                    </svg></button></div>
                                        </td>
                                    </tr>
                                    <tr class="text-center">
                                        <td role="false" value="device_id" data-bs-toggle="false"
                                            data-bs-target="false" title="">81BEBB77</td>
                                        <td role="false" value="key_code" data-bs-toggle="false"
                                            data-bs-target="false" title="">6C25127B</td>
                                        <td role="false" value="device_name" data-bs-toggle="false"
                                            data-bs-target="false" title="BU4572 LIGHTBOX">BU4572 LIGHTBOX<span
                                                class="text-primary"></span></td>
                                        <td role="false" value="location_code" data-bs-toggle="false"
                                            data-bs-target="false" title="">AA102</td>
                                        <td>
                                            <div class="d-flex justify-content-center"><button
                                                    class="icon btn shadow-none d-flex justify-content-center align-items-center me-2"
                                                    data-bs-toggle="modal" data-bs-placement="top"
                                                    title="Click here to activate BU4572 LIGHTBOX"
                                                    data-bs-target="#UpdateInactiveDeviceModal"
                                                    id="edit-modal-close"><img
                                                        src="/images/device.svg?972b82220ddeda45c0c34b38fc9e5589"
                                                        alt="Icon" width="55%"></button><button type="submit"
                                                    class="icon btn shadow-none d-flex justify-content-center align-items-center"
                                                    data-bs-toggle="modal"
                                                    title="Click here to delete BU4572 LIGHTBOX"
                                                    data-bs-target="#deleteInactiveDeviceModal"><svg width="15"
                                                        height="16" viewBox="0 0 30 32" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M14.6173 1.10225e-08C15.9291 -8.58813e-05 17.1912 0.501814 18.1448 1.40274C19.0983 2.30367 19.6709 3.53532 19.7452 4.84504L19.7531 5.1358H28.0494C28.3497 5.13589 28.6387 5.24997 28.8581 5.45497C29.0776 5.65997 29.211 5.94062 29.2315 6.24021C29.2519 6.53979 29.1579 6.83598 28.9684 7.06892C28.7789 7.30186 28.5081 7.45418 28.2106 7.49511L28.0494 7.50617H26.7915L24.7688 28.081C24.6675 29.1067 24.2048 30.0631 23.4635 30.7792C22.7222 31.4953 21.7504 31.9247 20.7218 31.9905L20.4437 32H8.79092C7.75974 32 6.76218 31.6333 5.9765 30.9654C5.19083 30.2976 4.66824 29.3721 4.50212 28.3544L4.46578 28.0794L2.44148 7.50617H1.18519C0.898785 7.50616 0.622077 7.40244 0.406233 7.2142C0.190389 7.02595 0.0500121 6.76591 0.0110617 6.48217L0 6.32099C1.20777e-05 6.03459 0.103732 5.75788 0.291978 5.54204C0.480224 5.32619 0.740261 5.18581 1.024 5.14686L1.18519 5.1358H9.48148C9.48148 3.7737 10.0226 2.46739 10.9857 1.50424C11.9489 0.541092 13.2552 1.10225e-08 14.6173 1.10225e-08ZM24.4101 7.50617H4.82291L6.82509 27.8471C6.86942 28.301 7.06943 28.7255 7.39117 29.0487C7.71291 29.3719 8.13656 29.5738 8.59022 29.6201L8.79092 29.6296H20.4437C21.3918 29.6296 22.1962 28.958 22.3795 28.0462L22.4111 27.8471L24.4085 7.50617H24.4101ZM17.3827 11.8519C17.6691 11.8519 17.9458 11.9556 18.1617 12.1438C18.3775 12.3321 18.5179 12.5921 18.5568 12.8759L18.5679 13.037V24.0988C18.5678 24.3991 18.4537 24.6881 18.2487 24.9075C18.0437 25.1269 17.7631 25.2604 17.4635 25.2808C17.1639 25.3013 16.8677 25.2073 16.6348 25.0178C16.4019 24.8283 16.2495 24.5574 16.2086 24.26L16.1975 24.0988V13.037C16.1975 12.7227 16.3224 12.4213 16.5447 12.199C16.7669 11.9767 17.0684 11.8519 17.3827 11.8519ZM11.8519 11.8519C12.1383 11.8519 12.415 11.9556 12.6308 12.1438C12.8467 12.3321 12.987 12.5921 13.026 12.8759L13.037 13.037V24.0988C13.0369 24.3991 12.9229 24.6881 12.7179 24.9075C12.5129 25.1269 12.2322 25.2604 11.9326 25.2808C11.6331 25.3013 11.3369 25.2073 11.1039 25.0178C10.871 24.8283 10.7187 24.5574 10.6777 24.26L10.6667 24.0988V13.037C10.6667 12.7227 10.7915 12.4213 11.0138 12.199C11.2361 11.9767 11.5375 11.8519 11.8519 11.8519ZM14.6173 2.37037C13.9233 2.3704 13.2546 2.63138 12.7441 3.10152C12.2335 3.57166 11.9184 4.21657 11.8613 4.90825L11.8519 5.1358H17.3827C17.3827 4.40236 17.0914 3.69897 16.5727 3.18035C16.0541 2.66173 15.3507 2.37037 14.6173 2.37037Z"
                                                            fill="#FF0000"></path>
                                                    </svg></button></div>
                                        </td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>
                        <div
                            class="paginate-container d-flex flex-column flex-sm-row justify-content-between align-items-center">
                            {{-- <div
                                class=" entries-text  d-flex justify-content-start align-items-center pb-2 pb-sm-0  undefined">
                                Showing 1 to 4 of 4 Entries</div>
                            <div
                                class="pagination-container d-flex justify-content-center justify-content-sm-end align-items-center">
                                <ul class="pagination align-items-center border-0 mb-0">
                                    <li class="previous-btn  page-item disabled"><a
                                            class="previous-btn d-flex justify-content-center align-items-center page-link"><i
                                                class="fa-solid fa-angles-left"></i></a></li>
                                    <li class="previous-btn  page-item disabled"><a
                                            class="previous-btn d-flex justify-content-center align-items-center page-link"><i
                                                class="fa-solid fa-chevron-left"></i></a></li>
                                    <li class="page-item active card-show"><a
                                            class="page-link d-flex justify-content-center align-items-center">1</a>
                                    </li>
                                    <li class="next-btn page-item disabled"><a
                                            class="next-btn d-flex justify-content-center align-items-center page-link"><i
                                                class="fa-solid fa-chevron-right"></i></a></li>
                                    <li class="next-btn page-item disabled"><a
                                            class="next-btn d-flex justify-content-center align-items-center page-link"><i
                                                class="fa-solid fa-angles-right"></i></a></li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="editDeviceModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                    <div class=" modal-dialog modal-lg d-flex justify-content-center align-items-center">
                        <div class=" modal-content text-decoration-none border-0">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Device</h5><button
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
                                        <div class="my-2  col-md-6 position-relative form-group"><label
                                                class="py-2 fs-6">Device Id</label><input type="text"
                                                placeholder="Enter device Id" name="device_id"
                                                class="form-control w-md-100 " data-name="notAllowSpecial"
                                                readonly="" value="">
                                            <div class="position-absolute"></div>
                                        </div>
                                        <div class="my-2  col-md-6 position-relative form-group"><label
                                                class="py-2 fs-6">Device Name</label><input type="text"
                                                placeholder="Enter device name" name="device_name"
                                                class="form-control w-md-100 " data-name="notAllowSpecial"
                                                readonly="" value="">
                                            <div class="position-absolute"></div>
                                        </div>
                                        <div class="my-2  col-md-6 position-relative"><label
                                                class="undefined py-2 fs-6">Location Code</label><select
                                                class="form-select form-control " name="location_code"
                                                data-value="">
                                                <option value="">Select Location Code</option>
                                            </select>
                                            <div class="position-absolute"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mt-2">
                                        <div class="px-2"><button type="submit"
                                                class="btn buttons px-4 text-white py-1">Update</button></div>
                                        <div class="px-2"><button type="button"
                                                class="btn bg-secondary px-4 text-white py-1" id="updateClear"
                                                data-bs-dismiss="modal">Cancel</button></div>
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
                                        device "undefined"?</h5>
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
                                    <h5 class="text-center pb-4"> Are you sure, do you want to inactivate the
                                        device "undefined" permanently?</h5>
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
                                        device ""?</h5>
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
    </div>
    @endauth
@endsection
