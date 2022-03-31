@extends('frontend.master')
@section('title', 'Article')
@section('blogtitle', $article->title)
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12">
            @isset($article)
                <div class="post-preview text-center">
                    <h3 class="post-title">{{ $article->title }}</h3>
                    <p class="text-center"><img src="{{ $article->image }}" alt=""></p>

                    <p class="post-meta">
                        {{ $article->content }}
                    </p>
                </div>
            @endisset
        </div>
    </div>
@stop
