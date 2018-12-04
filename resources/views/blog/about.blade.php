@extends('blog.layout')

@section('title', 'About - ' . config('app.name'))

@php
    $section = 'about'
@endphp

@section('content')
    <div class="blog-about">
        <h1>About The Jill Pill</h1>
        <div class="blog-about-content">
            <img src="/images/about_jill_pill.jpeg">
            <div class="blog-about-text">
                <p>
                    I’m Jill, a wife, mother to two cats, titi to several related and unrelated children and here to spread some sunshine.
                </p>
                <p>
                    My husband, James, and I love to embrace change and explore this beautiful world. We lived and traveled throughout the US in a DIY renovated RV for eight months and now we are traveling internationally.
                </p>
                <p>
                    I love wellness, health, fitness and anything that will add value and meaning to life. My dream is to share my experience and knowledge with you in hopes to inspire you to live your best life or at least make you laugh a little.
                </p>
                <p>
                    One love,
                    <br>
                    Jill
                </p>
            </div>
        </div>
    </div>
@endsection