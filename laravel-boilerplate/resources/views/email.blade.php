@extends('layouts.header')

@section('title','email')

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
	<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
		<!--begin::Toolbar container-->
		<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
			<!--begin::Page title-->
			<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
				<!--begin::Title-->
				<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Send Mail</h1>
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
					<li class="breadcrumb-item text-muted">Inbox</li>
					<!--end::Item-->
				</ul>
				<!--end::Breadcrumb-->
			</div>
			<!--end::Page title-->
			<!--begin::Actions-->
			<div class="d-flex align-items-center gap-2 gap-lg-3">

			</div>
			<!--end::Actions-->
		</div>
		<!--end::Toolbar container-->
	</div>
	<!--end::Toolbar-->
	<!--begin::Content-->
	<div id="kt_app_content" class="app-content flex-column-fluid">
		<!--begin::Content container-->
		<div id="kt_app_content_container" class="app-container container-xxl">
			<!--begin::Inbox App - Compose -->
			<div class="d-flex flex-column flex-lg-row">
				<!--begin::Content-->
				<div class="flex-lg-row-fluid ms-lg-7 ms-xl-0">
					<!--begin::Card-->
					<div class="card">
						<div class="card-header align-items-center">
							<div class="card-title">
								<h2>Send Message</h2>
							</div>
						</div>
						<div class="card-body p-0">
							<!--begin::Form-->
							<form id="kt_inbox_compose_form" action="{{ route('storeFormData') }}" method="POST" enctype="multipart/form-data">
								@csrf
								<!--begin::Body-->
								<div class="d-block">
									<!--begin::To-->
									<div class="d-flex align-items-center border-bottom px-8 min-h-50px">
										<!--begin::Label-->
										<div class="text-dark fw-bold w-75px">To:</div>
										<!--end::Label-->
										<!--begin::Input-->
										<input type="text" class="form-control form-control-transparent border-0" name="compose_to" value="{{ old('compose_to') }}" data-kt-inbox-form="tagify" />
										<!--end::Input-->
										<!--begin::CC & BCC buttons-->
										<div class="ms-auto w-75px text-end">
											<span class="text-muted fs-bold cursor-pointer text-hover-primary me-2" data-kt-inbox-form="cc_button">Cc</span>
										</div>
										<!--end::CC & BCC buttons-->
									</div>
									<!--end::To-->
									<!--begin::CC-->
									<div class="d-none align-items-center border-bottom ps-8 pe-5 min-h-50px" data-kt-inbox-form="cc">
										<!--begin::Label-->
										<div class="text-dark fw-bold w-75px">Cc:</div>
										<!--end::Label-->
										<!--begin::Input-->
										<input type="text" class="form-control form-control-transparent border-0" name="compose_cc" value="{{ old('compose_cc') }}" data-kt-inbox-form="tagify" />
										<!--end::Input-->
										<!--begin::Close-->
										<span class="btn btn-clean btn-xs btn-icon" data-kt-inbox-form="cc_close">
											<i class="la la-close"></i>
										</span>
										<!--end::Close-->
									</div>
									<!--end::CC-->

									<!--begin::Subject-->
									<div class="border-bottom">
										<input class="form-control form-control-transparent border-0 px-8 min-h-45px" name="compose_subject" placeholder="Subject" value="{{ old('compose_subject') }}" />
									</div>
									<!--end::Subject-->
									<!--begin::Message-->
									<div id="kt_inbox_form_editor" class="bg-transparent border-0 h-350px px-3">{{ old('description') }}</div>
									<textarea name="description" id="kt_inbox_form_editor_input" class="form-control" hidden></textarea>
									<!--end::Message-->
									<!--begin::Attachments-->
									<div class="dropzone dropzone-queue px-8 py-4" id="kt_inbox_reply_attachments" data-kt-inbox-form="dropzone">
										<div class="dropzone-items">
											<div class="dropzone-item" style="display:none">
												<!--begin::Dropzone filename-->
												<div class="dropzone-file">
													<div class="dropzone-filename" title="some_image_file_name.jpg">
														<span data-dz-name="">some_image_file_name.jpg</span>
														<strong>(
														<span data-dz-size="">340kb</span>)</strong>
													</div>
													<div class="dropzone-error" data-dz-errormessage=""></div>
												</div>
												<!--end::Dropzone filename-->
												<!--begin::Dropzone progress-->
												<div class="dropzone-progress">
													<div class="progress">
														<div class="progress-bar bg-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" data-dz-uploadprogress=""></div>
													</div>
												</div>
												<!--end::Dropzone progress-->
												<!--begin::Dropzone toolbar-->
												<div class="dropzone-toolbar">
													<span class="dropzone-delete" data-dz-remove="">
														<i class="bi bi-x fs-1"></i>
													</span>
												</div>
												<!--end::Dropzone toolbar-->
											</div>
										</div>
									</div>
									<!--end::Attachments-->
								</div>
								<!--end::Body-->
								<!--begin::Footer-->
								<div class="d-flex flex-stack flex-wrap gap-2 py-5 ps-8 pe-5 border-top">
									<!--begin::Actions-->
									<div class="d-flex align-items-center me-3">
										<!--begin::Send-->
										<div class="btn-group me-4">
											<!--begin::Submit-->
											<button type="submit" class="btn btn-primary fs-bold px-6" id="send_form_data" data-kt-inbox-form="send">
												<span class="indicator-label">Send</span>
												<span class="indicator-progress">Please wait...
												<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
											</button>
											<!--end::Submit-->
										</div>
										<!--end::Send-->
										{{-- <!--begin::save-->
										<div class="btn-group me-4">
											<!--begin::Submit-->
											<button type="button" class="btn btn-success fs-bold px-6" id="save_form_data">
												<span class="indicator-label">Save</span>
											</button>
											<!--end::Submit-->
										</div>
										<!--end::save--> --}}
										<!--begin::Upload attachement-->
										<span class="btn btn-icon btn-sm btn-info btn-active-light-primary me-2" id="kt_inbox_reply_attachments_select" data-kt-inbox-form="dropzone_upload">
											<!--begin::Svg Icon | path: icons/duotune/communication/com008.svg-->
											<span class="svg-icon svg-icon-2 m-0">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path opacity="0.3" d="M4.425 20.525C2.525 18.625 2.525 15.525 4.425 13.525L14.825 3.125C16.325 1.625 18.825 1.625 20.425 3.125C20.825 3.525 20.825 4.12502 20.425 4.52502C20.025 4.92502 19.425 4.92502 19.025 4.52502C18.225 3.72502 17.025 3.72502 16.225 4.52502L5.82499 14.925C4.62499 16.125 4.62499 17.925 5.82499 19.125C7.02499 20.325 8.82501 20.325 10.025 19.125L18.425 10.725C18.825 10.325 19.425 10.325 19.825 10.725C20.225 11.125 20.225 11.725 19.825 12.125L11.425 20.525C9.525 22.425 6.425 22.425 4.425 20.525Z" fill="currentColor" />
													<path d="M9.32499 15.625C8.12499 14.425 8.12499 12.625 9.32499 11.425L14.225 6.52498C14.625 6.12498 15.225 6.12498 15.625 6.52498C16.025 6.92498 16.025 7.525 15.625 7.925L10.725 12.8249C10.325 13.2249 10.325 13.8249 10.725 14.2249C11.125 14.6249 11.725 14.6249 12.125 14.2249L19.125 7.22493C19.525 6.82493 19.725 6.425 19.725 5.925C19.725 5.325 19.525 4.825 19.125 4.425C18.725 4.025 18.725 3.42498 19.125 3.02498C19.525 2.62498 20.125 2.62498 20.525 3.02498C21.325 3.82498 21.725 4.825 21.725 5.925C21.725 6.925 21.325 7.82498 20.525 8.52498L13.525 15.525C12.325 16.725 10.525 16.725 9.32499 15.625Z" fill="currentColor" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
										<!--end::Upload attachement-->

									</div>
									<!--end::Actions-->
									<!--begin::Toolbar-->
									<div class="d-flex align-items-center">
										<!--begin::More actions-->
										<button type="button" class="btn btn-secondary me-2" id="cancel_mail_btn">Cancel</button>
										<!--end::More actions-->
									</div>
									<!--end::Toolbar-->
								</div>
								<!--end::Footer-->
							</form>
							<!--end::Form-->
						</div>
					</div>
					<!--end::Card-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Inbox App - Compose -->
		</div>
		<!--end::Content container-->
	</div>
	<!--end::Content-->
</div>
<!--end::Content wrapper-->
@endsection
@section('script_file')
	<script src="{{ asset('/assets/js/custom/apps/inbox/compose.js') }}"></script>
	<script>
		$("#save_form_data").click(function(){
			var html = $(".ql-editor").html();
			console.log(html);
			$("#kt_inbox_form_editor_input").text(html);
		})

		$("#send_form_data").click(function(){
			var html = $(".ql-editor").html();
			console.log(html);
			$("#kt_inbox_form_editor_input").text(html);
		})
	</script>
@endsection