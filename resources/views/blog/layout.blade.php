<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="/css/blog.css">
</head>
<body>
    <div id='app' class="blog-container" >
        <header class="blog-header">
            <nav class="blog-nav">
                <a class="blog-nav-item" href="/">Home</a>
                <a class="blog-nav-item" href="/blog">Blog</a>
                <a class="blog-nav-item" href="/about">About</a>
            </nav>
            <a class="blog-header-title" href="/">
                The Jill Pill
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
