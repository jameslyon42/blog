@extends('blog.layout')

@section('title', config('app.name'))

@php
    $section = 'home'
@endphp

@push('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}"
            async defer></script>
@endpush

@section('content')
    <div class="hero-image-container">
        <img class="hero-image" src="/images/home_hero.jpeg">
    </div>
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
    <section class="blog-samples">
        @foreach ($recent_pages as $page)
            @component('blog.components.blog_sample', ['page' => $page])
            @endcomponent
        @endforeach
    </section>
    <world-map></world-map>
@endsection