@extends('blog.layout')

@section('title', config('app.name'))

@php
    $section = 'home'
@endphp

@section('content')
    <div class="hero-container">
        <div class="hero-image"></div>
        <div class="hero-content">
            <div class="hero-content-container">
                <div class="hero-content-title">The Jill Pill</div>
                <br>
                <div class="hero-content-subtext">Lifestyle, Wellness and Travel</div>
            </div>
        </div>
    </div>
    <section class="blog-samples">
        @foreach ($recent_pages as $page)
            @component('blog.components.blog_sample', ['page' => $page])
            @endcomponent
        @endforeach
    </section>
    {{--<section class="blog-about blog-section">--}}
        {{--<img class="blog-about-image" src="/images/about_jill_pill.jpeg">--}}
        {{--<div class="blog-about-description">--}}
            {{--<h1 class="blog-about-title">--}}
                {{--This is the Jill Pill--}}
            {{--</h1>--}}
            {{--<p>--}}
                {{--Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet accumsan felis, non ultrices est. Ut mi ante, maximus a mollis vel, ultrices quis nisi. Ut mauris urna, volutpat in diam eu, auctor venenatis nibh.--}}
            {{--</p>--}}
        {{--</div>--}}
    {{--</section>--}}
@endsection