<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head>
		<title>PetPah | Reset Senha</title>
		<meta charset="utf-8" />
		<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Blazor, Django, Flask &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="Metronic, Bootstrap, Bootstrap 5, Angular, VueJs, React, Asp.Net Core, Blazor, Django, Flask &amp; Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular, Asp.Net Core, Blazor, Django, Flask &amp; Laravel Admin Dashboard Theme" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Petpah! | Doações" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />

		
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body data-kt-name="metronic" id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Page bg image-->
			<style>body { background-image: url(' {{asset('media/auth/bg4.jpg') }}'); } [data-theme="dark"] body { background-image: url(' {{asset('media/auth/bg4-dark.jpg') }}'); }</style>
			<!--end::Page bg image-->
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-column-fluid flex-lg-row">
				<!--begin::Aside-->
				<div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
					<!--begin::Aside-->
					<div class="d-flex flex-column text-center">
						<!--begin::Logo-->
						<a href="/" class="mb-7">
							<img alt="Logo" src="{{ asset('media/logos/logo-medio-petpah.png') }}" />
						</a>
						<!--end::Logo-->
					</div>
					<!--begin::Aside-->
				</div>
				<!--begin::Aside-->
				<!--begin::Body-->
				<div class="d-flex flex-center w-lg-50 p-10">
					<!--begin::Card-->
					<div class="card rounded-3 w-md-550px">
						<!--begin::Card body-->
						<div class="card-body p-10 p-lg-20">
							<!--begin::Form-->
							<!--begin::Reset Password Form-->
							@if($errors->any())
								<div class="row">
									<div class="small-12 medium-12 columns">
										<div class="error-message">
											<p>Por favor, verifique os erros abaixo:</p>
											
											@foreach($errors->all() as $error)
												<div class="alert alert-danger" role="alert">
													{{ $error }}
												</div>
											@endforeach
											
										</div>
									</div>
								</div>
							@endif
                            <form method="POST" action="{{ route('password.update') }}" class="form w-100" novalidate="novalidate" id="kt_new_password_form">
                                @csrf

                                <!-- Password Reset Token -->
                                <input type="hidden" name="token" value="{{ $token }}">

                                <!--begin::Heading-->
                                <div class="text-center mb-10">
                                    <!--begin::Title-->
                                    <h1 class="text-dark mb-3">
                                        {{ __('Atualize sua senha') }}
                                    </h1>
                                    <!--end::Title-->

                                    <!--begin::Link-->
                                    <div class="text-gray-400 fw-bold fs-4">
                                        {{ __('Esta é uma área segura do aplicativo. Por favor, confirme sua senha antes de continuar.') }}
                                    </div>
                                    <!--end::Link-->
                                </div>
                                <!--begin::Heading-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <label class="form-label fw-bolder text-gray-900 fs-6">{{ __('Email') }}</label>
                                    <input class="form-control form-control-solid" type="email" name="email" autocomplete="off" value="{{ old('email', $request->email) }}" required/>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="mb-10 fv-row" data-kt-password-meter="true">
                                    <!--begin::Wrapper-->
                                    <div class="mb-1">
                                        <!--begin::Label-->
                                        <label class="form-label fw-bolder text-dark fs-6">
                                            {{ __('Password') }}
                                        </label>
                                        <!--end::Label-->

                                        <!--begin::Input wrapper-->
                                        <div class="position-relative mb-3">
                                            <input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="new-password"/>

                                            <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                                <i class="bi bi-eye-slash fs-2"></i>
                                                <i class="bi bi-eye fs-2 d-none"></i>
                                            </span>
                                        </div>
                                        <!--end::Input wrapper-->

                                        <!--begin::Meter-->
                                        <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                        </div>
                                        <!--end::Meter-->
                                    </div>
                                    <!--end::Wrapper-->

                                    <!--begin::Hint-->
                                    <div class="text-muted">
                                        {{ __('Use 8 ou mais caracteres com uma mistura de letras, números e símbolos.') }}
                                    </div>
                                    <!--end::Hint-->
                                </div>
                                <!--end::Input group--->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <label class="form-label fw-bolder text-gray-900 fs-6">{{ __('Confirme Password') }}</label>
                                    <input class="form-control form-control-solid" type="password" name="password_confirmation" autocomplete="off" required/>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Actions-->
                                <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                                    <button type="submit" id="kt_new_password_submit" class="btn btn-lg btn-primary fw-bolder me-4">
                                        {{-- @include('partials.general._button-indicator') --}}
                                        OK
                                    </button>

                                    <a href="{{ route('login') }}" class="btn btn-lg btn-light-primary fw-bolder">{{ __('Cancel') }}</a>
                                </div>
                                <!--end::Actions-->
                            </form>
                            <!--end::Reset Password Form-->
							<!--end::Form-->
						</div>
						<!--end::Card body-->
					</div>
					<!--end::Card-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Root-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('js/scripts.bundle.js') }}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Custom Javascript(used by this page)-->
		{{-- <script src="{{ asset('js/custom/authentication/sign-in/general.js') }}"></script> --}}
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>

<style>
	.btn_login{
		background-color: rgb(133,122,245)  !important;
		color: #ffffff !important;
    	border-radius: 40px !important;
		padding: 7px !important;
		border: none !important;
		font-weight: bold !important;
	}

	.btn_inscreva{
		background-color: rgb(133,122,245)  !important;
		color: #ffffff !important;
    	border-radius: 40px !important;
		padding: 7px !important;
		border: none !important;
		font-weight: bold !important;
	}

	.login_slogan{
		font-family: 'Elsie', cursive;;
		font-size: 25px;
	}

</style>


