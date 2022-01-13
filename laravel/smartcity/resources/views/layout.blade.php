<!DOCTYPE html>
<html lang="en">
<head>
    @include('/partials.head')
</head>
<body class="defult-home">
    <div id="loader" class="loader green-color">
        <div class="loader-container">
            <div class='loader-icon'>
                <img src="{{ asset('/images/aklogo.png') }}" alt="">
            </div>
        </div>
    </div>
    <div id="scrollUp" class="green-color">
        <i class="fa fa-angle-up"></i>
    </div>

    <header>@include('/partials.header')</header>
    <section  class="main-content">@yield('content')</section>
    <footer  id="rs-footer" class="rs-footer home9-style home12-style">@include('/partials.footer')</footer>
    @include('/partials.script')
</body>
</html>