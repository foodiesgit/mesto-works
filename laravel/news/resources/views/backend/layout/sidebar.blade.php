<!-- BEGIN Left Aside -->
<aside class="page-sidebar">
	<div class="page-logo">
		<a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
			<img src="{{asset('assets/img/logo.png')}}" alt="{{ env('APP_NAME') }}" aria-roledescription="logo">
			<span class="page-logo-text mr-1">{{ env('APP_NAME') }}</span>
			<span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
			<i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
		</a>
	</div>
	<!-- BEGIN PRIMARY NAVIGATION -->
	<nav id="js-primary-nav" class="primary-nav" role="navigation">
		<div class="nav-filter">
			<div class="position-relative">
				<input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control" tabindex="0">
				<a href="#" onclick="return false;" class="btn-primary btn-search-close js-waves-off" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
					<i class="fal fa-chevron-up"></i>
				</a>
			</div>
		</div>
		<div class="info-card">
			{{-- <img src="/upload/user/{{$onuser->profile_photo}}" class="profile-image rounded-circle" alt="{{$onuser->name}}"> --}}
			<img src="/upload/profile/profile.png" class="profile-image rounded-circle" alt="">
			<div class="info-card-text">
				<a href="#" class="d-flex align-items-center text-white">
					<span class="text-truncate text-truncate-sm d-inline-block">
						{{-- {{$onuser->name}} --}}
                        Mesto
					</span>
				</a>
			</div>
			{{-- <img src="{{asset('assets/img/profile.png')}}" class="cover" alt="cover"> --}}
			<a href="#" onclick="return false;" class="pull-trigger-btn" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar" data-focus="nav_filter_input">
                <i class="fal fa-angle-down"></i>
			</a>
		</div>
		<ul id="js-nav-menu" class="nav-menu">
			<li @if(Route::currentRouteName() == 'admin.get.index') class="active" @endif>
				<a href="{{route('admin.get.index')}}" title="Anasayfa">
					<i class="fal fa-info-circle"></i>
					<span class="nav-link-text">Anasayfa</span>
				</a>
			</li>

			<li>
                <a href="{{route('admin.get.news')}}" title="Haberler">
                    <i class="fal fa-newspaper"></i>
                    <span class="nav-link-text">Haberler</span>
                </a>
            </li>

			<li>
                <a href="{{route('admin.get.announcement')}}" title="Duyurular">
                    <i class="fal fa-bullhorn"></i>
                    <span class="nav-link-text">Duyurular</span>
                </a>
            </li>

			{{-- <li @if(in_array(Route::currentRouteName(), ['determination.index', 'determination.create', 'determination.edit'])) class="active" @endif>
				<a href="{{route('determination.index')}}" title="Anasayfa">
					<i class="fal fa-window"></i>
					<span class="nav-link-text">Tespit Formları</span>
				</a>
			</li>
			<li @if(in_array(Route::currentRouteName(), ['question.index', 'question.create', 'question.edit'])) class="active" @endif>
				<a href="{{route('question.index')}}" title="Anasayfa">
					<i class="fal fa-pencil"></i>
					<span class="nav-link-text">Sorular</span>
				</a>
			</li> --}}

			<li class="nav-title">YÖNETİM</li>

			{{-- <li @if(in_array(Route::currentRouteName(), ['user.index', 'user.create', 'user.edit'])) class="active" @endif>
			</li> --}}
            <li>
                <a href="{{route('admin.get.users')}}" title="Kullanıcılar">
                    <i class="fal fa-users"></i>
                    <span class="nav-link-text">Kullanıcılar</span>
                </a>
            </li>
			<li>
				<a href="{{route('admin.get.index')}}" title="Çıkış Yap">
					<i class="fal fa-portal-exit"></i>
					<span class="nav-link-text">Çıkış Yap</span>
				</a>
			</li>
		</ul>
		<div class="filter-message js-filter-message bg-success-600"></div>
	</nav>
	<!-- END PRIMARY NAVIGATION -->

</aside>
<!-- END Left Aside -->
