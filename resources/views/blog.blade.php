<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Blog</title>

    <link rel="stylesheet" href="/css/blog.css">

    <script src="/js/blog.js" type="application/javascript"></script>

</head>
<body>
    <div id="app">
        <Blog></Blog>
    </div>
</body>
</html>
