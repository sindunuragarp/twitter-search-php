<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Twitter URL Search</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Bulma -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.0/css/bulma.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.0/css/bulma.min.css.map" rel="stylesheet" type="text/css">

    <!-- Local -->
    <link href="css/master.css" rel="stylesheet" type="text/css">
    <link href="css/twitter.css" rel="stylesheet" type="text/css">

    <!-- Twitter -->
    <script>
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
    </script>
</head>
<body>

<section class="hero is-fullheight">

    <div class="hero-head">
        @include("layouts.header")
    </div>

    @yield("content")

    <div class="hero-footer">
        @include("layouts.footer")
    </div>

</section>

</body>
</html>
