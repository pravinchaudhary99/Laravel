@extends('layouts.header')

@section('title', 'View List')

@section('content')
<!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <script>
            toastr.options.timeOut = 4000;
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @endif
        </script>
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">

            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        View User Details
                    </h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('home.index') }}" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">User Management</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('users.index') }}" class="text-muted text-hover-primary">Users</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Users view</li>
                    <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->

            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->

        <!--begin::Content-->
        <div id="kt_app_content" class="app-content  flex-column-fluid ">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container  container-xxl ">
                <!--begin::Layout-->
                <div class="d-flex flex-column flex-lg-row">
                    <!--begin::Sidebar-->
                    <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">

                        <!--begin::Card-->
                        <div class="card mb-5 mb-xl-8">
                            <!--begin::Card body-->
                            <div class="card-body">
                                <!--begin::Summary-->


                                <!--begin::User Info-->
                                <div class="d-flex flex-center flex-column py-5">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-100px symbol-circle mb-7">
                                        <img src="@if(!isset($user_data->profile_picture)){{ asset('/assets/media/svg/avatars/blank.svg') }}@else{{ url($user_data->profile_picture) }}@endif" alt="image">
                                    </div>
                                    <!--end::Avatar-->

                                    <!--begin::Name-->
                                    <span class="fs-3 text-gray-800 fw-bold mb-3">{{ $user_data['name'] }}</span>
                                    <!--end::Name-->

                                    <!--begin::Position-->
                                    <div class="mb-9">
                                        <!--begin::Badge-->
                                        <div class="badge badge-lg badge-light-primary d-inline">{{ $role_name }}</div>
                                        <!--begin::Badge-->
                                    </div>
                                    <!--end::Position-->

                                    <!--begin::Info-->
                                    <!--begin::Info heading-->
                                    <div class="fw-bold mb-3">
                                        Assigned Task
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover"
                                            data-bs-trigger="hover" data-bs-html="true"
                                            data-bs-content="Number of support tickets assigned, closed and pending this week."
                                            data-kt-initialized="1"></i>
                                    </div>
                                    <!--end::Info heading-->

                                    <div class="d-flex flex-wrap flex-center">
                                        <!--begin::Stats-->
                                        <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                            <div class="fs-4 fw-bold text-gray-700">
                                                <span class="w-75px">10</span>
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                <span class="svg-icon svg-icon-3 svg-icon-success"><svg width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="13" y="6"
                                                            width="13" height="2" rx="1"
                                                            transform="rotate(90 13 6)" fill="currentColor"></rect>
                                                        <path
                                                            d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <div class="fw-semibold text-muted">Total</div>
                                        </div>
                                        <!--end::Stats-->

                                        <!--begin::Stats-->
                                        <div class="border border-gray-300 border-dashed rounded py-3 px-3 mx-4 mb-3">
                                            <div class="fs-4 fw-bold text-gray-700">
                                                <span class="w-50px">6</span>
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
                                                <span class="svg-icon svg-icon-3 svg-icon-danger"><svg width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="11" y="18"
                                                            width="13" height="2" rx="1"
                                                            transform="rotate(-90 11 18)" fill="currentColor"></rect>
                                                        <path
                                                            d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <div class="fw-semibold text-muted">Solved</div>
                                        </div>
                                        <!--end::Stats-->

                                        <!--begin::Stats-->
                                        <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                            <div class="fs-4 fw-bold text-gray-700">
                                                <span class="w-50px">4</span>
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                <span class="svg-icon svg-icon-3 svg-icon-success"><svg width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="13" y="6"
                                                            width="13" height="2" rx="1"
                                                            transform="rotate(90 13 6)" fill="currentColor"></rect>
                                                        <path
                                                            d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <div class="fw-semibold text-muted">Open</div>
                                        </div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::User Info-->
                                <!--end::Summary-->

                                <!--begin::Details toggle-->
                                <div class="d-flex flex-stack fs-4 py-3">
                                    <div class="fw-bold rotate collapsible" data-bs-toggle="collapse"
                                        href="#kt_user_view_details" role="button" aria-expanded="false"
                                        aria-controls="kt_user_view_details">
                                        Details
                                        <span class="ms-2 rotate-180">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                            <span class="svg-icon svg-icon-3"><svg width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </div>

                                    <span data-bs-toggle="tooltip" data-bs-trigger="hover"
                                        data-bs-original-title="Edit customer details" data-kt-initialized="1">
                                        <a href="#" class="btn btn-sm btn-light-primary" data-bs-toggle="modal"
                                            data-bs-target="#kt_modal_add_customer">
                                            Edit
                                        </a>
                                    </span>
                                </div>
                                <!--end::Details toggle-->

                                <div class="separator"></div>

                                <!--begin::Details content-->
                                <div id="kt_user_view_details" class="collapse show">
                                    <div class="pb-5 fs-6">
                                        <!--begin::Details item-->
                                        <div class="fw-bold mt-5">Email</div>
                                        <div class="text-gray-600"><span
                                                class="text-gray-600">{{ $user_data['email'] }}</span></div>
                                        <!--begin::Details item-->
                                        <!--begin::Details item-->
                                        <div class="fw-bold mt-5">Address</div>
                                        <div class="text-gray-600"><span
                                                class="text-gray-600">{{ $user_data['address'] }}</span></div>
                                        <!--begin::Details item-->
                                        <!--begin::Details item-->
                                        <div class="fw-bold mt-5">Contact Number</div>
                                        <div class="text-gray-600"><span
                                                class="text-gray-600">{{ $user_data['contact_no'] }}</span></div>
                                        <!--begin::Details item-->
                                        <!--begin::Details item-->
                                        <div class="fw-bold mt-5">Last Login</div>
                                        <div class="text-gray-600">{{ $user_data['last_login'] }}</div>
                                        <!--begin::Details item-->
                                    </div>
                                </div>
                                <!--end::Details content-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->

                    </div>
                    <!--end::Sidebar-->

                    <!--begin::Content-->
                    <div class="flex-lg-row-fluid ms-lg-15">
                        <!--begin:::Tabs-->
                        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8"
                            role="tablist">
                            <!--begin:::Tab item-->
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                                    href="#kt_user_view_overview_tab" aria-selected="true" role="tab">Overview</a>
                            </li>
                            <!--end:::Tab item-->
                            <!--begin:::Tab item-->
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                    href="#kt_user_view_overview_events_and_logs_tab" aria-selected="false"
                                    tabindex="-1" role="tab">Users &amp; Task</a>
                            </li>
                            <!--end:::Tab item-->


                        </ul>
                        <!--end:::Tabs-->

                        <!--begin:::Tab content-->
                        <div class="tab-content" id="myTabContent">
                            <!--begin:::Tab pane-->
                            <div class="tab-pane fade show active" id="kt_user_view_overview_tab" role="tabpanel">
                                <!--begin::Card-->
                                <div class="card card-flush mb-6 mb-xl-9">
                                    <!--begin::Card header-->
                                    <div class="card-header mt-6">
                                        <!--begin::Card title-->
                                        <div class="card-title flex-column">
                                            <h2 class="mb-1">User's Schedule</h2>

                                            <div class="fs-6 fw-semibold text-muted">2 upcoming meetings</div>
                                        </div>
                                        <!--end::Card title-->

                                        <!--begin::Card toolbar-->
                                        <div class="card-toolbar">
                                            <button type="button" class="btn btn-light-primary btn-sm"
                                                data-bs-toggle="modal" data-bs-target="#kt_modal_add_schedule">
                                                <!--SVG file not found: media/icons/duotune/art/art008.svg-->
                                                Add Schedule
                                            </button>
                                        </div>
                                        <!--end::Card toolbar-->
                                    </div>
                                    <!--end::Card header-->

                                    <!--begin::Card body-->
                                    <div class="card-body p-9 pt-4">
                                        <!--begin::Dates-->
                                        <ul class="nav nav-pills d-flex flex-nowrap hover-scroll-x py-2" role="tablist">

                                            <!--begin::Date-->
                                            <li class="nav-item me-1" role="presentation">
                                                <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-40px me-2 py-4 btn-active-primary "
                                                    data-bs-toggle="tab" href="#kt_schedule_day_0" aria-selected="false"
                                                    tabindex="-1" role="tab">

                                                    <span class="opacity-50 fs-7 fw-semibold">Su</span>
                                                    <span class="fs-6 fw-bolder">21</span>
                                                </a>
                                            </li>
                                            <!--end::Date-->

                                            <!--begin::Date-->
                                            <li class="nav-item me-1" role="presentation">
                                                <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-40px me-2 py-4 btn-active-primary active"
                                                    data-bs-toggle="tab" href="#kt_schedule_day_1" aria-selected="true"
                                                    role="tab">

                                                    <span class="opacity-50 fs-7 fw-semibold">Mo</span>
                                                    <span class="fs-6 fw-bolder">22</span>
                                                </a>
                                            </li>
                                            <!--end::Date-->

                                            <!--begin::Date-->
                                            <li class="nav-item me-1" role="presentation">
                                                <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-40px me-2 py-4 btn-active-primary "
                                                    data-bs-toggle="tab" href="#kt_schedule_day_2" aria-selected="false"
                                                    tabindex="-1" role="tab">

                                                    <span class="opacity-50 fs-7 fw-semibold">Tu</span>
                                                    <span class="fs-6 fw-bolder">23</span>
                                                </a>
                                            </li>
                                            <!--end::Date-->

                                            <!--begin::Date-->
                                            <li class="nav-item me-1" role="presentation">
                                                <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-40px me-2 py-4 btn-active-primary "
                                                    data-bs-toggle="tab" href="#kt_schedule_day_3" aria-selected="false"
                                                    tabindex="-1" role="tab">

                                                    <span class="opacity-50 fs-7 fw-semibold">We</span>
                                                    <span class="fs-6 fw-bolder">24</span>
                                                </a>
                                            </li>
                                            <!--end::Date-->

                                            <!--begin::Date-->
                                            <li class="nav-item me-1" role="presentation">
                                                <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-40px me-2 py-4 btn-active-primary "
                                                    data-bs-toggle="tab" href="#kt_schedule_day_4" aria-selected="false"
                                                    tabindex="-1" role="tab">

                                                    <span class="opacity-50 fs-7 fw-semibold">Th</span>
                                                    <span class="fs-6 fw-bolder">25</span>
                                                </a>
                                            </li>
                                            <!--end::Date-->

                                            <!--begin::Date-->
                                            <li class="nav-item me-1" role="presentation">
                                                <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-40px me-2 py-4 btn-active-primary "
                                                    data-bs-toggle="tab" href="#kt_schedule_day_5" aria-selected="false"
                                                    tabindex="-1" role="tab">

                                                    <span class="opacity-50 fs-7 fw-semibold">Fr</span>
                                                    <span class="fs-6 fw-bolder">26</span>
                                                </a>
                                            </li>
                                            <!--end::Date-->

                                            <!--begin::Date-->
                                            <li class="nav-item me-1" role="presentation">
                                                <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-40px me-2 py-4 btn-active-primary "
                                                    data-bs-toggle="tab" href="#kt_schedule_day_6" aria-selected="false"
                                                    tabindex="-1" role="tab">

                                                    <span class="opacity-50 fs-7 fw-semibold">Sa</span>
                                                    <span class="fs-6 fw-bolder">27</span>
                                                </a>
                                            </li>
                                            <!--end::Date-->

                                            <!--begin::Date-->
                                            <li class="nav-item me-1" role="presentation">
                                                <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-40px me-2 py-4 btn-active-primary "
                                                    data-bs-toggle="tab" href="#kt_schedule_day_7" aria-selected="false"
                                                    tabindex="-1" role="tab">

                                                    <span class="opacity-50 fs-7 fw-semibold">Su</span>
                                                    <span class="fs-6 fw-bolder">28</span>
                                                </a>
                                            </li>
                                            <!--end::Date-->

                                            <!--begin::Date-->
                                            <li class="nav-item me-1" role="presentation">
                                                <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-40px me-2 py-4 btn-active-primary "
                                                    data-bs-toggle="tab" href="#kt_schedule_day_8" aria-selected="false"
                                                    tabindex="-1" role="tab">

                                                    <span class="opacity-50 fs-7 fw-semibold">Mo</span>
                                                    <span class="fs-6 fw-bolder">29</span>
                                                </a>
                                            </li>
                                            <!--end::Date-->

                                            <!--begin::Date-->
                                            <li class="nav-item me-1" role="presentation">
                                                <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-40px me-2 py-4 btn-active-primary "
                                                    data-bs-toggle="tab" href="#kt_schedule_day_9" aria-selected="false"
                                                    tabindex="-1" role="tab">

                                                    <span class="opacity-50 fs-7 fw-semibold">Tu</span>
                                                    <span class="fs-6 fw-bolder">30</span>
                                                </a>
                                            </li>
                                            <!--end::Date-->

                                            <!--begin::Date-->
                                            <li class="nav-item me-1" role="presentation">
                                                <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-40px me-2 py-4 btn-active-primary "
                                                    data-bs-toggle="tab" href="#kt_schedule_day_10" aria-selected="false"
                                                    tabindex="-1" role="tab">

                                                    <span class="opacity-50 fs-7 fw-semibold">We</span>
                                                    <span class="fs-6 fw-bolder">31</span>
                                                </a>
                                            </li>
                                            <!--end::Date-->
                                        </ul>
                                        <!--end::Dates-->

                                        <!--begin::Tab Content-->
                                        <div class="tab-content">
                                            <!--begin::Day-->
                                            <div id="kt_schedule_day_0" class="tab-pane fade show " role="tabpanel">
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            9:00 - 10:00
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                am </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Creative Content Initiative </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Peter Marcus</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            13:00 - 14:00
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                pm </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            9 Degree Project Estimation Meeting </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Naomi Hayabusa</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            11:00 - 11:45
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                am </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Dashboard UI/UX Design Review </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Yannis Gloverson</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            10:00 - 11:00
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                am </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Team Backlog Grooming Session </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Yannis Gloverson</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                            </div>
                                            <!--end::Day-->
                                            <!--begin::Day-->
                                            <div id="kt_schedule_day_1" class="tab-pane fade show active"
                                                role="tabpanel">
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            9:00 - 10:00
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                am </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Committee Review Approvals </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Kendell Trevor</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            12:00 - 13:00
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                pm </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Dashboard UI/UX Design Review </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Kendell Trevor</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            9:00 - 10:00
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                am </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Dashboard UI/UX Design Review </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Michael Walters</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            14:30 - 15:30
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                pm </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Sales Pitch Proposal </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">David Stevenson</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                            </div>
                                            <!--end::Day-->
                                            <!--begin::Day-->
                                            <div id="kt_schedule_day_2" class="tab-pane fade show " role="tabpanel">
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            16:30 - 17:30
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                pm </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Creative Content Initiative </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Mark Randall</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            9:00 - 10:00
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                am </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Project Review &amp; Testing </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Walter White</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            14:30 - 15:30
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                pm </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            9 Degree Project Estimation Meeting </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Terry Robins</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            12:00 - 13:00
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                pm </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Weekly Team Stand-Up </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Michael Walters</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                            </div>
                                            <!--end::Day-->
                                            <!--begin::Day-->
                                            <div id="kt_schedule_day_3" class="tab-pane fade show " role="tabpanel">
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            12:00 - 13:00
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                pm </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Project Review &amp; Testing </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">David Stevenson</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            14:30 - 15:30
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                pm </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Development Team Capacity Review </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Terry Robins</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            13:00 - 14:00
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                pm </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Sales Pitch Proposal </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Caleb Donaldson</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            9:00 - 10:00
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                am </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Dashboard UI/UX Design Review </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Mark Randall</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            13:00 - 14:00
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                pm </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Committee Review Approvals </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Terry Robins</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                            </div>
                                            <!--end::Day-->
                                            <!--begin::Day-->
                                            <div id="kt_schedule_day_4" class="tab-pane fade show " role="tabpanel">
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            10:00 - 11:00
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                am </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Project Review &amp; Testing </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Kendell Trevor</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            10:00 - 11:00
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                am </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            9 Degree Project Estimation Meeting </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Walter White</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            14:30 - 15:30
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                pm </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Development Team Capacity Review </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Mark Randall</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            11:00 - 11:45
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                am </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Dashboard UI/UX Design Review </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Peter Marcus</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                            </div>
                                            <!--end::Day-->
                                            <!--begin::Day-->
                                            <div id="kt_schedule_day_5" class="tab-pane fade show " role="tabpanel">
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            14:30 - 15:30
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                pm </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Creative Content Initiative </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Bob Harris</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            11:00 - 11:45
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                am </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Sales Pitch Proposal </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Terry Robins</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            16:30 - 17:30
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                pm </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Marketing Campaign Discussion </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Naomi Hayabusa</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            13:00 - 14:00
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                pm </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Marketing Campaign Discussion </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Yannis Gloverson</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                            </div>
                                            <!--end::Day-->
                                            <!--begin::Day-->
                                            <div id="kt_schedule_day_6" class="tab-pane fade show " role="tabpanel">
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            12:00 - 13:00
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                pm </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Team Backlog Grooming Session </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Terry Robins</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            13:00 - 14:00
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                pm </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Marketing Campaign Discussion </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Walter White</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            11:00 - 11:45
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                am </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Sales Pitch Proposal </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Caleb Donaldson</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            14:30 - 15:30
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                pm </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Team Backlog Grooming Session </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Walter White</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            10:00 - 11:00
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                am </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Creative Content Initiative </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Caleb Donaldson</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                            </div>
                                            <!--end::Day-->
                                            <!--begin::Day-->
                                            <div id="kt_schedule_day_7" class="tab-pane fade show " role="tabpanel">
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            11:00 - 11:45
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                am </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Committee Review Approvals </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Karina Clarke</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            11:00 - 11:45
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                am </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Lunch &amp; Learn Catch Up </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Bob Harris</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            12:00 - 13:00
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                pm </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Weekly Team Stand-Up </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Caleb Donaldson</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            14:30 - 15:30
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                pm </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Project Review &amp; Testing </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Walter White</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            16:30 - 17:30
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                pm </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Sales Pitch Proposal </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Caleb Donaldson</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                            </div>
                                            <!--end::Day-->
                                            <!--begin::Day-->
                                            <div id="kt_schedule_day_8" class="tab-pane fade show " role="tabpanel">
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            10:00 - 11:00
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                am </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Committee Review Approvals </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Michael Walters</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            14:30 - 15:30
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                pm </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Sales Pitch Proposal </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Naomi Hayabusa</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            16:30 - 17:30
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                pm </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Dashboard UI/UX Design Review </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Karina Clarke</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                            </div>
                                            <!--end::Day-->
                                            <!--begin::Day-->
                                            <div id="kt_schedule_day_9" class="tab-pane fade show " role="tabpanel">
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            13:00 - 14:00
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                pm </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Dashboard UI/UX Design Review </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Walter White</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            14:30 - 15:30
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                pm </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Project Review &amp; Testing </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Kendell Trevor</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            12:00 - 13:00
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                pm </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Sales Pitch Proposal </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">David Stevenson</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            10:00 - 11:00
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                am </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Creative Content Initiative </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Mark Randall</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                            </div>
                                            <!--end::Day-->
                                            <!--begin::Day-->
                                            <div id="kt_schedule_day_10" class="tab-pane fade show " role="tabpanel">
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            9:00 - 10:00
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                am </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            9 Degree Project Estimation Meeting </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Yannis Gloverson</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            10:00 - 11:00
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                am </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Marketing Campaign Discussion </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Karina Clarke</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            12:00 - 13:00
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                pm </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            Development Team Capacity Review </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Bob Harris</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                                <!--begin::Time-->
                                                <div class="d-flex flex-stack position-relative mt-6">
                                                    <!--begin::Bar-->
                                                    <div
                                                        class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0">
                                                    </div>
                                                    <!--end::Bar-->

                                                    <!--begin::Info-->
                                                    <div class="fw-semibold ms-5">
                                                        <!--begin::Time-->
                                                        <div class="fs-7 mb-1">
                                                            12:00 - 13:00
                                                            <span class="fs-7 text-muted text-uppercase">
                                                                pm </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Title-->
                                                        <a href="#"
                                                            class="fs-5 fw-bold text-dark text-hover-primary mb-2">
                                                            9 Degree Project Estimation Meeting </a>
                                                        <!--end::Title-->

                                                        <!--begin::User-->
                                                        <div class="fs-7 text-muted">
                                                            Lead by <a href="#">Sean Bean</a>
                                                        </div>
                                                        <!--end::User-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <a href="#"
                                                        class="btn btn-light bnt-active-light-primary btn-sm">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Time-->
                                            </div>
                                            <!--end::Day-->
                                        </div>
                                        <!--end::Tab Content-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->


                            </div>
                            <!--end:::Tab pane-->
                            <!--begin:::Tab pane-->
                            <div class="tab-pane fade" id="kt_user_view_overview_events_and_logs_tab" role="tabpanel">
                                <!--begin::Tasks-->
                                <div class="card card-flush mb-6 mb-xl-9">
                                    <!--begin::Card header-->
                                    <div class="card-header mt-6">
                                        <!--begin::Card title-->
                                        <div class="card-title flex-column">
                                            <h2 class="mb-1">User's Tasks</h2>
                                        </div>
                                        <!--end::Card title-->

                                        <!--begin::Card toolbar-->
                                        <div class="card-toolbar">
                                            <button type="button" class="btn btn-light-primary btn-sm"
                                                data-bs-toggle="modal" data-bs-target="#kt_modal_add_task">
                                                <!--begin::Svg Icon | path: icons/duotune/files/fil005.svg-->
                                                <span class="svg-icon svg-icon-3"><svg width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3"
                                                            d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM16 13.5L12.5 13V10C12.5 9.4 12.6 9.5 12 9.5C11.4 9.5 11.5 9.4 11.5 10L11 13L8 13.5C7.4 13.5 7 13.4 7 14C7 14.6 7.4 14.5 8 14.5H11V18C11 18.6 11.4 19 12 19C12.6 19 12.5 18.6 12.5 18V14.5L16 14C16.6 14 17 14.6 17 14C17 13.4 16.6 13.5 16 13.5Z"
                                                            fill="currentColor"></path>
                                                        <rect x="11" y="19" width="10"
                                                            height="2" rx="1"
                                                            transform="rotate(-90 11 19)" fill="currentColor"></rect>
                                                        <rect x="7" y="13" width="10"
                                                            height="2" rx="1" fill="currentColor"></rect>
                                                        <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon--> Add Task
                                            </button>
                                        </div>
                                        <!--end::Card toolbar-->
                                    </div>
                                    <!--end::Card header-->

                                    <!--begin::Card body-->
                                    <div class="card-body d-flex flex-column">
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center position-relative mb-7">
                                            @if (isset($user_task))
                                                @foreach ($user_task as $item)
                                                    
                                                @endforeach
                                            @endif
                                            <!--begin::Label-->
                                            <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px">
                                            </div>
                                            <!--end::Label-->

                                            <!--begin::Details-->
                                            <div class="fw-semibold ms-5">
                                                <a class="fs-5 fw-bold text-dark text-hover-primary">Create FureStibe
                                                    branding logo</a>

                                                <!--begin::Info-->
                                                <div class="fs-7 text-muted">
                                                    Due in 1 day
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Tasks-->
                            </div>
                            <!--end:::Tab pane-->
                        </div>
                        <!--end:::Tab content-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Layout-->

                <!--begin::Modals-->
                <!--begin::Modal - Update user details-->
                <div class="modal fade" id="kt_modal_add_customer" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Form-->
                            <form class="form" action="@if(isset($user_data)){{ route('users.update',$user_data->id) }}@endif" method="POST" id="kt_modal_add_user_form" enctype="multipart/form-data">
                                @csrf
                                <!--begin::Modal header-->
                                @if (isset($user_data))
                                    @method('PUT')
                                @endif
                                <div class="modal-header" id="kt_modal_add_customer_header">
                                    <!--begin::Modal title-->
                                    <h2 class="fw-bold">Update User Details</h2>
                                    <!--end::Modal title-->
                                    <!--begin::Close-->
                                    <div id="kt_modal_add_customer_close" class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                        <span class="svg-icon svg-icon-1">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--end::Close-->
                                </div>
                                <!--end::Modal header-->
                                <!--begin::Modal body-->
                                <div class="modal-body py-10 px-lg-17">
                                    <!--begin::User form-->
                                    <div id="kt_modal_update_user_user_info" class="collapse show">
                                        <!--begin::Input group-->
                                        <div class="mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2">
                                                <span>Update Avatar</span>

                                                <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                    data-bs-toggle="tooltip"
                                                    aria-label="Allowed file types: png, jpg, jpeg."
                                                    data-bs-original-title="Allowed file types: png, jpg, jpeg."
                                                    data-kt-initialized="1"></i>
                                            </label>
                                            <!--end::Label-->

                                            <!--begin::Image input wrapper-->
                                            <div class="mt-1">

                                                <!--begin::Image placeholder-->
                                                <style>
                                                    .image-input-placeholder {
                                                        background-image: url('/assets/media/svg/avatars/blank.svg');
                                                    }

                                                    [data-theme="dark"] .image-input-placeholder {
                                                        background-image: url('/assets/media/svg/avatars/blank-dark.svg');
                                                    }
                                                </style>
                                                <!--end::Image placeholder-->
                                                <!--begin::Image input-->
                                                <div class="image-input image-input-outline image-input-placeholder"
                                                    data-kt-image-input="true">
                                                    <!--begin::Preview existing avatar-->
                                                    <div class="image-input-wrapper w-125px h-125px"
                                                        style="background-image: @if(!isset($user_data->profile_picture))url('{{ asset('/assets/media/svg/avatars/blank.svg') }}')@else url('{{ url($user_data->profile_picture) }}')@endif">
                                                    </div>
                                                    <!--end::Preview existing avatar-->

                                                    <!--begin::Edit-->
                                                    <label
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                        aria-label="Change picture"
                                                        data-bs-original-title="Change picture"
                                                        data-kt-initialized="1">
                                                        <i class="bi bi-pencil-fill fs-7"></i>

                                                        <!--begin::Inputs-->
                                                        <input type="file" name="image"
                                                            accept=".png, .jpg, .jpeg">
                                                        <input type="hidden" name="avatar_remove">
                                                        <!--end::Inputs-->
                                                    </label>
                                                    <!--end::Edit-->

                                                    <!--begin::Cancel-->
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                        aria-label="Cancel avatar"
                                                        data-bs-original-title="Cancel avatar"
                                                        data-kt-initialized="1">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <!--end::Cancel-->

                                                    <!--begin::Remove-->
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                        aria-label="Remove picture"
                                                        data-bs-original-title="Remove picture"
                                                        data-kt-initialized="1">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <!--end::Remove-->
                                                </div>
                                                <!--end::Image input-->
                                            </div>
                                            <!--end::Image input wrapper-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <span>{{ $message }}</span>
                                                </span>
                                            @enderror
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2">Name</label>
                                            <!--end::Label-->

                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Enter User name" name="name" value="{{ $user_data->name }}">
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2">
                                                <span>Email</span>

                                                <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                    data-bs-toggle="tooltip"
                                                    aria-label="Email address must be active"
                                                    data-bs-original-title="Email address must be active"
                                                    data-kt-initialized="1"></i>
                                            </label>
                                            <!--end::Label-->

                                            <!--begin::Input-->
                                            <input type="email" class="form-control form-control-solid"
                                                placeholder="Enter Email address" name="email" value="{{ $user_data->email }}">
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2">
                                                <span>Address</span>
                                            </label>
                                            <!--end::Label-->

                                            <!--begin::Input-->
                                            <textarea name="address" rows="3" placeholder="Enter user address" class="form-control form-control-solid">{{ $user_data->address }}</textarea>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2">
                                                <span>Contact Number</span>
                                            </label>
                                            <!--end::Label-->

                                            <!--begin::Input-->
                                            <input type="number" class="form-control form-control-solid"
                                                placeholder="Enter contact number address" name="contact_no" value="{{ $user_data->contact_no }}">
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <span>{{ $message }}</span>
                                            </span>
                                        @enderror
                                        <div class="d-flex flex-column mb-7 fv-row">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2">
                                                <span class="required">Role</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Country of origination"></i>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->

                                            <select name="role" aria-label="Select a Role" data-control="select2" data-placeholder="Select a Role..." data-dropdown-parent="#kt_modal_add_customer" class="form-select form-select-solid fw-bold">
                                                <option value="">Select a Role...</option>
                                                @if (isset($role_list))
                                                    @foreach ($role_list as $item)
                                                        @if ($user_data->role_id == $item['id'])
                                                            <option value="{{ $item['id'] }}" selected>{{ $item['name'] }}</option>
                                                        @else
                                                            <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </select>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Scroll-->
                                </div>
                                <!--end::Modal body-->
                                <!--begin::Modal footer-->
                                <div class="modal-footer flex-center">
                                    <!--begin::Button-->
                                    <button type="reset" id="kt_modal_add_customer_cancel" data-kt-users-modal-action="cancel" class="btn btn-light me-3">Discard</button>
                                    <!--end::Button-->
                                    <!--begin::Button-->
                                    <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">
                                        <span class="indicator-label">Submit</span>
                                        <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                    <!--end::Button-->
                                </div>
                                <!--end::Modal footer-->
                            </form>
                            <!--end::Form-->
                        </div>
                    </div>
                </div>
                <!--end::Modal - Update user details-->

                <!--begin::Modal - Add schedule-->
                <div class="modal fade" id="kt_modal_add_schedule" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bold">Add an Event</h2>
                                <!--end::Modal title-->

                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                    data-kt-users-modal-action="close">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                    <span class="svg-icon svg-icon-1"><svg width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16"
                                                height="2" rx="1" transform="rotate(-45 6 17.3137)"
                                                fill="currentColor"></rect>
                                            <rect x="7.41422" y="6" width="16" height="2"
                                                rx="1" transform="rotate(45 7.41422 6)" fill="currentColor">
                                            </rect>
                                        </svg>

                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--end::Modal header-->

                            <!--begin::Modal body-->
                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                <!--begin::Form-->
                                <form id="kt_modal_add_schedule_form"
                                    class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{ route('users.schedule',$user_data->id) }}" method="POST">
                                    @csrf
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold form-label mb-2">Event Name</label>
                                        <!--end::Label-->

                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid"
                                            name="event_name" value="">
                                        <!--end::Input-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mb-2">
                                            <span class="required">Date &amp; Time</span>

                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover"
                                                data-bs-trigger="hover" data-bs-html="true"
                                                data-bs-content="Select a date &amp; time." data-kt-initialized="1"></i>
                                        </label>
                                        <!--end::Label-->

                                        <!--begin::Input-->
                                        <input class="form-control form-control-solid flatpickr-input"
                                            placeholder="Pick date &amp; time" name="event_datetime"
                                            id="kt_modal_add_schedule_datepicker" type="text" readonly="readonly">
                                        <!--end::Input-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold form-label mb-2">Event Organiser</label>
                                        <!--end::Label-->

                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" name="event_org"
                                            value="">
                                        <!--end::Input-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <!--end::Input group-->
                                    <input type="hidden" name="all_user_list" class="all_user_list" value="{{ $user_data['user_list'] }}">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold form-label mb-2">Send Event Details
                                            To</label>
                                        <!--end::Label-->

                                        <!--begin::Input-->
                                       <input id="kt_modal_add_schedule_tagify" type="text"
                                            class="form-control form-control-solid" name="event_invitees"
                                            value="" tabindex="-1">
                                        <!--end::Input-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Actions-->
                                    <div class="text-center pt-15">
                                        <button type="reset" class="btn btn-light me-3"
                                            data-kt-users-modal-action="cancel">
                                            Discard
                                        </button>

                                        <button type="submit" class="btn btn-primary"
                                            >
                                            <span class="indicator-label">
                                                Submit
                                            </span>
                                            <span class="indicator-progress">
                                                Please wait... <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                            </span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Modal body-->
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal dialog-->
                </div>
                <!--end::Modal - Add schedule-->
                <!--begin::Modal - Add task-->
                <div class="modal fade" id="kt_modal_add_task" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bold">Add a Task</h2>
                                <!--end::Modal title-->

                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                    data-kt-users-modal-action="close">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                    <span class="svg-icon svg-icon-1"><svg width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16"
                                                height="2" rx="1" transform="rotate(-45 6 17.3137)"
                                                fill="currentColor"></rect>
                                            <rect x="7.41422" y="6" width="16" height="2"
                                                rx="1" transform="rotate(45 7.41422 6)" fill="currentColor">
                                            </rect>
                                        </svg>

                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--end::Modal header-->

                            <!--begin::Modal body-->
                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                <!--begin::Form-->
                                <form id="kt_modal_add_task_form"
                                    class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{ route('users.task_create',$user_data->id) }}" method="POST">
                                    @csrf
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold form-label mb-2">Task Name</label>
                                        <!--end::Label-->

                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" name="name"
                                            value="">
                                        <!--end::Input-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mb-2">
                                            <span class="required">Task Due Date</span>

                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover"
                                                data-bs-trigger="hover" data-bs-html="true"
                                                data-bs-content="Select a due date." data-kt-initialized="1"></i>
                                        </label>
                                        <!--end::Label-->

                                        <!--begin::Input-->
                                        <input class="form-control form-control-solid flatpickr-input"
                                            placeholder="Pick date" name="duedate"
                                            id="kt_modal_add_task_datepicker" type="text" readonly="readonly">
                                        <!--end::Input-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mb-2">Task Description</label>
                                        <!--end::Label-->

                                        <!--begin::Input-->
                                        <textarea class="form-control form-control-solid rounded-3" name="description"></textarea>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Actions-->
                                    <div class="text-center pt-15">
                                        <button type="reset" class="btn btn-light me-3"
                                            data-kt-users-modal-action="cancel">
                                            Discard
                                        </button>

                                        <button type="submit" class="btn btn-primary"
                                           >
                                            <span class="indicator-label">
                                                Submit
                                            </span>
                                            <span class="indicator-progress">
                                                Please wait... <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                            </span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Modal body-->
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal dialog-->
                </div>
                <!--end::Modal - Add task-->
                <!--begin::Modal - Update email-->
                <div class="modal fade" id="kt_modal_update_email" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bold">Update Email Address</h2>
                                <!--end::Modal title-->

                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                    data-kt-users-modal-action="close">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                    <span class="svg-icon svg-icon-1"><svg width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16"
                                                height="2" rx="1" transform="rotate(-45 6 17.3137)"
                                                fill="currentColor"></rect>
                                            <rect x="7.41422" y="6" width="16" height="2"
                                                rx="1" transform="rotate(45 7.41422 6)" fill="currentColor">
                                            </rect>
                                        </svg>

                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--end::Modal header-->

                            <!--begin::Modal body-->
                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                <!--begin::Form-->
                                <form id="kt_modal_update_email_form"
                                    class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                                    <!--begin::Notice-->

                                    <!--begin::Notice-->
                                    <div
                                        class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                                        <!--begin::Icon-->
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                                        <span class="svg-icon svg-icon-2tx svg-icon-primary me-4"><svg width="24"
                                                height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.3" x="2" y="2" width="20"
                                                    height="20" rx="10" fill="currentColor"></rect>
                                                <rect x="11" y="14" width="7" height="2"
                                                    rx="1" transform="rotate(-90 11 14)" fill="currentColor">
                                                </rect>
                                                <rect x="11" y="17" width="2" height="2"
                                                    rx="1" transform="rotate(-90 11 17)" fill="currentColor">
                                                </rect>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <!--end::Icon-->

                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-stack flex-grow-1 ">
                                            <!--begin::Content-->
                                            <div class=" fw-semibold">

                                                <div class="fs-6 text-gray-700 ">Please note that a valid email address is
                                                    required to complete the email verification.</div>
                                            </div>
                                            <!--end::Content-->

                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Notice-->
                                    <!--end::Notice-->

                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mb-2">
                                            <span class="required">Email Address</span>
                                        </label>
                                        <!--end::Label-->

                                        <!--begin::Input-->
                                        <input class="form-control form-control-solid" placeholder=""
                                            name="profile_email" value="smith@kpmg.com">
                                        <!--end::Input-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Actions-->
                                    <div class="text-center pt-15">
                                        <button type="reset" class="btn btn-light me-3"
                                            data-kt-users-modal-action="cancel">
                                            Discard
                                        </button>

                                        <button type="submit" class="btn btn-primary"
                                            data-kt-users-modal-action="submit">
                                            <span class="indicator-label">
                                                Submit
                                            </span>
                                            <span class="indicator-progress">
                                                Please wait... <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                            </span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Modal body-->
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal dialog-->
                </div>
                <!--end::Modal - Update email-->
                <!--begin::Modal - Update password-->
                <div class="modal fade" id="kt_modal_update_password" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bold">Update Password</h2>
                                <!--end::Modal title-->

                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                    data-kt-users-modal-action="close">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                    <span class="svg-icon svg-icon-1"><svg width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16"
                                                height="2" rx="1" transform="rotate(-45 6 17.3137)"
                                                fill="currentColor"></rect>
                                            <rect x="7.41422" y="6" width="16" height="2"
                                                rx="1" transform="rotate(45 7.41422 6)" fill="currentColor">
                                            </rect>
                                        </svg>

                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--end::Modal header-->

                            <!--begin::Modal body-->
                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                <!--begin::Form-->
                                <form id="kt_modal_update_password_form"
                                    class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">

                                    <!--begin::Input group--->
                                    <div class="fv-row mb-10 fv-plugins-icon-container">
                                        <label class="required form-label fs-6 mb-2">Current Password</label>

                                        <input class="form-control form-control-lg form-control-solid" type="password"
                                            placeholder="" name="current_password" autocomplete="off">
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <!--end::Input group--->

                                    <!--begin::Input group-->
                                    <div class="mb-10 fv-row fv-plugins-icon-container" data-kt-password-meter="true">
                                        <!--begin::Wrapper-->
                                        <div class="mb-1">
                                            <!--begin::Label-->
                                            <label class="form-label fw-semibold fs-6 mb-2">
                                                New Password
                                            </label>
                                            <!--end::Label-->

                                            <!--begin::Input wrapper-->
                                            <div class="position-relative mb-3">
                                                <input class="form-control form-control-lg form-control-solid"
                                                    type="password" placeholder="" name="new_password"
                                                    autocomplete="off">

                                                <span
                                                    class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                                    data-kt-password-meter-control="visibility">
                                                    <i class="bi bi-eye-slash fs-2"></i>

                                                    <i class="bi bi-eye fs-2 d-none"></i>
                                                </span>
                                            </div>
                                            <!--end::Input wrapper-->

                                            <!--begin::Meter-->
                                            <div class="d-flex align-items-center mb-3"
                                                data-kt-password-meter-control="highlight">
                                                <div
                                                    class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                                </div>
                                                <div
                                                    class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                                </div>
                                                <div
                                                    class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                                </div>
                                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px">
                                                </div>
                                            </div>
                                            <!--end::Meter-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Hint-->
                                        <div class="text-muted">
                                            Use 8 or more characters with a mix of letters, numbers &amp; symbols.
                                        </div>
                                        <!--end::Hint-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <!--end::Input group--->

                                    <!--begin::Input group--->
                                    <div class="fv-row mb-10 fv-plugins-icon-container">
                                        <label class="form-label fw-semibold fs-6 mb-2">Confirm New Password</label>

                                        <input class="form-control form-control-lg form-control-solid" type="password"
                                            placeholder="" name="confirm_password" autocomplete="off">
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <!--end::Input group--->

                                    <!--begin::Actions-->
                                    <div class="text-center pt-15">
                                        <button type="reset" class="btn btn-light me-3"
                                            data-kt-users-modal-action="cancel">
                                            Discard
                                        </button>

                                        <button type="submit" class="btn btn-primary"
                                            data-kt-users-modal-action="submit">
                                            <span class="indicator-label">
                                                Submit
                                            </span>
                                            <span class="indicator-progress">
                                                Please wait... <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                            </span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Modal body-->
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal dialog-->
                </div>
                <!--end::Modal - Update password-->
                <!--begin::Modal - Update role-->
                <div class="modal fade" id="kt_modal_update_role" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bold">Update User Role</h2>
                                <!--end::Modal title-->

                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                    data-kt-users-modal-action="close">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                    <span class="svg-icon svg-icon-1"><svg width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16"
                                                height="2" rx="1" transform="rotate(-45 6 17.3137)"
                                                fill="currentColor"></rect>
                                            <rect x="7.41422" y="6" width="16" height="2"
                                                rx="1" transform="rotate(45 7.41422 6)" fill="currentColor">
                                            </rect>
                                        </svg>

                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--end::Modal header-->

                            <!--begin::Modal body-->
                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                <!--begin::Form-->
                                <form id="kt_modal_update_role_form" class="form" action="#">
                                    <!--begin::Notice-->

                                    <!--begin::Notice-->
                                    <div
                                        class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                                        <!--begin::Icon-->
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                                        <span class="svg-icon svg-icon-2tx svg-icon-primary me-4"><svg width="24"
                                                height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.3" x="2" y="2" width="20"
                                                    height="20" rx="10" fill="currentColor"></rect>
                                                <rect x="11" y="14" width="7" height="2"
                                                    rx="1" transform="rotate(-90 11 14)" fill="currentColor">
                                                </rect>
                                                <rect x="11" y="17" width="2" height="2"
                                                    rx="1" transform="rotate(-90 11 17)" fill="currentColor">
                                                </rect>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <!--end::Icon-->

                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-stack flex-grow-1 ">
                                            <!--begin::Content-->
                                            <div class=" fw-semibold">

                                                <div class="fs-6 text-gray-700 ">Please note that reducing a user role
                                                    rank, that user will lose all priviledges that was assigned to the
                                                    previous role.</div>
                                            </div>
                                            <!--end::Content-->

                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Notice-->
                                    <!--end::Notice-->

                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mb-5">
                                            <span class="required">Select a user role</span>
                                        </label>
                                        <!--end::Label-->

                                        <!--begin::Input row-->
                                        <div class="d-flex">
                                            <!--begin::Radio-->
                                            <div class="form-check form-check-custom form-check-solid">
                                                <!--begin::Input-->
                                                <input class="form-check-input me-3" name="user_role" type="radio"
                                                    value="0" id="kt_modal_update_role_option_0"
                                                    checked="checked">
                                                <!--end::Input-->

                                                <!--begin::Label-->
                                                <label class="form-check-label" for="kt_modal_update_role_option_0">
                                                    <div class="fw-bold text-gray-800">Administrator</div>
                                                    <div class="text-gray-600">Best for business owners and company
                                                        administrators</div>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Radio-->
                                        </div>
                                        <!--end::Input row-->

                                        <div class="separator separator-dashed my-5"></div>
                                        <!--begin::Input row-->
                                        <div class="d-flex">
                                            <!--begin::Radio-->
                                            <div class="form-check form-check-custom form-check-solid">
                                                <!--begin::Input-->
                                                <input class="form-check-input me-3" name="user_role" type="radio"
                                                    value="1" id="kt_modal_update_role_option_1">
                                                <!--end::Input-->

                                                <!--begin::Label-->
                                                <label class="form-check-label" for="kt_modal_update_role_option_1">
                                                    <div class="fw-bold text-gray-800">Developer</div>
                                                    <div class="text-gray-600">Best for developers or people primarily
                                                        using the API</div>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Radio-->
                                        </div>
                                        <!--end::Input row-->

                                        <div class="separator separator-dashed my-5"></div>
                                        <!--begin::Input row-->
                                        <div class="d-flex">
                                            <!--begin::Radio-->
                                            <div class="form-check form-check-custom form-check-solid">
                                                <!--begin::Input-->
                                                <input class="form-check-input me-3" name="user_role" type="radio"
                                                    value="2" id="kt_modal_update_role_option_2">
                                                <!--end::Input-->

                                                <!--begin::Label-->
                                                <label class="form-check-label" for="kt_modal_update_role_option_2">
                                                    <div class="fw-bold text-gray-800">Analyst</div>
                                                    <div class="text-gray-600">Best for people who need full access to
                                                        analytics data, but don't need to update business settings</div>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Radio-->
                                        </div>
                                        <!--end::Input row-->

                                        <div class="separator separator-dashed my-5"></div>
                                        <!--begin::Input row-->
                                        <div class="d-flex">
                                            <!--begin::Radio-->
                                            <div class="form-check form-check-custom form-check-solid">
                                                <!--begin::Input-->
                                                <input class="form-check-input me-3" name="user_role" type="radio"
                                                    value="3" id="kt_modal_update_role_option_3">
                                                <!--end::Input-->

                                                <!--begin::Label-->
                                                <label class="form-check-label" for="kt_modal_update_role_option_3">
                                                    <div class="fw-bold text-gray-800">Support</div>
                                                    <div class="text-gray-600">Best for employees who regularly refund
                                                        payments and respond to disputes</div>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Radio-->
                                        </div>
                                        <!--end::Input row-->

                                        <div class="separator separator-dashed my-5"></div>
                                        <!--begin::Input row-->
                                        <div class="d-flex">
                                            <!--begin::Radio-->
                                            <div class="form-check form-check-custom form-check-solid">
                                                <!--begin::Input-->
                                                <input class="form-check-input me-3" name="user_role" type="radio"
                                                    value="4" id="kt_modal_update_role_option_4">
                                                <!--end::Input-->

                                                <!--begin::Label-->
                                                <label class="form-check-label" for="kt_modal_update_role_option_4">
                                                    <div class="fw-bold text-gray-800">Trial</div>
                                                    <div class="text-gray-600">Best for people who need to preview content
                                                        data, but don't need to make any updates</div>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Radio-->
                                        </div>
                                        <!--end::Input row-->

                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Actions-->
                                    <div class="text-center pt-15">
                                        <button type="reset" class="btn btn-light me-3"
                                            data-kt-users-modal-action="cancel">
                                            Discard
                                        </button>

                                        <button type="submit" class="btn btn-primary"
                                            data-kt-users-modal-action="submit">
                                            <span class="indicator-label">
                                                Submit
                                            </span>
                                            <span class="indicator-progress">
                                                Please wait... <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                            </span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Modal body-->
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal dialog-->
                </div>
                <!--end::Modal - Update role-->
                <!--begin::Modal - Add task-->
                <div class="modal fade" id="kt_modal_add_auth_app" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bold">Add Authenticator App</h2>
                                <!--end::Modal title-->

                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                    data-kt-users-modal-action="close">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                    <span class="svg-icon svg-icon-1"><svg width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16"
                                                height="2" rx="1" transform="rotate(-45 6 17.3137)"
                                                fill="currentColor"></rect>
                                            <rect x="7.41422" y="6" width="16" height="2"
                                                rx="1" transform="rotate(45 7.41422 6)" fill="currentColor">
                                            </rect>
                                        </svg>

                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--end::Modal header-->

                            <!--begin::Modal body-->
                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                <!--begin::Content-->
                                <div class="fw-bold d-flex flex-column justify-content-center mb-5">
                                    <!--begin::Label-->
                                    <div class="text-center mb-5" data-kt-add-auth-action="qr-code-label">
                                        Download the <a href="#">Authenticator app</a>, add a new account, then scan
                                        this barcode to set up your account.
                                    </div>
                                    <div class="text-center mb-5 d-none" data-kt-add-auth-action="text-code-label">
                                        Download the <a href="#">Authenticator app</a>, add a new account, then
                                        enter this code to set up your account.
                                    </div>
                                    <!--end::Label-->

                                    <!--begin::QR code-->
                                    <div class="d-flex flex-center" data-kt-add-auth-action="qr-code">
                                        <img src="{{ asset('/assets/media/misc/qr.png') }}" alt="Scan this QR code">
                                    </div>
                                    <!--end::QR code-->

                                    <!--begin::Text code-->
                                    <div class="border rounded p-5 d-flex flex-center d-none"
                                        data-kt-add-auth-action="text-code">
                                        <div class="fs-1">gi2kdnb54is709j</div>
                                    </div>
                                    <!--end::Text code-->
                                </div>
                                <!--end::Content-->

                                <!--begin::Action-->
                                <div class="d-flex flex-center">
                                    <div class="btn btn-light-primary" data-kt-add-auth-action="text-code-button">Enter
                                        code manually</div>
                                    <div class="btn btn-light-primary d-none" data-kt-add-auth-action="qr-code-button">
                                        Scan barcode instead</div>
                                </div>
                                <!--end::Action-->
                            </div>
                            <!--end::Modal body-->
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal dialog-->
                </div>
                <!--end::Modal - Add task-->
                <!--begin::Modal - Add task-->
                <div class="modal fade" id="kt_modal_add_one_time_password" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bold">Enable One Time Password</h2>
                                <!--end::Modal title-->

                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                    data-kt-users-modal-action="close">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                    <span class="svg-icon svg-icon-1"><svg width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16"
                                                height="2" rx="1" transform="rotate(-45 6 17.3137)"
                                                fill="currentColor"></rect>
                                            <rect x="7.41422" y="6" width="16" height="2"
                                                rx="1" transform="rotate(45 7.41422 6)" fill="currentColor">
                                            </rect>
                                        </svg>

                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--end::Modal header-->

                            <!--begin::Modal body-->
                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                <!--begin::Form-->
                                <form class="form fv-plugins-bootstrap5 fv-plugins-framework"
                                    id="kt_modal_add_one_time_password_form">
                                    <!--begin::Label-->
                                    <div class="fw-bold mb-9">
                                        Enter the new phone number to receive an SMS to when you log in.
                                    </div>
                                    <!--end::Label-->

                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mb-2">
                                            <span class="required">Mobile number</span>

                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                aria-label="A valid mobile number is required to receive the one-time password to validate your account login."
                                                data-bs-original-title="A valid mobile number is required to receive the one-time password to validate your account login."
                                                data-kt-initialized="1"></i>
                                        </label>
                                        <!--end::Label-->

                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid"
                                            name="otp_mobile_number" placeholder="+6123 456 789" value="">
                                        <!--end::Input-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Separator-->
                                    <div class="separator saperator-dashed my-5"></div>
                                    <!--end::Separator-->

                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mb-2">
                                            <span class="required">Email</span>
                                        </label>
                                        <!--end::Label-->

                                        <!--begin::Input-->
                                        <input type="email" class="form-control form-control-solid" name="otp_email"
                                            value="smith@kpmg.com" readonly="">
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mb-2">
                                            <span class="required">Confirm password</span>
                                        </label>
                                        <!--end::Label-->

                                        <!--begin::Input-->
                                        <input type="password" class="form-control form-control-solid"
                                            name="otp_confirm_password" value="">
                                        <!--end::Input-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Actions-->
                                    <div class="text-center pt-15">
                                        <button type="reset" class="btn btn-light me-3"
                                            data-kt-users-modal-action="cancel">
                                            Cancel
                                        </button>

                                        <button type="submit" class="btn btn-primary">
                                            <span class="indicator-label">
                                                Submit 1
                                            </span>
                                            <span class="indicator-progress">
                                                Please wait... <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                            </span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Modal body-->
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal dialog-->
                </div>
                <!--end::Modal - Add task-->
                <!--end::Modals-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
<!--end::Content wrapper-->
@endsection

@section('script_file')
    <script src="{{ asset('/assets/js/users/show_hide_modal.js') }}"></script>
    <script src="{{ asset('/assets/js/custom/apps/user-management/users/view/add-task.js') }}"></script>
    <script src="{{ asset('/assets/js/custom/apps/user-management/users/view/add-schedule.js') }}"></script>
@endsection