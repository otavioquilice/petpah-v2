<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head>
		<title>PetPah</title>
		<meta charset="utf-8" />
		<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Blazor, Django, Flask &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="Metronic, Bootstrap, Bootstrap 5, Angular, VueJs, React, Asp.Net Core, Blazor, Django, Flask &amp; Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular, Asp.Net Core, Blazor, Django, Flask &amp; Laravel Admin Dashboard Theme" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body>

		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Page bg image-->
			<style>body { background-image: url('{{ asset('media/auth/bg4.jpg') }}'); } [data-theme="dark"] body { background-image: url('{{ asset('media/auth/bg4-dark.jpg') }}'); }</style>
			<!--end::Page bg image-->
			<!--begin::Authentication - Sign-up -->
			<div class="d-flex flex-column flex-column-fluid flex-lg-row">
				<!--begin::Aside-->
				<div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
					<!--begin::Aside-->
					<div class="d-flex flex-column">
						<!--begin::Logo-->
						<a href="/" class="mb-7">
							<img alt="Logo" src="{{ asset('media/logos/logo-medio-petpah.png') }}" />
						</a>
						<!--end::Logo-->
						<!--begin::Title-->
						<h2 class="text-white fw-normal m-0">Soluções de doações para PET</h2>
						<!--end::Title-->
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
							<form class="form w-100" method="POST" action="/create-register">
								@csrf

								<div class="text-center mb-11">
									<h1 class="text-dark fw-bolder mb-3">Entrar</h1>
									<!--<div class="text-gray-500 fw-semibold fs-6">Seu ambiente de doações</div>-->
								</div>

								<div class="row g-3 mb-9">
									<div class="col-md-6">
										<a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
										<img alt="Logo" src="{{ asset('media/svg/brand-logos/google-icon.svg') }}" class="h-15px me-3" />Entrar com Google</a>
									</div>
									<div class="col-md-6">
										<a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
										<img alt="Logo" src="{{ asset('media/svg/brand-logos/apple-black.svg') }}" class="theme-light-show h-15px me-3" />
										<img alt="Logo" src="{{ asset('media/svg/brand-logos/apple-black-dark.svg') }}" class="theme-dark-show h-15px me-3" />Entrar com Apple</a>
									</div>
								</div>

								<div class="separator separator-content my-14">
									<span class="w-125px text-gray-500 fw-semibold fs-7">Ou com email</span>
								</div>

								<div class="fv-row mb-8">
									<input type="text" placeholder="Nome" name="name" autocomplete="off" class="form-control bg-transparent" />
								</div>

								<div class="fv-row mb-8">
									<input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" />
								</div>

								<div class="fv-row mb-8" data-kt-password-meter="true">
									<div class="mb-1">
										<div class="position-relative mb-3">
											<input class="form-control bg-transparent" type="password" placeholder="Senha" name="password" autocomplete="off" />
											<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
												<i class="bi bi-eye-slash fs-2"></i>
												<i class="bi bi-eye fs-2 d-none"></i>
											</span>
										</div>
										<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
										</div>
									</div>
									<div class="text-muted">Use 8 ou mais caracteres com uma mistura de letras, números e &amp; símbolos.</div>
								</div>

								<div class="fv-row mb-8">
									{{-- <input placeholder="Repita a senha" name="confirm-password" type="password" autocomplete="off" class="form-control bg-transparent" /> --}}
								</div>

								<div class="fv-row mb-8">
									<label class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="toc" value="1" />
										<span class="form-check-label fw-semibold text-gray-700 fs-base ms-1">Eu aceito os
										<a href="#" class="ms-1 link-primary">Termos</a></span>
									</label>
								</div>

								<div class="d-grid mb-10">
									<button type="submit" class="btn btn-primary">Inscreva-se</button>
								</div>

								<div class="text-gray-500 text-center fw-semibold fs-6">Já tem uma conta?
									<a href="/login" class="link-primary fw-semibold">Entrar</a>
								</div>
								@if($errors->any())
									<div class="row">
										<div class="small-12 medium-12 columns">
											<div class="error-message">
												<p>Por favor, verifique os erros abaixo:</p>
												<ul>
													@foreach($errors->all() as $error)
														<li>{{ $error }}</li>
													@endforeach
												</ul>
											</div>
										</div>
									</div>
								@endif

							</form>
							<!--end::Form-->
						</div>
						<!--end::Card body-->
					</div>
					<!--end::Card-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Authentication - Sign-up-->
		</div>
		<!--end::Root-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('js/scripts.bundle.js') }}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Custom Javascript(used by this page)-->
		
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>