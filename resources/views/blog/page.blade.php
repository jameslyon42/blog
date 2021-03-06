@extends('blog.layout')

@section('title', $page->title . ' - ' . config('app.name'))

@php
    $section = 'blog'
@endphp

@push('meta')
    <meta property="og:title" content="{{ $page->title }}" />
    <meta property="og:type" content="article" />
    <meta property="og:description" content="{{ $page->description }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    @if(isset($page->image))
        <meta property="og:image" content="{{ url($page->image) }}" />
    @endif
    <meta property="article:author" content="Jill Gomez" />
    <meta property="article:tag" content="travel" />
    <meta property="article:published_time" content="{{ $page->published_at }}" />
@endpush

@section('content')
    <div class="blog-page">
        <h3 class="blog-page-details">
            {{ date('F jS, Y', strtotime($page->published_at)) }}
        </h3>
        <h1 class="blog-page-title">
            {{ $page->title }}
        </h1>
        <div class="social-icons">
            <a
                    class="fa social-icon social-icon-twitter"
                    href="https://twitter.com/intent/tweet?text={{ $page->title }}&url={{ urlencode(url()->current()) }}"
            >
                &#xf099;
            </a>
            <div
                    class="fa social-icon social-icon-fb"
            >
                &#xf230;
            </div>
        </div>
        <div class="blog-page-text">
            {!! $page->html !!}
        </div>

    </div>
@endsection