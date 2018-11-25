@extends('blog.layout')

@section('title', $page->title . ' - The Jill Pill')

@php
    $section = 'blog'
@endphp

@section('content')
    <div class="blog-page">
        <div class="blog-page-details">
            {{ date('F dS Y', strtotime($page->published_at)) }}
        </div>
        <h1 class="blog-page-title">
            {{ $page->title }}
        </h1>
        <div class="blog-page-text">
            {!! $page->html !!}
        </div>
    </div>
@endsection