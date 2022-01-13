@extends('backend.layout.master')

@section('title', 'Post Düzenle')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('/assets/plugins/custom/magnific-popup/magnific-popup.css') }}">
@endsection

@section('breadcrumb')
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Post Düzenle</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.get.index') }}" class="text-muted">Anasayfa</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('post.index') }}" class="text-muted">Postlar</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Post Düzenle</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->
@endsection

@section('content')

    <div class="row">
        <form method="POST" action="{{ route('post.update') }}" enctype="multipart/form-data" style="display: flex">
            {{ csrf_field() }}
            <div class="col-md-3 col-xs-12">
                <!--begin::Card-->
                <div class="card card-custom gutter-b">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Post Geçmişi</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach ($transactions as $transaction)
                            <h5 class="font-weight-bolder text-dark">
                                {{ $transaction->first()->created_at->format('d/m/Y') }}</h5>
                            <!--begin::Timeline-->
                            <div class="timeline timeline-6 mt-3">
                                @foreach ($transaction as $trans)
                                    <!--begin::Item-->
                                    <div class="timeline-item align-items-start">
                                        <!--begin::Label-->
                                        <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">
                                            {{ $trans->created_at->format('H:i') }}</div>
                                        <!--end::Label-->
                                        <!--begin::Badge-->
                                        <div class="timeline-badge">
                                            <i class="fa fa-genderless text-danger icon-xl"
                                                style="color: #{{ $trans->status->hex_color_code }} !important;"></i>
                                        </div>
                                        <!--end::Badge-->
                                        <!--begin::Desc-->
                                        @if ($request->transaction == $trans->id)
                                            <div class="font-weight-mormal font-size-lg timeline-content text-muted pl-3">
                                            @else
                                                <div
                                                    class="timeline-content font-weight-bolder text-dark-75 pl-3 font-size-lg">
                                        @endif
                                        {{ $trans->createdBy->name }} : <span
                                            style="color: #{{ $trans->status->hex_color_code }} !important;">{{ $trans->status->name }}</span>
                                        <br>
                                        {{ $trans->status_description ?? '-' }} <br>
                                        <button type="button" class="btn btn-link text-primary" data-toggle="modal"
                                            data-target="#transaction-{{ $trans->id }}">
                                            {{ $trans->title }}
                                        </button>
                                    </div>
                                    <!--end::Desc-->
                            </div>
                            <!--end::Item-->

                            <!-- Modal-->
                            <div class="modal fade" id="transaction-{{ $trans->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{ $trans->id }} -
                                                {{ $trans->title }}</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <i aria-hidden="true" class="ki ki-close"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <strong>Başlık </strong> <br>
                                                {{ $post->title }}
                                            </div>
                                            <div class="form-group">
                                                <strong>Açıklama </strong> <br>
                                                {{ $post->description }}
                                            </div>
                                            <div class="form-group">
                                                <strong>İçerik </strong> <br>
                                                {!! $post->content !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                    <!--end::Timeline-->
                    @endforeach
                </div>
            </div>
            <!--end::Card-->
    </div>
    <div class="col-md-7 col-xs-12">
        <!--begin::Card-->
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Post Düzenle</h3>
            </div>
            <!--begin::Form-->


            <input type="text" name="id" id="id" value="{{ $post->id }}" hidden />

            <div class="card-body">

                @if ($onuser->role->slug != 'author')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status_id">Durumu <span class="text-danger">*</span></label>
                                <select class="form-control" id="status_id" name="status_id"
                                    data-post_status_id="{{ $post->status_id }}">
                                    @foreach ($situations as $situation)
                                        <option value="{{ $situation->id }}"
                                            {{ $post->status_id == $situation->id ? 'selected' : '' }}>
                                            {{ $situation->name }}</option>
                                    @endforeach
                                </select>
                                @error('status_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6" id="div-status_description" style="display: none;">
                            <div class="form-group">
                                <label for="status_description">Durum Açıklaması <span class="text-danger">(Durum
                                        değiştirildiğinde zorunludur.)</span></label>
                                <input type="text" class="form-control @error('status_description') is-invalid @enderror"
                                    placeholder="Durum Açıklaması" name="status_description" id="status_description"
                                    value="{{ old('status_description') }}" maxlength="255" />
                                @error('status_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status_id">Durumu </label>
                                <div><strong>{{ $post->status->name }}</strong></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status_description">Durum Açıklaması</label>
                                <input type="text" class="form-control @error('status_description') is-invalid @enderror"
                                    placeholder="Durum Açıklaması" name="status_description" id="status_description"
                                    value="{{ old('status_description') }}" maxlength="255" />
                                @error('status_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category_ids">Kategori <span class="text-danger">*</span></label>
                            <select class="form-control" id="category_ids" name="category_ids[]" multiple required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ (old('category_ids') && in_array($category->id, old('category_ids'))) || $post->categories()->where('category_id', $category->id)->count() > 0     ? 'selected'     : '' }}>
                                        {{ $category->name }}</option>

                                    @foreach ($category->subs as $cat)
                                        <option value="{{ $cat->id }}"
                                            {{ (old('category_ids') && in_array($cat->id, old('category_ids'))) || $post->categories()->where('category_id', $cat->id)->count() > 0     ? 'selected'     : '' }}>
                                            {{ $category->name }} > {{ $cat->name }}
                                        </option>
                                    @endforeach
                                @endforeach
                            </select>
                            @error('category_ids')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">Başlık <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                placeholder="Başlık" name="title" id="title" required
                                value="{{ old('title') ? old('title') : $post->title }}" maxlength="255" />
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description">Açıklama </label>
                            <textarea class="form-control" name="description" maxlength="255"
                                rows="3">{{ old('description') ? old('description') : $post->description }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="content">İçerik <span class="text-danger">*</span></label>
                            <textarea class="summernote" id="content" name="content" required>
                      {!! old('content') ? old('content') : $post->content !!}
                    </textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="show_index">Göster - Anasayfa <span class="text-danger">*</span></label>
                            <select class="form-control" id="show_index" name="show_index" required>
                                <option value="1"
                                    {{ old('show_index') == 1 || $post->show_index == 1 ? 'selected' : '' }}>Evet
                                </option>
                                <option value="0"
                                    {{ (old('show_index') && old('show_index') == 0) || $post->show_index == 0 ? 'selected' : '' }}>
                                    Hayır</option>
                            </select>
                            @error('show_index')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="show_header">Göster - Header <span class="text-danger">*</span></label>
                            <select class="form-control" id="show_header" name="show_header" required>
                                <option value="1"
                                    {{ old('show_header') == 1 || $post->show_header == 1 ? 'selected' : '' }}>Evet
                                </option>
                                <option value="0"
                                    {{ (old('show_header') && old('show_header') == 0) || $post->show_header == 0 ? 'selected' : '' }}>
                                    Hayır</option>
                            </select>
                            @error('show_header')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="show_footer">Göster - Footer <span class="text-danger">*</span></label>
                            <select class="form-control" id="show_footer" name="show_footer" required>
                                <option value="1"
                                    {{ old('show_footer') == 1 || $post->show_footer == 1 ? 'selected' : '' }}>Evet
                                </option>
                                <option value="0"
                                    {{ (old('show_footer') && old('show_footer') == 0) || $post->show_footer == 0 ? 'selected' : '' }}>
                                    Hayır</option>
                            </select>
                            @error('show_footer')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">Kaydet</button>
            </div>
            <!--end::Form-->
        </div>
        <!--end::Card-->
    </div>
    <div class="col-md-2 col-xs-12">
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Post Görselleri</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="dropzone dropzone-default dropzone-primary" id="images">
                        <div class="dropzone-msg dz-message needsclick">
                            <h3 class="dropzone-msg-title">Yüklemek için tıkla ya da dosyalarını sürükle.</h3>
                            <span class="dropzone-msg-desc">Aynı anda en fazla 5 dosya seçiniz</span>
                        </div>
                    </div>
                </div>
                @if ($post->images->count() > 0)
                    <div class="popup-gallery row">
                        @foreach ($post->images as $image)
                            <div class="col-md-6 col-sm-6 col-xs-6" align="center" id="id_{{ $image->id }}">
                                <a href="/upload/post/{{ $image->image }}" title="{{ $image->image }}">
                                    <img style="max-height: 50px;" src="/upload/post/{{ $image->image }}"
                                        class="img-responsive img-thumbnail" />
                                    <div class="row">
                                        <button class="btn btn-danger btn-sm destroy" data-id="{{ $image->id }}"><i class="fa fa-trash"></i></button>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
    </form>
    </div>

@endsection

@section('page-scripts')
    <script src="{{ asset('/assets/js/pages/crud/forms/editors/summernote.js?v=7.2.8') }}"></script>
    <!-- Magnific popup JavaScript -->
    <script src="{{ asset('/assets/plugins/custom/magnific-popup/jquery.magnific-popup.js') }}"></script>
@endsection

@section('scripts')
    <script>
        $('select').select2();

        $('.popup-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            tLoading: 'Loading image #%curr%...',
            mainClass: 'mfp-img-mobile',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
            },
            image: {
                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            }
        });

        $('#status_id').change(function() {
            var post_status_id = $(this).data("post_status_id");
            if (post_status_id == $(this).val()) {
                $('#div-status_description').hide();
            } else {
                $('#div-status_description').show();
            }
        });

        $('#images').dropzone({
            url: "{{ route('post.upload-image') }}",
            paramName: ["images"],
            params: {
                post_id: $('#id').val()
            },
            maxFiles: 5,
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            /*accept: function(file, done) {
            	if (file.name == "justinbieber.jpg") {
            		done("Naha, you don't.");
            	} else {
            		done();
            	}
            }*/
        });

        $(".destroy").click(function(e) {
            var id = $(this).data('id');
            var post_id = $('#id').val();

            Swal.fire({
                title: "Silmek istediğine emin misin?",
                text: "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Evet",
                cancelButtonText: "Hayır!",
                reverseButtons: true
            }).then(function(result) {
                if (result.value) {
                    var url = '{{ route('get.delete-image', [':post_id', ':id']) }}';

                    url = url.replace(':id', id);
                    url = url.replace(':post_id', post_id);

                    window.location.href = url;

                }
            });
        });

        var KTSummernoteDemo = function() {
            // Private functions
            var demos = function() {
                $('.summernote').summernote({
                    height: 150
                });
            }

            return {
                // public functions
                init: function() {
                    demos();
                }
            };
        }();

        // Initialization
        jQuery(document).ready(function() {
            KTSummernoteDemo.init();
        });
    </script>
@endsection
