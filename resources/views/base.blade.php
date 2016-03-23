<html>
    <head>
        <title> {{ $meta_title or 'Pagrindinis' }}</title>
    </head>
    <body>
        <div class="header">
            @yield('header')
        </div>
        <div class = "content">
            @yield('content')
        </div>
        <div class="footer">
            @yield('footer')
        </div>
    </body>
</html>