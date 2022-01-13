<!-- BEGIN Page Header -->
<header class="page-header" role="banner">
	<!-- we need this logo when user switches to nav-function-top -->
	<div class="page-logo">
		<a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
			<img src="{{asset('assets/img/logo.png')}}" alt="{{ env('APP_NAME') }}" aria-roledescription="logo">
			<span class="page-logo-text mr-1">{{ env('APP_NAME') }}</span>
			<span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
			<i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
		</a>
	</div>
	<!-- DOC: nav menu layout change shortcut -->
	<div class="hidden-md-down dropdown-icon-menu position-relative">
		<a href="#" class="header-btn btn js-waves-off" data-action="toggle" data-class="nav-function-hidden" title="Hide Navigation">
			<i class="ni ni-menu"></i>
		</a>
		<ul>
			<li>
				<a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-minify" title="Minify Navigation">
					<i class="ni ni-minify-nav"></i>
				</a>
			</li>
			<li>
				<a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-fixed" title="Lock Navigation">
					<i class="ni ni-lock-nav"></i>
				</a>
			</li>
		</ul>
	</div>
	<!-- DOC: mobile button appears during mobile width -->
	<div class="hidden-lg-up">
		<a href="#" class="header-btn btn press-scale-down" data-action="toggle" data-class="mobile-nav-on">
			<i class="ni ni-menu"></i>
		</a>
	</div>
	<div class="search">
		<form class="app-forms hidden-xs-down" role="search" action="page_search.html" autocomplete="off">
			<input type="text" id="search-field" placeholder="Search for anything" class="form-control" tabindex="1">
			<a href="#" onclick="return false;" class="btn-danger btn-search-close js-waves-off d-none" data-action="toggle" data-class="mobile-search-on">
				<i class="fal fa-times"></i>
			</a>
		</form>
	</div>

	<div class="ml-auto d-flex">
		<!-- activate app search icon (mobile) -->
		<div class="hidden-sm-up">
			<a href="#" class="header-icon" data-action="toggle" data-class="mobile-search-on" data-focus="search-field" title="Search">
				<i class="fal fa-search"></i>
			</a>
		</div>
		<!-- app user menu -->
		<div>
			<a href="#" data-toggle="dropdown" title="drlantern@gotbootstrap.com" class="header-icon d-flex align-items-center justify-content-center ml-2">
				{{-- <img src="/upload/user/{{$onuser->profile_photo}}" class="profile-image rounded-circle" alt="{{$onuser->name}}"> --}}
			</a>
			<div class="dropdown-menu dropdown-menu-animated dropdown-lg">
				<div class="dropdown-header bg-trans-gradient d-flex flex-row py-4 rounded-top">
					<div class="d-flex flex-row align-items-center mt-1 mb-1 color-white">
						<span class="mr-2">
							{{-- <img src="/upload/user/{{$onuser->profile_photo}}" class="rounded-circle profile-image" alt="{{$onuser->name}}"> --}}
						</span>
						<div class="info-card-text">
							<div class="fs-lg text-truncate text-truncate-lg">Mesto</div>
							{{-- <div class="fs-lg text-truncate text-truncate-lg">{{$onuser->name}}</div> --}}
						</div>
					</div>
				</div>
				<div class="dropdown-divider m-0"></div>
					{{-- <a href="{{ route('get.user.profile') }}" class="dropdown-item">
						<span>Profilim</span>
					</a> --}}
				<div class="dropdown-divider m-0"></div>
				{{-- <a class="dropdown-item fw-500 pt-3 pb-3" href="{{route('admin.get.logout')}}">
					<span data-i18n="drpdwn.page-logout">Çıkış Yap</span>
				</a> --}}
			</div>
		</div>
	</div>
</header>
<!-- END Page Header -->
