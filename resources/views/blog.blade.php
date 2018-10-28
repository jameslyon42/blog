<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Blog</title>

    <link rel="stylesheet" href="/css/blog.css">
</head>
<body>
    <div id='app' class="blog-container" >
        <header class="blog-header">
            <div class="blog-header-title" >
                The Jill Pill
            </div>
        </header>
        <div class="blog-content">
            <img class="hero-image" src="/images/home_hero.jpeg">
            <section class="blog-about blog-section">
                <div class="blog-about-description">
                    <h1 class="blog-about-title">
                        This is the Jill Pill
                    </h1>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet accumsan felis, non ultrices est. Ut mi ante, maximus a mollis vel, ultrices quis nisi. Ut mauris urna, volutpat in diam eu, auctor venenatis nibh.
                    </p>
                </div>
                <img class="blog-about-image" src="/images/about_jill_pill.jpeg">
            </section>
            <section class="blog-map blog-section">

            </section>
        </div>
    </div>
</body>
</html>
