@extends('layouts.app')

@section('content')
    @auth
    <div class="body-container">
        <div class="WaterConservationApiLog container-lg">
            <div class="d-flex align-items-center title">
                <h3 class="title-text m-0 me-1">Water Conservation Api Logs List</h3>
                <div class="indicator"></div>
            </div>
            <div
                class="features-section d-flex justify-content-end flex-wrap align-items-center mt-4 mb-3 mb-lg-5">
                <div class="d-flex field-container align-items-center position-relative flex-wrap">
                    <section class="filter-section"><button class="btn btn-success  text-white py-1 px-2 me-2"
                            type="button"><i class="fa-solid fa-filter me-2"></i>Filter</button></section>
                    <div class="d-flex search bg-white rounded position-relative my-sm-3 my-lg-0 me-sm-3"><input
                            type="text" placeholder="Search" value=""><svg class="search-svg position-absolute"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
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
            </div>
            <div class="table-container table-responsive-xxl">
                <table class="table align-middle table-borderless mb-0">
                    <thead class="thead">
                        <tr class="">
                            <th scope="col">Date </th>
                            <th scope="col">Time </th>
                            <th scope="col">Api Count </th>
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
    </div>
    @endauth
@endsection
