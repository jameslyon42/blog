@extends('blog.layout')

@section('title', $page->title . ' - ' . config('app.name'))

@php
    $section = 'blog'
@endphp

@push('meta')
    <meta property="og:title" content="{{ $page->title }}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ url($page['image']) }}" />
@endpush

@section('content')
    <div class="blog-page">
        <h3 class="blog-page-details">
            {{ date('F dS Y', strtotime($page->published_at)) }}
        </h3>
        <h1 class="blog-page-title">
            {{ $page->title }}
        </h1>
        <div class="blog-page-text">
            {!! $page->html !!}
        </div>
    </div>
@endsection