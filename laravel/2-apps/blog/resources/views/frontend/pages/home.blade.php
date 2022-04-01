@extends('frontend.master')
@section('title', 'Home')
@section('content')
    <div class="row">
        <div class="col-md-3 col-lg-3 col-xl-3" style="margin-right: 100px;">
            <a href="{{ route('home') }}" class="list-group-item list-group-item-action d-flex justify-content-between">
                <span>All</span>
                <span class="badge bg-primary">{{ $articlescount }}</span>
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
        <div class="col-md-8 col-lg-8 col-xl-8">
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
    </div>
@stop
