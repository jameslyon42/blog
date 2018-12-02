
window.onload = function () {

    //Facebook
    window.fbAsyncInit = function() {
        FB.init({
            appId            : '300061850840647',
            autoLogAppEvents : true,
            xfbml            : true,
            version          : 'v3.2'
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    //Twitter
    window.twttr = (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0],
            t = window.twttr || {};
        if (d.getElementById(id)) return t;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://platform.twitter.com/widgets.js";
        fjs.parentNode.insertBefore(js, fjs);

        t._e = [];
        t.ready = function(f) {
            t._e.push(f);
        };

        return t;
    }(document, "script", "twitter-wjs"));

    //Share Icons
    const shareIcon = document.querySelector('.blog-page .social-icon-fb');

    if (shareIcon) {
        shareIcon.addEventListener('click', function () {
            console.log(window.location.href);
            FB.ui({
                method: 'share',
                href: window.location.href,
            }, function(response){});
        });
    }

};

