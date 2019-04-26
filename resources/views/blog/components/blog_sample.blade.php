<a class="blog-sample" href="/blog/{{ $page['slug'] }}">
    <img src="{{ $page['image'] }}">
    <div class="gradient">
        <div class="blog-sample-text">
            <h2 class="blog-sample-title">{{ $page['title'] }}</h2>
            @if ($page['location'])
                <div class="blog-sample-location">{{ $page['location'] }}</div>
            @endif 
        </div>
    </div>
</a>