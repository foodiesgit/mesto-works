<!DOCTYPE html>
<html lang="en">
@include('/backend.components.head')

<body id="page-top">
    <div id="wrapper">
        @include('/backend.components.menu')
        <div id="content-wrapper" class="d-flex flex-column">
            @include('/backend.components.header')
            <div class="container-fluid">
                <main id="content">
                    @yield('content')
                </main>
            </div>
            @include('/backend.components.footer')
            @include('/backend.components.scripts')
        </div>
    </div>
</body>

</html>
