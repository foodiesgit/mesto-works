<!DOCTYPE html>
<html lang="tr">
    <head>
        @include('/partials.head')
    </head>
    <body class="antialiased">
        <nav>
            @include('/partials.navbar')
        </nav>
        @yield('content')
        <footer class="brk-footer position-relative" style="margin-top: 100px;padding:10px;" data-brk-library="component__footer">
            @include('/partials.footer')
        </footer>
        @include('/partials.scripts')
    </body>
</html>
