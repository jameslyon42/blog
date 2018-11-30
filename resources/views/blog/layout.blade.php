<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="/css/blog.css">

    @stack('meta')

</head>
<body>
    <div id='app' class="blog-container" >
        <header class="blog-header">
            <nav class="blog-nav">
                <div class="blog-nav-menu-toggle">
                    <input type="checkbox">
                    <div class="blog-nav-menu-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="blog-nav-items-container">
                        <div class="blog-nav-items">
                            <a class="blog-nav-item {{ $section == 'home' ? 'selected' : '' }}" href="/">Home</a>
                            <a class="blog-nav-item {{ $section == 'blog' ? 'selected' : '' }}" href="/blog">Blog</a>
                            <a class="blog-nav-item {{ $section == 'about' ? 'selected' : '' }}" href="/about">About</a>
                        </div>
                    </div>
                </div>
            </nav>
            <a class="blog-header-title" href="/">
                {{ config('app.name') }}
            </a>
        </header>
        <div class="blog-content">
            @yield('content')
        </div>
        <footer class="blog-footer">
            jill@thejillpill.com
        </footer>
    </div>

</body>
</html>
