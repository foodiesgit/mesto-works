@extends('backend.layout.master')

@section('title', 'Kullanıcılar')

@section('breadcrumb')
<ol class="breadcrumb page-breadcrumb">
	<li class="breadcrumb-item"><a href="javascript:void(0);">Anasayfa</a></li>
	<li class="breadcrumb-item">Kullanıcılar</li>
	<li class="position-absolute pos-top pos-right d-none d-sm-block" id="js-date"></li>
</ol>
<div class="subheader">
	<h1 class="subheader-title">
		<i class='fal fa-info-circle'></i> Kullanıcılar Sayfası
	</h1>
	<span class="position-absolute pos-top pos-right d-none d-sm-block">
		<a href="{{ route('admin.add.users') }}" class="btn btn-success waves-effect waves-themed">
			<i class="fal fa-plus"></i> Kullanıcı Ekle
		</a>
	</span>
</div>
@endsection

@section('content')

<div class="fs-lg fw-300 p-5 bg-white border-faded rounded mb-g">
<h1>Kullanıcılar</h1>
</div>

@endsection
