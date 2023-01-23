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
                                        <div class="fw-bold mt-5">Last Login</div>
                                        <div class="text-gray-600">10 Nov 2023, 9:23 pm</div>
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
                                <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true"
                                    data-bs-toggle="tab" href="#kt_user_view_overview_security" data-kt-initialized="1"
                                    aria-selected="false" tabindex="-1" role="tab">Security</a>
                            </li>
                            <!--end:::Tab item-->

                            <!--begin:::Tab item-->
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                    href="#kt_user_view_overview_events_and_logs_tab" aria-selected="false"
                                    tabindex="-1" role="tab">Events &amp; Logs</a>
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

                                <!--begin::Tasks-->
                                <div class="card card-flush mb-6 mb-xl-9">
                                    <!--begin::Card header-->
                                    <div class="card-header mt-6">
                                        <!--begin::Card title-->
                                        <div class="card-title flex-column">
                                            <h2 class="mb-1">User's Tasks</h2>

                                            <div class="fs-6 fw-semibold text-muted">Total 25 tasks in backlog</div>
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
                                            <!--begin::Label-->
                                            <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px">
                                            </div>
                                            <!--end::Label-->

                                            <!--begin::Details-->
                                            <div class="fw-semibold ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bold text-dark text-hover-primary">Create FureStibe
                                                    branding logo</a>

                                                <!--begin::Info-->
                                                <div class="fs-7 text-muted">
                                                    Due in 1 day <a href="#">Karina Clark</a>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Details-->

                                            <!--begin::Menu-->
                                            <button type="button"
                                                class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">

                                                <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                                <span class="svg-icon svg-icon-3"><svg width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z"
                                                            fill="currentColor"></path>
                                                        <path opacity="0.3"
                                                            d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>

                                            <!--begin::Task menu-->
                                            <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px"
                                                data-kt-menu="true" data-kt-menu-id="kt-users-tasks">
                                                <!--begin::Header-->
                                                <div class="px-7 py-5">
                                                    <div class="fs-5 text-dark fw-bold">Update Status</div>
                                                </div>
                                                <!--end::Header-->

                                                <!--begin::Menu separator-->
                                                <div class="separator border-gray-200"></div>
                                                <!--end::Menu separator-->

                                                <!--begin::Form-->
                                                <form class="form px-7 py-5 fv-plugins-bootstrap5 fv-plugins-framework"
                                                    data-kt-menu-id="kt-users-tasks-form">
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-10 fv-plugins-icon-container">
                                                        <!--begin::Label-->
                                                        <label class="form-label fs-6 fw-semibold">Status:</label>
                                                        <!--end::Label-->

                                                        <!--begin::Input-->
                                                        <select
                                                            class="form-select form-select-solid select2-hidden-accessible"
                                                            name="task_status" data-kt-select2="true"
                                                            data-placeholder="Select option" data-allow-clear="true"
                                                            data-hide-search="true"
                                                            data-select2-id="select2-data-10-aupp" tabindex="-1"
                                                            aria-hidden="true" data-kt-initialized="1">
                                                            <option data-select2-id="select2-data-12-gu2l"></option>
                                                            <option value="1">Approved</option>
                                                            <option value="2">Pending</option>
                                                            <option value="3">In Process</option>
                                                            <option value="4">Rejected</option>
                                                        </select><span
                                                            class="select2 select2-container select2-container--bootstrap5"
                                                            dir="ltr" data-select2-id="select2-data-11-p8t2"
                                                            style="width: 100%;"><span class="selection"><span
                                                                    class="select2-selection select2-selection--single form-select form-select-solid"
                                                                    role="combobox" aria-haspopup="true"
                                                                    aria-expanded="false" tabindex="0"
                                                                    aria-disabled="false"
                                                                    aria-labelledby="select2-task_status-vi-container"
                                                                    aria-controls="select2-task_status-vi-container"><span
                                                                        class="select2-selection__rendered"
                                                                        id="select2-task_status-vi-container"
                                                                        role="textbox" aria-readonly="true"
                                                                        title="Select option"><span
                                                                            class="select2-selection__placeholder">Select
                                                                            option</span></span><span
                                                                        class="select2-selection__arrow"
                                                                        role="presentation"><b
                                                                            role="presentation"></b></span></span></span><span
                                                                class="dropdown-wrapper"
                                                                aria-hidden="true"></span></span>
                                                        <!--end::Input-->
                                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                                    </div>
                                                    <!--end::Input group-->

                                                    <!--begin::Actions-->
                                                    <div class="d-flex justify-content-end">
                                                        <button type="button"
                                                            class="btn btn-sm btn-light btn-active-light-primary me-2"
                                                            data-kt-users-update-task-status="reset">Reset</button>

                                                        <button type="submit" class="btn btn-sm btn-primary"
                                                            data-kt-users-update-task-status="submit">
                                                            <span class="indicator-label">
                                                                Apply
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
                                            <!--end::Task menu-->
                                            <!--end::Menu-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center position-relative mb-7">
                                            <!--begin::Label-->
                                            <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px">
                                            </div>
                                            <!--end::Label-->

                                            <!--begin::Details-->
                                            <div class="fw-semibold ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bold text-dark text-hover-primary">Schedule a meeting
                                                    with FireBear CTO John</a>

                                                <!--begin::Info-->
                                                <div class="fs-7 text-muted">
                                                    Due in 3 days <a href="#">Rober Doe</a>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Details-->

                                            <!--begin::Menu-->
                                            <button type="button"
                                                class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">

                                                <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                                <span class="svg-icon svg-icon-3"><svg width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z"
                                                            fill="currentColor"></path>
                                                        <path opacity="0.3"
                                                            d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>

                                            <!--begin::Task menu-->
                                            <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px"
                                                data-kt-menu="true" data-kt-menu-id="kt-users-tasks">
                                                <!--begin::Header-->
                                                <div class="px-7 py-5">
                                                    <div class="fs-5 text-dark fw-bold">Update Status</div>
                                                </div>
                                                <!--end::Header-->

                                                <!--begin::Menu separator-->
                                                <div class="separator border-gray-200"></div>
                                                <!--end::Menu separator-->

                                                <!--begin::Form-->
                                                <form class="form px-7 py-5 fv-plugins-bootstrap5 fv-plugins-framework"
                                                    data-kt-menu-id="kt-users-tasks-form">
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-10 fv-plugins-icon-container">
                                                        <!--begin::Label-->
                                                        <label class="form-label fs-6 fw-semibold">Status:</label>
                                                        <!--end::Label-->

                                                        <!--begin::Input-->
                                                        <select
                                                            class="form-select form-select-solid select2-hidden-accessible"
                                                            name="task_status" data-kt-select2="true"
                                                            data-placeholder="Select option" data-allow-clear="true"
                                                            data-hide-search="true"
                                                            data-select2-id="select2-data-13-3vh0" tabindex="-1"
                                                            aria-hidden="true" data-kt-initialized="1">
                                                            <option data-select2-id="select2-data-15-ywsi"></option>
                                                            <option value="1">Approved</option>
                                                            <option value="2">Pending</option>
                                                            <option value="3">In Process</option>
                                                            <option value="4">Rejected</option>
                                                        </select><span
                                                            class="select2 select2-container select2-container--bootstrap5"
                                                            dir="ltr" data-select2-id="select2-data-14-u5yt"
                                                            style="width: 100%;"><span class="selection"><span
                                                                    class="select2-selection select2-selection--single form-select form-select-solid"
                                                                    role="combobox" aria-haspopup="true"
                                                                    aria-expanded="false" tabindex="0"
                                                                    aria-disabled="false"
                                                                    aria-labelledby="select2-task_status-uy-container"
                                                                    aria-controls="select2-task_status-uy-container"><span
                                                                        class="select2-selection__rendered"
                                                                        id="select2-task_status-uy-container"
                                                                        role="textbox" aria-readonly="true"
                                                                        title="Select option"><span
                                                                            class="select2-selection__placeholder">Select
                                                                            option</span></span><span
                                                                        class="select2-selection__arrow"
                                                                        role="presentation"><b
                                                                            role="presentation"></b></span></span></span><span
                                                                class="dropdown-wrapper"
                                                                aria-hidden="true"></span></span>
                                                        <!--end::Input-->
                                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                                    </div>
                                                    <!--end::Input group-->

                                                    <!--begin::Actions-->
                                                    <div class="d-flex justify-content-end">
                                                        <button type="button"
                                                            class="btn btn-sm btn-light btn-active-light-primary me-2"
                                                            data-kt-users-update-task-status="reset">Reset</button>

                                                        <button type="submit" class="btn btn-sm btn-primary"
                                                            data-kt-users-update-task-status="submit">
                                                            <span class="indicator-label">
                                                                Apply
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
                                            <!--end::Task menu-->
                                            <!--end::Menu-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center position-relative mb-7">
                                            <!--begin::Label-->
                                            <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px">
                                            </div>
                                            <!--end::Label-->

                                            <!--begin::Details-->
                                            <div class="fw-semibold ms-5">
                                                <a href="#" class="fs-5 fw-bold text-dark text-hover-primary">9
                                                    Degree Project Estimation</a>

                                                <!--begin::Info-->
                                                <div class="fs-7 text-muted">
                                                    Due in 1 week <a href="#">Neil Owen</a>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Details-->

                                            <!--begin::Menu-->
                                            <button type="button"
                                                class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">

                                                <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                                <span class="svg-icon svg-icon-3"><svg width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z"
                                                            fill="currentColor"></path>
                                                        <path opacity="0.3"
                                                            d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>

                                            <!--begin::Task menu-->
                                            <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px"
                                                data-kt-menu="true" data-kt-menu-id="kt-users-tasks">
                                                <!--begin::Header-->
                                                <div class="px-7 py-5">
                                                    <div class="fs-5 text-dark fw-bold">Update Status</div>
                                                </div>
                                                <!--end::Header-->

                                                <!--begin::Menu separator-->
                                                <div class="separator border-gray-200"></div>
                                                <!--end::Menu separator-->

                                                <!--begin::Form-->
                                                <form class="form px-7 py-5 fv-plugins-bootstrap5 fv-plugins-framework"
                                                    data-kt-menu-id="kt-users-tasks-form">
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-10 fv-plugins-icon-container">
                                                        <!--begin::Label-->
                                                        <label class="form-label fs-6 fw-semibold">Status:</label>
                                                        <!--end::Label-->

                                                        <!--begin::Input-->
                                                        <select
                                                            class="form-select form-select-solid select2-hidden-accessible"
                                                            name="task_status" data-kt-select2="true"
                                                            data-placeholder="Select option" data-allow-clear="true"
                                                            data-hide-search="true"
                                                            data-select2-id="select2-data-16-uvcz" tabindex="-1"
                                                            aria-hidden="true" data-kt-initialized="1">
                                                            <option data-select2-id="select2-data-18-67gx"></option>
                                                            <option value="1">Approved</option>
                                                            <option value="2">Pending</option>
                                                            <option value="3">In Process</option>
                                                            <option value="4">Rejected</option>
                                                        </select><span
                                                            class="select2 select2-container select2-container--bootstrap5"
                                                            dir="ltr" data-select2-id="select2-data-17-kwtu"
                                                            style="width: 100%;"><span class="selection"><span
                                                                    class="select2-selection select2-selection--single form-select form-select-solid"
                                                                    role="combobox" aria-haspopup="true"
                                                                    aria-expanded="false" tabindex="0"
                                                                    aria-disabled="false"
                                                                    aria-labelledby="select2-task_status-1x-container"
                                                                    aria-controls="select2-task_status-1x-container"><span
                                                                        class="select2-selection__rendered"
                                                                        id="select2-task_status-1x-container"
                                                                        role="textbox" aria-readonly="true"
                                                                        title="Select option"><span
                                                                            class="select2-selection__placeholder">Select
                                                                            option</span></span><span
                                                                        class="select2-selection__arrow"
                                                                        role="presentation"><b
                                                                            role="presentation"></b></span></span></span><span
                                                                class="dropdown-wrapper"
                                                                aria-hidden="true"></span></span>
                                                        <!--end::Input-->
                                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                                    </div>
                                                    <!--end::Input group-->

                                                    <!--begin::Actions-->
                                                    <div class="d-flex justify-content-end">
                                                        <button type="button"
                                                            class="btn btn-sm btn-light btn-active-light-primary me-2"
                                                            data-kt-users-update-task-status="reset">Reset</button>

                                                        <button type="submit" class="btn btn-sm btn-primary"
                                                            data-kt-users-update-task-status="submit">
                                                            <span class="indicator-label">
                                                                Apply
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
                                            <!--end::Task menu-->
                                            <!--end::Menu-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center position-relative mb-7">
                                            <!--begin::Label-->
                                            <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px">
                                            </div>
                                            <!--end::Label-->

                                            <!--begin::Details-->
                                            <div class="fw-semibold ms-5">
                                                <a href="#"
                                                    class="fs-5 fw-bold text-dark text-hover-primary">Dashboard UI &amp;
                                                    UX for Leafr CRM</a>

                                                <!--begin::Info-->
                                                <div class="fs-7 text-muted">
                                                    Due in 1 week <a href="#">Olivia Wild</a>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Details-->

                                            <!--begin::Menu-->
                                            <button type="button"
                                                class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">

                                                <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                                <span class="svg-icon svg-icon-3"><svg width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z"
                                                            fill="currentColor"></path>
                                                        <path opacity="0.3"
                                                            d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>

                                            <!--begin::Task menu-->
                                            <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px"
                                                data-kt-menu="true" data-kt-menu-id="kt-users-tasks">
                                                <!--begin::Header-->
                                                <div class="px-7 py-5">
                                                    <div class="fs-5 text-dark fw-bold">Update Status</div>
                                                </div>
                                                <!--end::Header-->

                                                <!--begin::Menu separator-->
                                                <div class="separator border-gray-200"></div>
                                                <!--end::Menu separator-->

                                                <!--begin::Form-->
                                                <form class="form px-7 py-5 fv-plugins-bootstrap5 fv-plugins-framework"
                                                    data-kt-menu-id="kt-users-tasks-form">
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-10 fv-plugins-icon-container">
                                                        <!--begin::Label-->
                                                        <label class="form-label fs-6 fw-semibold">Status:</label>
                                                        <!--end::Label-->

                                                        <!--begin::Input-->
                                                        <select
                                                            class="form-select form-select-solid select2-hidden-accessible"
                                                            name="task_status" data-kt-select2="true"
                                                            data-placeholder="Select option" data-allow-clear="true"
                                                            data-hide-search="true"
                                                            data-select2-id="select2-data-19-qofd" tabindex="-1"
                                                            aria-hidden="true" data-kt-initialized="1">
                                                            <option data-select2-id="select2-data-21-ua8y"></option>
                                                            <option value="1">Approved</option>
                                                            <option value="2">Pending</option>
                                                            <option value="3">In Process</option>
                                                            <option value="4">Rejected</option>
                                                        </select><span
                                                            class="select2 select2-container select2-container--bootstrap5"
                                                            dir="ltr" data-select2-id="select2-data-20-rf1p"
                                                            style="width: 100%;"><span class="selection"><span
                                                                    class="select2-selection select2-selection--single form-select form-select-solid"
                                                                    role="combobox" aria-haspopup="true"
                                                                    aria-expanded="false" tabindex="0"
                                                                    aria-disabled="false"
                                                                    aria-labelledby="select2-task_status-uz-container"
                                                                    aria-controls="select2-task_status-uz-container"><span
                                                                        class="select2-selection__rendered"
                                                                        id="select2-task_status-uz-container"
                                                                        role="textbox" aria-readonly="true"
                                                                        title="Select option"><span
                                                                            class="select2-selection__placeholder">Select
                                                                            option</span></span><span
                                                                        class="select2-selection__arrow"
                                                                        role="presentation"><b
                                                                            role="presentation"></b></span></span></span><span
                                                                class="dropdown-wrapper"
                                                                aria-hidden="true"></span></span>
                                                        <!--end::Input-->
                                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                                    </div>
                                                    <!--end::Input group-->

                                                    <!--begin::Actions-->
                                                    <div class="d-flex justify-content-end">
                                                        <button type="button"
                                                            class="btn btn-sm btn-light btn-active-light-primary me-2"
                                                            data-kt-users-update-task-status="reset">Reset</button>

                                                        <button type="submit" class="btn btn-sm btn-primary"
                                                            data-kt-users-update-task-status="submit">
                                                            <span class="indicator-label">
                                                                Apply
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
                                            <!--end::Task menu-->
                                            <!--end::Menu-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center position-relative ">
                                            <!--begin::Label-->
                                            <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px">
                                            </div>
                                            <!--end::Label-->

                                            <!--begin::Details-->
                                            <div class="fw-semibold ms-5">
                                                <a href="#" class="fs-5 fw-bold text-dark text-hover-primary">Mivy
                                                    App R&amp;D, Meeting with clients</a>

                                                <!--begin::Info-->
                                                <div class="fs-7 text-muted">
                                                    Due in 2 weeks <a href="#">Sean Bean</a>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Details-->

                                            <!--begin::Menu-->
                                            <button type="button"
                                                class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">

                                                <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                                <span class="svg-icon svg-icon-3"><svg width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z"
                                                            fill="currentColor"></path>
                                                        <path opacity="0.3"
                                                            d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>

                                            <!--begin::Task menu-->
                                            <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px"
                                                data-kt-menu="true" data-kt-menu-id="kt-users-tasks">
                                                <!--begin::Header-->
                                                <div class="px-7 py-5">
                                                    <div class="fs-5 text-dark fw-bold">Update Status</div>
                                                </div>
                                                <!--end::Header-->

                                                <!--begin::Menu separator-->
                                                <div class="separator border-gray-200"></div>
                                                <!--end::Menu separator-->

                                                <!--begin::Form-->
                                                <form class="form px-7 py-5 fv-plugins-bootstrap5 fv-plugins-framework"
                                                    data-kt-menu-id="kt-users-tasks-form">
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-10 fv-plugins-icon-container">
                                                        <!--begin::Label-->
                                                        <label class="form-label fs-6 fw-semibold">Status:</label>
                                                        <!--end::Label-->

                                                        <!--begin::Input-->
                                                        <select
                                                            class="form-select form-select-solid select2-hidden-accessible"
                                                            name="task_status" data-kt-select2="true"
                                                            data-placeholder="Select option" data-allow-clear="true"
                                                            data-hide-search="true"
                                                            data-select2-id="select2-data-22-92qo" tabindex="-1"
                                                            aria-hidden="true" data-kt-initialized="1">
                                                            <option data-select2-id="select2-data-24-7a4k"></option>
                                                            <option value="1">Approved</option>
                                                            <option value="2">Pending</option>
                                                            <option value="3">In Process</option>
                                                            <option value="4">Rejected</option>
                                                        </select><span
                                                            class="select2 select2-container select2-container--bootstrap5"
                                                            dir="ltr" data-select2-id="select2-data-23-0pm3"
                                                            style="width: 100%;"><span class="selection"><span
                                                                    class="select2-selection select2-selection--single form-select form-select-solid"
                                                                    role="combobox" aria-haspopup="true"
                                                                    aria-expanded="false" tabindex="0"
                                                                    aria-disabled="false"
                                                                    aria-labelledby="select2-task_status-bn-container"
                                                                    aria-controls="select2-task_status-bn-container"><span
                                                                        class="select2-selection__rendered"
                                                                        id="select2-task_status-bn-container"
                                                                        role="textbox" aria-readonly="true"
                                                                        title="Select option"><span
                                                                            class="select2-selection__placeholder">Select
                                                                            option</span></span><span
                                                                        class="select2-selection__arrow"
                                                                        role="presentation"><b
                                                                            role="presentation"></b></span></span></span><span
                                                                class="dropdown-wrapper"
                                                                aria-hidden="true"></span></span>
                                                        <!--end::Input-->
                                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                                    </div>
                                                    <!--end::Input group-->

                                                    <!--begin::Actions-->
                                                    <div class="d-flex justify-content-end">
                                                        <button type="button"
                                                            class="btn btn-sm btn-light btn-active-light-primary me-2"
                                                            data-kt-users-update-task-status="reset">Reset</button>

                                                        <button type="submit" class="btn btn-sm btn-primary"
                                                            data-kt-users-update-task-status="submit">
                                                            <span class="indicator-label">
                                                                Apply
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
                                            <!--end::Task menu-->
                                            <!--end::Menu-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Tasks-->
                            </div>
                            <!--end:::Tab pane-->

                            <!--begin:::Tab pane-->
                            <div class="tab-pane fade" id="kt_user_view_overview_security" role="tabpanel">
                                <!--begin::Card-->
                                <div class="card pt-4 mb-6 mb-xl-9">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h2>Profile</h2>
                                        </div>
                                        <!--end::Card title-->
                                    </div>
                                    <!--end::Card header-->

                                    <!--begin::Card body-->
                                    <div class="card-body pt-0 pb-5">
                                        <!--begin::Table wrapper-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table align-middle table-row-dashed gy-5"
                                                id="kt_table_users_login_session">
                                                <!--begin::Table body-->
                                                <tbody class="fs-6 fw-semibold text-gray-600">
                                                    <tr>
                                                        <td>Email</td>
                                                        <td>smith@kpmg.com</td>
                                                        <td class="text-end">
                                                            <button type="button"
                                                                class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#kt_modal_update_email">
                                                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                                <span class="svg-icon svg-icon-3"><svg width="24"
                                                                        height="24" viewBox="0 0 24 24"
                                                                        fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path opacity="0.3"
                                                                            d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                                            fill="currentColor"></path>
                                                                        <path
                                                                            d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                                            fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Password</td>
                                                        <td>******</td>
                                                        <td class="text-end">
                                                            <button type="button"
                                                                class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#kt_modal_update_password">
                                                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                                <span class="svg-icon svg-icon-3"><svg width="24"
                                                                        height="24" viewBox="0 0 24 24"
                                                                        fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path opacity="0.3"
                                                                            d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                                            fill="currentColor"></path>
                                                                        <path
                                                                            d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                                            fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Role</td>
                                                        <td>Administrator</td>
                                                        <td class="text-end">
                                                            <button type="button"
                                                                class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#kt_modal_update_role">
                                                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                                <span class="svg-icon svg-icon-3"><svg width="24"
                                                                        height="24" viewBox="0 0 24 24"
                                                                        fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path opacity="0.3"
                                                                            d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                                            fill="currentColor"></path>
                                                                        <path
                                                                            d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                                            fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Table wrapper-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <!--end:::Tab pane-->

                            <!--begin:::Tab pane-->
                            <div class="tab-pane fade" id="kt_user_view_overview_events_and_logs_tab" role="tabpanel">
                                <!--begin::Card-->
                                <div class="card pt-4 mb-6 mb-xl-9">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h2>Login Sessions</h2>
                                        </div>
                                        <!--end::Card title-->

                                        <!--begin::Card toolbar-->
                                        <div class="card-toolbar">
                                            <!--begin::Filter-->
                                            <button type="button" class="btn btn-sm btn-flex btn-light-primary"
                                                id="kt_modal_sign_out_sesions">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr077.svg-->
                                                <span class="svg-icon svg-icon-3"><svg width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.3" x="4" y="11"
                                                            width="12" height="2" rx="1"
                                                            fill="currentColor"></rect>
                                                        <path
                                                            d="M5.86875 11.6927L7.62435 10.2297C8.09457 9.83785 8.12683 9.12683 7.69401 8.69401C7.3043 8.3043 6.67836 8.28591 6.26643 8.65206L3.34084 11.2526C2.89332 11.6504 2.89332 12.3496 3.34084 12.7474L6.26643 15.3479C6.67836 15.7141 7.3043 15.6957 7.69401 15.306C8.12683 14.8732 8.09458 14.1621 7.62435 13.7703L5.86875 12.3073C5.67684 12.1474 5.67684 11.8526 5.86875 11.6927Z"
                                                            fill="currentColor"></path>
                                                        <path
                                                            d="M8 5V6C8 6.55228 8.44772 7 9 7C9.55228 7 10 6.55228 10 6C10 5.44772 10.4477 5 11 5H18C18.5523 5 19 5.44772 19 6V18C19 18.5523 18.5523 19 18 19H11C10.4477 19 10 18.5523 10 18C10 17.4477 9.55228 17 9 17C8.44772 17 8 17.4477 8 18V19C8 20.1046 8.89543 21 10 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3H10C8.89543 3 8 3.89543 8 5Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon--> Sign out all sessions
                                            </button>
                                            <!--end::Filter-->
                                        </div>
                                        <!--end::Card toolbar-->
                                    </div>
                                    <!--end::Card header-->

                                    <!--begin::Card body-->
                                    <div class="card-body pt-0 pb-5">
                                        <!--begin::Table wrapper-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table align-middle table-row-dashed gy-5"
                                                id="kt_table_users_login_session">
                                                <!--begin::Table head-->
                                                <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                                                    <!--begin::Table row-->
                                                    <tr class="text-start text-muted text-uppercase gs-0">
                                                        <th class="min-w-100px">Location</th>
                                                        <th>Device</th>
                                                        <th>IP Address</th>
                                                        <th class="min-w-125px">Time</th>
                                                        <th class="min-w-70px">Actions</th>
                                                    </tr>
                                                    <!--end::Table row-->
                                                </thead>
                                                <!--end::Table head-->

                                                <!--begin::Table body-->
                                                <tbody class="fs-6 fw-semibold text-gray-600">
                                                    <tr>
                                                        <!--begin::Invoice--->
                                                        <td>
                                                            Australia </td>
                                                        <!--end::Invoice--->

                                                        <!--begin::Status--->
                                                        <td>
                                                            Chome - Windows </td>
                                                        <!--end::Status--->

                                                        <!--begin::Amount--->
                                                        <td>
                                                            207.30.44.28 </td>
                                                        <!--end::Amount--->

                                                        <!--begin::Date--->
                                                        <td>
                                                            23 seconds ago </td>
                                                        <!--end::Date--->

                                                        <!--begin::Action--->
                                                        <td>
                                                            Current session </td>
                                                        <!--end::Action--->
                                                    </tr>
                                                    <tr>
                                                        <!--begin::Invoice--->
                                                        <td>
                                                            Australia </td>
                                                        <!--end::Invoice--->

                                                        <!--begin::Status--->
                                                        <td>
                                                            Safari - iOS </td>
                                                        <!--end::Status--->

                                                        <!--begin::Amount--->
                                                        <td>
                                                            207.44.43.229 </td>
                                                        <!--end::Amount--->

                                                        <!--begin::Date--->
                                                        <td>
                                                            3 days ago </td>
                                                        <!--end::Date--->

                                                        <!--begin::Action--->
                                                        <td>
                                                            <a href="#" data-kt-users-sign-out="single_user">Sign
                                                                out</a>
                                                        </td>
                                                        <!--end::Action--->
                                                    </tr>
                                                    <tr>
                                                        <!--begin::Invoice--->
                                                        <td>
                                                            Australia </td>
                                                        <!--end::Invoice--->

                                                        <!--begin::Status--->
                                                        <td>
                                                            Chrome - Windows </td>
                                                        <!--end::Status--->

                                                        <!--begin::Amount--->
                                                        <td>
                                                            207.47.41.60 </td>
                                                        <!--end::Amount--->

                                                        <!--begin::Date--->
                                                        <td>
                                                            last week </td>
                                                        <!--end::Date--->

                                                        <!--begin::Action--->
                                                        <td>
                                                            Expired </td>
                                                        <!--end::Action--->
                                                    </tr>
                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Table wrapper-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->

                                <!--begin::Card-->
                                <div class="card pt-4 mb-6 mb-xl-9">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h2>Logs</h2>
                                        </div>
                                        <!--end::Card title-->

                                        <!--begin::Card toolbar-->
                                        <div class="card-toolbar">
                                            <!--begin::Button-->
                                            <button type="button" class="btn btn-sm btn-light-primary">
                                                <!--begin::Svg Icon | path: icons/duotune/files/fil021.svg-->
                                                <span class="svg-icon svg-icon-3"><svg width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3"
                                                            d="M19 15C20.7 15 22 13.7 22 12C22 10.3 20.7 9 19 9C18.9 9 18.9 9 18.8 9C18.9 8.7 19 8.3 19 8C19 6.3 17.7 5 16 5C15.4 5 14.8 5.2 14.3 5.5C13.4 4 11.8 3 10 3C7.2 3 5 5.2 5 8C5 8.3 5 8.7 5.1 9H5C3.3 9 2 10.3 2 12C2 13.7 3.3 15 5 15H19Z"
                                                            fill="currentColor"></path>
                                                        <path
                                                            d="M13 17.4V12C13 11.4 12.6 11 12 11C11.4 11 11 11.4 11 12V17.4H13Z"
                                                            fill="currentColor"></path>
                                                        <path opacity="0.3"
                                                            d="M8 17.4H16L12.7 20.7C12.3 21.1 11.7 21.1 11.3 20.7L8 17.4Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                Download Report
                                            </button>
                                            <!--end::Button-->
                                        </div>
                                        <!--end::Card toolbar-->
                                    </div>
                                    <!--end::Card header-->

                                    <!--begin::Card body-->
                                    <div class="card-body py-0">
                                        <!--begin::Table wrapper-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table
                                                class="table align-middle table-row-dashed fw-semibold text-gray-600 fs-6 gy-5"
                                                id="kt_table_users_logs">
                                                <!--begin::Table body-->
                                                <tbody>
                                                    <!--begin::Table row-->
                                                    <tr>
                                                        <!--begin::Badge--->
                                                        <td class="min-w-70px">
                                                            <div class="badge badge-light-success">200 OK</div>
                                                        </td>
                                                        <!--end::Badge--->

                                                        <!--begin::Status--->
                                                        <td>
                                                            POST /v1/invoices/in_5200_7752/payment </td>
                                                        <!--end::Status--->

                                                        <!--begin::Timestamp--->
                                                        <td class="pe-0 text-end min-w-200px">
                                                            19 Aug 2023, 9:23 pm </td>
                                                        <!--end::Timestamp--->
                                                    </tr>
                                                    <!--end::Table row-->
                                                    <!--begin::Table row-->
                                                    <tr>
                                                        <!--begin::Badge--->
                                                        <td class="min-w-70px">
                                                            <div class="badge badge-light-success">200 OK</div>
                                                        </td>
                                                        <!--end::Badge--->

                                                        <!--begin::Status--->
                                                        <td>
                                                            POST /v1/invoices/in_8114_6430/payment </td>
                                                        <!--end::Status--->

                                                        <!--begin::Timestamp--->
                                                        <td class="pe-0 text-end min-w-200px">
                                                            21 Feb 2023, 6:05 pm </td>
                                                        <!--end::Timestamp--->
                                                    </tr>
                                                    <!--end::Table row-->
                                                    <!--begin::Table row-->
                                                    <tr>
                                                        <!--begin::Badge--->
                                                        <td class="min-w-70px">
                                                            <div class="badge badge-light-success">200 OK</div>
                                                        </td>
                                                        <!--end::Badge--->

                                                        <!--begin::Status--->
                                                        <td>
                                                            POST /v1/invoices/in_8114_6430/payment </td>
                                                        <!--end::Status--->

                                                        <!--begin::Timestamp--->
                                                        <td class="pe-0 text-end min-w-200px">
                                                            10 Nov 2023, 11:05 am </td>
                                                        <!--end::Timestamp--->
                                                    </tr>
                                                    <!--end::Table row-->
                                                    <!--begin::Table row-->
                                                    <tr>
                                                        <!--begin::Badge--->
                                                        <td class="min-w-70px">
                                                            <div class="badge badge-light-danger">500 ERR</div>
                                                        </td>
                                                        <!--end::Badge--->

                                                        <!--begin::Status--->
                                                        <td>
                                                            POST /v1/invoice/in_8686_9789/invalid </td>
                                                        <!--end::Status--->

                                                        <!--begin::Timestamp--->
                                                        <td class="pe-0 text-end min-w-200px">
                                                            19 Aug 2023, 9:23 pm </td>
                                                        <!--end::Timestamp--->
                                                    </tr>
                                                    <!--end::Table row-->
                                                    <!--begin::Table row-->
                                                    <tr>
                                                        <!--begin::Badge--->
                                                        <td class="min-w-70px">
                                                            <div class="badge badge-light-success">200 OK</div>
                                                        </td>
                                                        <!--end::Badge--->

                                                        <!--begin::Status--->
                                                        <td>
                                                            POST /v1/invoices/in_2557_1418/payment </td>
                                                        <!--end::Status--->

                                                        <!--begin::Timestamp--->
                                                        <td class="pe-0 text-end min-w-200px">
                                                            22 Sep 2023, 11:30 am </td>
                                                        <!--end::Timestamp--->
                                                    </tr>
                                                    <!--end::Table row-->
                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Table wrapper-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->

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
                                    class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
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

                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold form-label mb-2">Send Event Details
                                            To</label>
                                        <!--end::Label-->

                                        <!--begin::Input-->
                                        <tags class="tagify  form-control form-control-solid" tabindex="-1">
                                            <tag title="smith@kpmg.com" contenteditable="false" spellcheck="false"
                                                tabindex="-1" class="tagify__tag tagify--noAnim"
                                                value="smith@kpmg.com">
                                                <x title="" class="tagify__tag__removeBtn" role="button"
                                                    aria-label="remove tag"></x>
                                                <div><span class="tagify__tag-text">smith@kpmg.com</span></div>
                                            </tag>
                                            <tag title="melody@altbox.com" contenteditable="false" spellcheck="false"
                                                tabindex="-1" class="tagify__tag tagify--noAnim"
                                                value="melody@altbox.com">
                                                <x title="" class="tagify__tag__removeBtn" role="button"
                                                    aria-label="remove tag"></x>
                                                <div><span class="tagify__tag-text">melody@altbox.com</span></div>
                                            </tag><span contenteditable="" tabindex="0" data-placeholder="​"
                                                aria-placeholder="" class="tagify__input" role="textbox"
                                                aria-autocomplete="both" aria-multiline="false"></span>
                                            ​
                                        </tags><input id="kt_modal_add_schedule_tagify" type="text"
                                            class="form-control form-control-solid" name="event_invitees"
                                            value="smith@kpmg.com, melody@altbox.com" tabindex="-1">
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
                                    class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold form-label mb-2">Task Name</label>
                                        <!--end::Label-->

                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" name="task_name"
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
                                            placeholder="Pick date" name="task_duedate"
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
                                        <textarea class="form-control form-control-solid rounded-3"></textarea>
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
@endsection