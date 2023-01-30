@extends('layouts.setting_menu')

@section('title','User Details')

@section('setting_content')
    <!--begin::details View-->
    <script>
        toastr.options.timeOut = 4000;
        @if (Session::has('error'))
            toastr.error('{{ Session::get('error') }}');
        @endif
    </script>
    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
        <!--begin::Card header-->
        <div class="card-header cursor-pointer">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Profile Details</h3>
            </div>
            <!--end::Card title-->
            <!--begin::Action-->
            <a href="" class="btn btn-sm btn-primary align-self-center" data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer">Edit Profile</a>
            <!--end::Action-->
        </div>
        <!--begin::Card header-->
        <!--begin::Card body-->
        <div class="card-body p-9">
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">Full Name</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bold fs-6 text-gray-800">{{ auth()->user()->name }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Input group-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">Address</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <span class="fw-bold text-gray-800 fs-6">{{ auth()->user()->address }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">Contact Phone
                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i></label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 d-flex align-items-center">
                    <span class="fw-bold fs-6 text-gray-800 me-2">{{ auth()->user()->contact_no }}</span>

                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::details View-->
    <!--begin::Login sessions-->
    <div class="card mb-5 mb-lg-10">
        <!--begin::Card header-->
        <div class="card-header">
            <!--begin::Heading-->
            <div class="card-title">
                <h3>Login Sessions</h3>
            </div>
            <!--end::Heading-->
           <!--begin::Card title-->
           <div class="card-title">
            <!--begin::Search-->
            <div class="d-flex align-items-center position-relative my-1">
                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Login session" />
            </div>
            <!--end::Search-->
        </div>
        <!--begin::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table wrapper-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9" id="login_sessions_data_table">
                    <!--begin::Thead-->
                    <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                        <tr>
                            <th class="min-w-250px">Location</th>
                            <th class="min-w-150px">Device</th>
                            <th class="min-w-150px">IP Address</th>
                            <th class="min-w-150px">Time</th>
                        </tr>
                    </thead>
                    <!--end::Thead-->

                </table>
                <!--end::Table-->
            </div>
            <!--end::Table wrapper-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Login sessions-->
     <!--begin::Modal - Update user details-->
     <div class="modal fade" id="kt_modal_add_customer" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Form-->
                <form class="form" action="{{ route('user_auth.update',auth()->user()->id) }}" method="POST" id="kt_modal_add_user_form" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Modal header-->

                    @method('PUT')

                    <div class="modal-header" id="kt_modal_add_customer_header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bold">Update Profile</h2>
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
                                            style="background-image: @if(!isset(auth()->user()->profile_picture))url('{{ asset('/assets/media/svg/avatars/blank.svg') }}')@else url('{{ url(auth()->user()->profile_picture) }}')@endif">
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
                                    placeholder="Enter User name" name="name" value="{{ auth()->user()->name }}">
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
                                    placeholder="Enter Email address" name="email" value="{{ auth()->user()->email }}">
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
                                <textarea name="address" rows="3" placeholder="Enter user address" class="form-control form-control-solid">{{ auth()->user()->address }}</textarea>
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
                                    placeholder="Enter contact number address" name="contact_no" value="{{ auth()->user()->contact_no }}">
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
                                            @if (auth()->user()->role_id == $item['id'])
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
@endsection
@section('script_file')
    <script src="{{ asset('/assets/js/users/show_hide_modal.js') }}"></script>
    <script src="{{ asset('/assets/js/users/auth_login.js') }}"></script>
@endsection