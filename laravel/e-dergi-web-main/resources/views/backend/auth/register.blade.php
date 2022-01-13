<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
<head>
	<meta charset="utf-8" />
	<title>Giriş Yap | {{ENV('APP_NAME')}}</title>
	<meta name="description" content="Login page example" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="canonical" href="https://keenthemes.com/metronic" />
	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Page Custom Styles(used by this page)-->
	<link href="/assets/css/pages/login/login-2.css?v=7.2.3" rel="stylesheet" type="text/css" />
	<!--end::Page Custom Styles-->
	<!--begin::Global Theme Styles(used by all pages)-->
	<link href="/assets/plugins/global/plugins.bundle.css?v=7.2.3" rel="stylesheet" type="text/css" />
	<link href="/assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.2.3" rel="stylesheet" type="text/css" />
	<link href="/assets/css/style.bundle.css?v=7.2.3" rel="stylesheet" type="text/css" />
	<!--end::Global Theme Styles-->
	<!--begin::Layout Themes(used by all pages)-->
	<link href="/assets/css/themes/layout/header/base/light.css?v=7.2.3" rel="stylesheet" type="text/css" />
	<link href="/assets/css/themes/layout/header/menu/light.css?v=7.2.3" rel="stylesheet" type="text/css" />
	<link href="/assets/css/themes/layout/brand/dark.css?v=7.2.3" rel="stylesheet" type="text/css" />
	<link href="/assets/css/themes/layout/aside/dark.css?v=7.2.3" rel="stylesheet" type="text/css" />
	<!--end::Layout Themes-->
	<link rel="shortcut icon" href="https://preview.keenthemes.c/assets/media/logos/favicon.ico" />
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

	<!--begin::Main-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Login-->
		<div class="login login-2 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
			<!--begin::Aside-->
			<div class="login-aside order-2 order-lg-1 d-flex flex-row-auto position-relative overflow-hidden">
				<!--begin: Aside Container-->
				<div class="d-flex flex-column-fluid flex-column justify-content-between py-9 px-7 py-lg-13 px-lg-35">
					<!--begin::Logo-->
					<a href="#" class="text-center pt-2">
						<img src="/logo.png" class="max-h-75px" alt="" />
					</a>
					<!--end::Logo-->
					<!--begin::Aside body-->
					<div class="d-flex flex-column-fluid flex-column flex-center">
					
						<!--begin::Signup-->
						<div class="login-form login-signin pt-11">
							<!--begin::Form-->
							<form class="form" novalidate="novalidate" id="kt_login_signup_form" action="{{route('admin.post.register')}}" method="POST">
								{{csrf_field()}}
								<!--begin::Title-->
								<div class="text-center pb-8">
									<h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Kayıt Ol</h2>
									<p class="text-muted font-weight-bold font-size-h4">Enter your details to create your account</p>
								</div>
								<!--end::Title-->
								@include('backend.layout.messages')
								<!--begin::Form group-->
								<div class="form-group">
									<input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('name') is-invalid @enderror" type="text" placeholder="Adınız Soyadınız" name="name" autocomplete="off" value="{{ old('name') }}" />
									@error('name')
									<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group">
									<input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('email') is-invalid @enderror" type="email" placeholder="Emailiniz" name="email" autocomplete="off" value="{{ old('email') }}" />
									@error('email')
									<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group">
									<input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('phone') is-invalid @enderror" type="text" placeholder="Telefon Numarası" name="phone" autocomplete="off" value="{{ old('phone') }}" />
									@error('phone')
									<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group">
									<input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('password') is-invalid @enderror" type="password" placeholder="Şifre" name="password" autocomplete="off" />
									@error('password')
									<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group">
									<label class="checkbox mb-0">
									<input type="checkbox" name="is_confirm_ca" required /><a href="#" data-toggle="modal" data-target="#modal-ca">Kullanım koşullarını </a> kabul ediyorum. <span></span></label>
									@error('is_confirm_ca')
									<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group d-flex flex-wrap flex-center pb-lg-0 pb-3">
									<button type="submit" id="kt_login_signup_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">Kayıt Ol</button>
									<a href="{{route('admin.get.login')}}" type="button" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">Giriş Yap</a>
								</div>
								<!--end::Form group-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Signup-->

						<!-- Modal-->
						<div class="modal fade" id="modal-ca" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Kullanım Koşulları</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<i aria-hidden="true" class="ki ki-close"></i>
										</button>
									</div>
									<div class="modal-body">
									</div>
								</div>
							</div>
						</div>

					</div>
					<!--end::Aside body-->
				</div>
				<!--end: Aside Container-->
			</div>
			<!--begin::Aside-->
			<!--begin::Content-->
			<div class="content order-1 order-lg-2 d-flex flex-column w-100 pb-0" style="background-color: #B1DCED;">
				<!--begin::Title-->
				<div class="d-flex flex-column justify-content-center text-center pt-lg-40 pt-md-5 pt-sm-5 px-lg-0 pt-5 px-7">
					<h3 class="display4 font-weight-bolder my-7 text-dark" style="color: #986923;">What is Lorem Ipsum?</h3>
					<p class="font-weight-bolder font-size-h2-md font-size-lg text-dark opacity-70">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
				</div>
				<!--end::Title-->
				<!--begin::Image-->
				<div class="content-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center" style="background-image: url(/assets/media/svg/illustrations/login-visual-2.svg);"></div>
				<!--end::Image-->
			</div>
			<!--end::Content-->
		</div>
		<!--end::Login-->
	</div>
	<!--end::Main-->
	<script>var HOST_URL = "{{ENV('APP_URL')}}";</script>
	<!--begin::Global Config(global config for global JS scripts)-->
	<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
	<!--end::Global Config-->
	<!--begin::Global Theme Bundle(used by all pages)-->
	<script src="/assets/plugins/global/plugins.bundle.js?v=7.2.3"></script>
	<script src="/assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.2.3"></script>
	<script src="/assets/js/scripts.bundle.js?v=7.2.3"></script>
	<!--end::Global Theme Bundle-->
	<!--begin::Page Scripts(used by this page)-->
	<script src="/assets/js/pages/custom/login/login-general.js?v=7.2.3"></script>
	<!--end::Page Scripts-->
</body>
<!--end::Body-->
</html>