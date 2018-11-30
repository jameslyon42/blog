@extends('blog.layout')

@section('title', $page->title . ' - ' . config('app.name'))

@php
    $section = 'blog'
@endphp

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