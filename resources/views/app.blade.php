<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/css/all.css">
        @yield('head')
    </head>
    <body>
        <div class="container">
            @include('partials.flash')
            <div class="content">
                <div class="title">@yield('title')</div>
                @yield('content')
            </div>
        </div>
        <script src="/js/all.js"></script>
        <script>
          $('div.alert').not('.alert-important').delay(3000).slideUp(300);
        </script>
        @yield('scripts')
    </body>
</html>
