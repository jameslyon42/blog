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

    <script src="/js/blog.js" type="text/javascript"></script>

    @stack('scripts')

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('GOOGLE_ANALYTICS_ID') }}"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', '{{ env('GOOGLE_ANALYTICS_ID') }}');
    </script>


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
            <div class="social-icons">
                <a
                        class="fa social-icon social-icon-twitter"
                        href="https://www.twitter.com/the_jillpill"
                        target="_blank"
                >
                    &#xf099;
                </a>
                <a
                    class="fa social-icon social-icon-fb"
                    href="https://www.facebook.com/profile.php?id=8831813"
                    target="_blank"
                >
                    &#xf230;
                </a>
                <a
                    class="fa social-icon social-icon-instagram"
                    href="https://www.instagram.com/the_jillpill"
                    target="_blank"
                >
                    &#xf16d;
                </a>
            </div>
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
