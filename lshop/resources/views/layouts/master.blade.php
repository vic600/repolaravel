<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

    </head>
    <body>
        @include('partials.nav')
        @include('partials.messages')
        <div class="container-fluid">
             @yield('content')
        </div>
@include('partials.footer')
    </body>
</html>
