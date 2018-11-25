@extends('blog.layout')

@section('title', 'Blog - The Jill Pill')

@php
    $section = 'blog'
@endphp

@section('content')
    <div class="blog-index">
        <section class="blog-samples">
            @foreach ($pages as $page)
                @component('blog.components.blog_sample', ['page' => $page])
                @endcomponent
            @endforeach
        </section>
    </div>
@endsection
