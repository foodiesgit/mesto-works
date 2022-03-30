@extends('frontend.master')
@section('title', 'Home')
@section('content')
    <div class="row">
        <div class="col-md-9 col-lg-9 col-xl-9">
            <div class="post-preview">
                <a href="post.html">
                    <h2 class="post-title">Man must explore, and this is exploration at its greatest</h2>
                    <h3 class="post-subtitle">Problems look mighty small from 150 miles up</h3>
                </a>
                <p class="post-meta">
                    Posted by
                    <a href="#!">Start Bootstrap</a>
                    on September 24, 2022
                </p>
            </div>
        </div>
        <div class="col-md-3 col-lg-3 col-xl-3">
            <div class="list-group">
                @isset($categories)
                    @foreach ($categories as $item)
                        <a href="" class="list-group-item list-group-item-action d-flex justify-content-between">
                            <span>{{ $item->name }}</span>
                            <span class="badge bg-danger">0</span>
                        </a>
                    @endforeach
                @endisset
            </div>
        </div>
    </div>
@stop
