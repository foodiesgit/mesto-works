@extends('frontend.master')
@section('title', 'Home')
@section('content')
    <div class="row">
        <div class="col-md-9 col-lg-9 col-xl-9">
            @isset($articles)
                @if (count($articles) < 1)
                    <h2>Not Found!</h2>
                @else
                    @foreach ($articles as $item)
                        <div class="post-preview">
                            <a href="{{ route('article.content', $item->id) }}" style="text-decoration: none">
                                <h3 class="post-title">{{ $item->title }}</h3>
                            </a>
                            <p class="post-meta">
                                Category: {{ $item->category->name }} <br>
                                Date: {{ $item->created_at }} <br>
                                Readed: {{ $item->hit }}
                            </p>
                        </div>
                        <hr>
                    @endforeach
                    {{$articles->links("pagination::bootstrap-5")}}
                    @endif
            @endisset
        </div>
        <div class="col-md-3 col-lg-3 col-xl-3">
            <a href="{{ route('home') }}" class="list-group-item list-group-item-action d-flex justify-content-between">
                <span>All</span>
                <span class="badge bg-primary">{{ $articles->count() }}</span>
            </a>
            <div class="list-group">
                @isset($categories)
                    @foreach ($categories as $item)
                        <a href="{{ route('category.filter', $item->id) }}"
                            class="list-group-item list-group-item-action d-flex justify-content-between @if (Request::segment(1) == $item->id) active @endif">
                            <span>{{ $item->name }}</span>
                            <span class="badge bg-danger">{{ $item->articleCount() }}</span>
                        </a>
                    @endforeach
                @endisset
            </div>
        </div>
    </div>
@stop
