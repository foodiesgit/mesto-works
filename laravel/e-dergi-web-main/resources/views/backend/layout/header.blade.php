<!--begin::Header-->
<div id="kt_header" class="header header-fixed">
	<!--begin::Container-->
	<div class="container-fluid d-flex align-items-stretch justify-content-between">
		<!--begin::Header Menu Wrapper-->
		<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
			<!--begin::Header Menu-->
			<div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">

			</div>
			<!--end::Header Menu-->
		</div>
		<!--end::Header Menu Wrapper-->
		<!--begin::Topbar-->
		<div class="topbar">
			<div class="dropdown">
				<!--begin::User-->
				<div class="topbar-item">
					<div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">

						<div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
							<div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1 pulse pulse-primary">
								<span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{$onuser->name}}</span>
								<span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
									<span class="symbol-label font-size-h5 font-weight-bold">{{$onuser->name[0]}}</span>
								</span>
							</div>
						</div>
						<div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
							<!--begin::Nav-->
							<ul class="navi navi-hover py-4">
								<!--begin::Item-->
								<li class="navi-item">
									<a href="{{route('get.user.profile')}}" class="navi-link">
										<span class="navi-text">Profilim</span>
									</a>
								</li>
								<!--end::Item-->
								<hr>
								<!--begin::Item-->
								<li class="navi-item">
									<a href="{{route('admin.get.logout')}}" class="navi-link">
										<span class="navi-text">Çıkış Yap</span>
									</a>
								</li>
								<!--end::Item-->
							</ul>
						</div>


					</div>
				</div>
				<!--end::User-->
			</div>
		</div>
		<!--end::Topbar-->
	</div>
	<!--end::Container-->
</div>
<!--end::Header-->